    <!-- php -->
    <?php
        session_start();

        //se non hai username, allora non sei loggato
        if (!isset($_SESSION['username'])) {
            header("Location: ../html/index.html");
            exit();
        }
        $username = $_SESSION['username'];
    ?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Improve</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <script src="//code.jquery.com/jquery-3.7.1.js"></script>
        <script src="../javascript/main.js"></script>
    </head>
<body>

    <p>Benvenuto 
        <?php echo $username; ?>!</p>

    <!-- barra superiore -->
    <div class="barrasup">
        <!-- home -->
        <a href="./index.html" id="home_container" onmouseover="showOrangeHome()" onmouseout="showOriginalHome()">
            <img src="../img/home.png" alt="Home" name="home" id="home">
            <img src="../img/orangehome.png" alt="Home" id="orange_home" style="display: none;">
        </a>

        <!-- logo -->
        <div class="logo">
            <img src="../img/logo.png" width=500px >
        </div>

        <!-- account -->
        <div class="account" id="account">
            <img src="../img/account.png" alt="Account" id="icon_account">
            <img src="../img/orangeaccount.png" alt="Account" id="orange_account" style="display: none;">
            <div class="dropdown" id="dropdown">
                <ul>
                    <li><a href="">Nuova scheda</a></li>
                    <li><a href="./mieschede.php">Le mie schede</a></li>
                    <li><a href="../php/logout.php">Log out</a></li>
                </ul>
            </div>
        </div>        
    </div> 


    <!-- barra secondaria -->
    <div class="barra2">
        <button class="nuova_scheda">+</button>
    </div>


</body>
</html>