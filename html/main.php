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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            <button class="nuovascheda" onmouseover="changeToNuovaScheda()" onmouseout="changeToPlus()">+</button>
            <div class="search-bar">
                <input type="text" placeholder="Cerca un esercizio..." > 
                <button> <i class="fas fa-search" ></i></button>
            </div>
            <button class="filter" onclick="FilterAnimation()"> <i id ="bars" class="fa-solid fa-bars" ></i></button>
        </div>
        <div class="contenitore" >
        <ul class="list-items" id="list">
            <li class="item" onclick="CheckBoxPetto()">
                <span class="checkbox">
                    <i class="fa-solid fa-check check-icon"  id="Petto"></i>
                </span>
                <span class="item-text">Petto</span>
            </li>
            <li class="item" onclick="CheckBoxSpalle()">
                <span class="checkbox">
                    <i class="fa-solid fa-check check-icon" id="Spalle"></i>
                </span>
                <span class="item-text">Spalle</span>
            </li>
            <li class="item" onclick="CheckBoxTricipiti()">
                <span class="checkbox" >
                    <i class="fa-solid fa-check check-icon" id="Tricipiti"></i>
                </span>
                <span class="item-text">Tricipiti</span>
            </li>
            <li class="item" onclick="CheckBoxAddominali()" >
                <span class="checkbox" >
                    <i class="fa-solid fa-check check-icon" id="Addominali"></i>
                </span>
                <span class="item-text">Addominali</span>
            </li>
            <li class="item" onclick="CheckBoxBicipiti()">
                <span class="checkbox" >
                    <i class="fa-solid fa-check check-icon" id="Bicipiti"></i>
                </span>
                <span class="item-text">Bicipiti</span>
            </li>
            <li class="item" onclick="CheckBoxGambe()">
                <span class="checkbox" > 
                    <i class="fa-solid fa-check check-icon" id="Gambe"></i>
                </span>
                <span class="item-text">Gambe</span>
            </li>
        </ul>
    </div>

    <div class="scrollbox" >
        <button class ="box-exercise" onclick="openPopup()" >
            <h1>Panca piana</h1>
            <h2>Petto</h2>
            <img src="../fotoesercizi/Pettorali/pancapiana.png" id="petto">
        </button>
        <button class ="box-exercise">
            <h1>Chest Press</h1>
            <h2>Petto</h2>
            <img src="../fotoesercizi/Pettorali/Screenshot_2024.03.30_16.56.31.822.png" id="petto">
        </button>
    </div>

    <div class="popup" id="popup">
       <h1> Panca Piana </h1>
       <h2> Petto </h2>
       <img src="../fotoesercizi/Pettorali/pancapiana.png" >
       <h3>Descrizione</h3>
       <div class="description"> Posizione iniziale: sdraiarsi sul tappetino con la schiena a terra. Piegare le gambe, tenendo i piedi appogiati a terra ed intrecciare le mani dietro la nuca.
        Movimento: flettere il busto in avanti, sollevando dal tappetino a parte superiore del busto.
        Scopo esercizio: esercizio a corpo libero molto comune che concentra il lavoro sulla sezione centrale dell’addome (retto dell’addome) ed in parte anche a livello dei fianchi (obliqui). Viene solitamente effettuato con un alto numero di ripetizioni.
        Respirazione: inspirare abbassando il busto sul tappetino ed espirare flettendolo.
        Errori: sollevare dal tappetino anche la parte bassa della schiena, far forza con le braccia per aiutarsi a flettere il busto e sollevare i piedi da terra. </div>
    </div>

    <div id="overlay" class="overlay" onclick="closePopup()"> </div>
</body>
</html>