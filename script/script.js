const box = document.getElementById("mapBox");
const img = document.getElementById("mapImg");

let isDragging = false;
let startX, startY;
let currentX = 0,
  currentY = 0;
let scale = 1;
const minScale = 1;
const maxScale = 2.5;
const overflowAllowance = 20; // Pixels allowed for blank or overflow

box.addEventListener("mousedown", (e) => {
  e.preventDefault();
  isDragging = true;
  box.style.cursor = "grabbing";

  // Adjust start position for current scale
  startX = e.clientX - currentX * scale;
  startY = e.clientY - currentY * scale;
});

document.addEventListener("mouseup", () => {
  if (!isDragging) return;
  isDragging = false;
  box.style.cursor = "grab";

  const { minX, maxX } = getBoundsX();
  const { minY, maxY } = getBoundsY();

  // Conditional reset: only if scale == 1
  if (scale === minScale) {
    currentX = 0;
    currentY = 0;
    img.style.transition = "transform 0.3s ease";
    updateTransform();
  }
  //bounce back if out of bounds
  else if (
    scale > 1 &&
    (currentX < minX || currentY < minY || currentX > maxX || currentY > maxY)
  ) {
    currentX = Math.max(minX, Math.min(currentX, maxX));
    currentY = Math.max(minY, Math.min(currentY, maxY));
    img.style.transition = "transform 0.3s ease-out";
    updateTransform();
  }
  setTimeout(() => {
    img.style.transition = "";
  }, 300);
});

document.addEventListener("mousemove", (e) => {
  if (!isDragging) return;
  e.preventDefault();

  // Calculate drag offset, adjusted for scale
  currentX = (e.clientX - startX) / scale;
  currentY = (e.clientY - startY) / scale;

  // Clamp to bounds
  const { minX, maxX } = getBoundsX();
  const { minY, maxY } = getBoundsY();
  currentX = Math.max(
    minX - overflowAllowance,
    Math.min(currentX, maxX + overflowAllowance)
  );
  currentY = Math.max(
    minY - overflowAllowance,
    Math.min(currentY, maxY + overflowAllowance)
  );

  // Apply transform with scale
  updateTransform();
});

box.addEventListener("wheel", (e) => {
  e.preventDefault();
  const delta = e.deltaY > 0 ? -0.1 : 0.1;
  scale += delta;
  if (scale < minScale) scale = minScale;
  if (scale > maxScale) scale = maxScale;

  // If zooming out to minScale, reset position to center
  if (e.deltaY < 0 && scale <= minScale) {
    currentX = 0;
    currentY = 0;
    img.style.transition = "transform 0.3s ease";
    setTimeout(() => {
      img.style.transition = "";
    }, 300);
  }

  // Clamp position to new bounds after scale change
  const { minX, maxX } = getBoundsX();
  const { minY, maxY } = getBoundsY();
  currentX = Math.max(
    minX - overflowAllowance,
    Math.min(currentX, maxX + overflowAllowance)
  );
  currentY = Math.max(
    minY - overflowAllowance,
    Math.min(currentY, maxY + overflowAllowance)
  );

  updateTransform();
});

function updateTransform() {
  img.style.transform = `translate(calc(-50% + ${currentX}px), calc(-50% + ${currentY}px)) scale(${scale})`;
}

function getBoundsX() {
  const scaledWidth = img.clientWidth * scale;
  const containerWidth = box.clientWidth;
  const halfDiff = Math.abs(scaledWidth - containerWidth) / 2;
  const minX = -halfDiff;
  const maxX = halfDiff;
  return { minX, maxX };
}

function getBoundsY() {
  const scaledHeight = img.clientHeight * scale;
  const containerHeight = box.clientHeight;
  const halfDiff = Math.abs(scaledHeight - containerHeight) / 2;
  const minY = -halfDiff;
  const maxY = halfDiff;
  return { minY, maxY };
}

// Initial update in case image is already loaded
if (img.complete) {
  updateTransform();
} else {
  img.addEventListener("load", updateTransform);
}
