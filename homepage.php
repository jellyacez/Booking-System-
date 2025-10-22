<?php
$title = "Home Page";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        function openNav() {
            document.getElementById('sidebar').style.width = '250px';
        }

        function closeNav() {
            document.getElementById('sidebar').style.width = '0';
        }
    </script>
</head>

<body>
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" onclick="closeNav()">&times; Close</a>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="#">Dashboard</a>
        <a href="#">Settings</a>
    </div>
    <header>
        <button class="open-btn" onclick="openNav()">&#9776;</button>
        <div class="title-block">
            <h1>Pampanga State University</h1>
            <h2>Interactive Map</h2>
        </div>
    </header>
    <!-- This is the nav panel content! :\ -->
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <i class="fa-solid fa-bell"></i>
        <button class="searchtab"><i class="fa fa-search"></i></button>
    </nav>
    <main>
        <div class="content">
            <div class="map-container" id="mapBox">
                <img src="./img/psumap.png" id="mapImg" alt="No image">
            </div>
        </div>
        <div class="interactive-container">

            <div class="header-container">
                <a href="#">Dot</a>
            </div>

        </div>
        <!-- Script for the entirety :\ -->
        <script src="./script/script.js"></script>

    </main>

    <footer>
        <p>&copy; We used AI for upscaler</p>
    </footer>
</body>

</html>