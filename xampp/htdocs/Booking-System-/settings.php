<? require('db.php') ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Settings</title>

    <script>
        function openNav() {
            document.getElementById('Olsidebar').style.width = '250px';
        }

        function closeNav() {
            document.getElementById('Olsidebar').style.width = '0';
        }
    </script>
</head>

<body>

    <div id="Olsidebar" class="Olsidebar">
        <a href="javascript:void(0)" onclick="closeNav()">&times; Close</a>
        <a href="index.php">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="settings.php">Settings</a>
    </div>
    <header>
        <h1>Settings</h1>
        <div class="Olnav-left">
            <button class="open-btn" onclick="openNav()">&#9776;</button>
        </div>
    </header>

    <main>
        <div class="side-panel">

        </div>
        <div class="page-container">

        </div>
    </main>
</body>

</html>