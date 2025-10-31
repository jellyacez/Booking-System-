<?php
session_start();
require('db.php');
$title = "Home Page";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="./css/homepage.css">
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
        <a href="settings.php">Settings</a>
        <a href="logout.php">Log Out</a>
    </div>
    <header>

        <div class="title-block">
            <h1>Pampanga State University</h1>
            <h2>Interactive Map</h2>
            <!-- For debug purposes -->
            <!--   <div id="debugInfo" style="
          position: fixed;
          bottom: 10px;
          left: 10px;
          background: rgba(0,0,0,0.6);
          color: white;
          padding: 6px 10px;
          font-size: 12px;
          border-radius: 6px;
          font-family: monospace;
          z-index: 9999;">

</div> -->
        </div>
    </header>
    <!-- This is the nav panel content! :\ -->
    <nav>
        <div class="nav-left">
            <button class="open-btn" onclick="openNav()" style="background-color: #800000;">&#9776;</button>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <i class="fa-solid fa-bell"></i>
        </div>
        <div nav-right>
            <input type="text" id="searchInput">
            <button class="searchtab"><i class="fa fa-search"></i></button>
        </div>

    </nav>
    <main>
        <div class="content">
            <div class="map-container" id="mapBox">
                <img src="./img/psumap.png" id="mapImg" alt="No image">
            </div>
        </div>

        <!-- Script for the entirety :\ -->
        <script src="script/homepage-interactive-map.js"></script>




    </main>

    <div class="parent">
        <div class="div1">222</div>
        <div class="div2">2</div>
        <div class="div3">3</div>
        <div class="div7">7</div>
        <div class="div8">8</div>
        <div class="div9">9</div>
        <div class="div10">10</div>
        <div class="div11">11</div>
        <div class="div12">12</div>
        <div class="div13">13</div>
    </div>

    <footer>
        <p>&copy; 2025 Copyright</p>
    </footer>
</body>


</html>