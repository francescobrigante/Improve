    <!-- php -->
    <?php
        session_start();

        //se non hai username, allora non sei loggato
        if (!isset($_SESSION['username'])) {
            header("Location: ../html/index.html");
            exit();
        }
        $username = $_SESSION['username'];

        if (!isset($_SESSION['sesso'])) {
            $_SESSION['sesso'] = null;
        }

        //connessione al database
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
            die("Connessione fallita: " . pg_last_error());

        //se la connessione è andata a buon fine, inizio una sessione
        if($dbconn){
            //verifico se è già attiva una sessione
            if (session_status() !== PHP_SESSION_ACTIVE){
                if(!session_start()){
                    echo "Errore nell'inizializzazione della sessione";
                    exit;
                }
            }

            $query = "SELECT * FROM esercizi";
            $result = pg_query($dbconn, $query);
            $esercizi = array();

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    $esercizi[] = $row;
                }
            }
            
            //query per salvare il sesso
            $query = "SELECT sesso FROM utenti where username='$username'";
            $result = pg_query($dbconn, $query);

            if($result){
                $row = pg_fetch_assoc($result);
                $_SESSION['sesso'] = $row['sesso']; 
            }

            pg_close($dbconn);
        }
    ?>

    <!-- benvenuto/a -->
    <?php
        if($_SESSION['sesso']=='M'){
    ?>
            <p>Benvenuto 
    <?php
        }
        else{
    ?>
            <p>Benvenuta 
   <?php        
        }
        echo $username; 
    ?>!</p>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Archivio Esercizi</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="//code.jquery.com/jquery-3.7.1.js"></script>
        <script src="../javascript/main.js"></script>
    </head>
<body>

    <!-- barra superiore -->
    <div class="barrasup">

        <a><i></i></a> 
        <img src="../img/logo.png">

          <!-- account -->
          <i id="account"class="fa-solid fa-user"></i>            
          <div class="dropdown" id="dropdown">
              <ul>
                  <li><a href="./mieschede.php"><i class="fa-solid fa-dumbbell"></i> Le mie schede</a></li>
                  <li><a href="../html/schedepronte.php"><i class="fa-solid fa-file-lines"></i> Schede Pronte</a></li>
                  <li><a href="../html/diario.php"><i class="fa-solid fa-pen-to-square"></i> Diario di Allenamento</a></li>
                  <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
              </ul>
          </div>       
    </div> 


    <!-- barra secondaria -->
    <div class="rettangolo">
        <div class="barra2">
        <button class="nuovascheda" onclick="GoToMieSchede()">+ Nuova scheda </button>

            <div class="search-bar">
                <input type="text" placeholder="Cerca un esercizio..." oninput="search()"> 
                <button onclick="search()"> <i class="fas fa-search" ></i></button>
            </div>
            
            <button id="filter" class="filter" onclick="FilterAnimation()"> <i id ="bars" class="fa-solid fa-bars" ></i></button>
        </div>
    </div>


    <div class="contenitore" id="contenitore_filtro">
         <ul class="list-items" id="list">
            <li class="item" onclick="CheckBox('Petto')">
                <span class="checkbox">
                    <i class="fa-solid fa-check check-icon-checked"  id="Petto"></i>
                </span>
                <span class="item-text">Petto</span>
            </li>
            <li class="item" onclick="CheckBox('Spalle')">
                <span class="checkbox">
                    <i class="fa-solid fa-check check-icon-checked" id="Spalle"></i>
                </span>
                <span class="item-text">Spalle</span>
            </li>
            <li class="item" onclick="CheckBox('Tricipiti')">
                <span class="checkbox" >
                    <i class="fa-solid fa-check check-icon-checked" id="Tricipiti"></i>
                </span>
                <span class="item-text">Tricipiti</span>
            </li>
            <li class="item" onclick="CheckBox('Dorso')">
                <span class="checkbox" > 
                    <i class="fa-solid fa-check check-icon-checked" id="Dorso"></i>
                </span>
                <span class="item-text">Dorso</span>
            </li>
            <li class="item" onclick="CheckBox('Bicipiti')">
                <span class="checkbox" >
                    <i class="fa-solid fa-check check-icon-checked" id="Bicipiti"></i>
                </span>
                <span class="item-text">Bicipiti</span>
            </li>
            <li class="item" onclick="CheckBox('Quadricipiti')">
                <span class="checkbox" > 
                    <i class="fa-solid fa-check check-icon-checked" id="Quadricipiti"></i>
                </span>
                <span class="item-text">Quadricipiti</span>
            </li>
            <li class="item" onclick="CheckBox('Femorali')">
                <span class="checkbox" > 
                    <i class="fa-solid fa-check check-icon-checked" id="Femorali"></i>
                </span>
                <span class="item-text">Femorali</span>
            </li>
            <li class="item" onclick="CheckBox('Polpacci')">
                <span class="checkbox" > 
                    <i class="fa-solid fa-check check-icon-checked" id="Polpacci"></i>
                </span>
                <span class="item-text">Polpacci</span>
            </li>
            <li class="item" onclick="CheckBox('Addominali')">
                <span class="checkbox" >
                    <i class="fa-solid fa-check check-icon-checked" id="Addominali"></i>
                </span>
                <span class="item-text">Addominali</span>
            </li>
        </ul>
    </div>

    <div class="scrollbox" id="scrollbox">
        <?php foreach ($esercizi as $esercizio): ?>
            <button class="box-exercise" onclick="openPopup('popup_<?php echo $esercizio['nome']; ?>', 'overlay_<?php echo $esercizio['nome']; ?>')">  
                <h1><?php echo $esercizio['nome']; ?></h1>
                <h2><?php echo $esercizio['muscolo']; ?></h2>
                <img src="<?php echo $esercizio['immagine']; ?>" alt="<?php echo $esercizio['nome']; ?>">
            </button>
        <?php endforeach; ?>
    </div>

    <?php foreach ($esercizi as $esercizio): ?>
        <div class="popup" id="popup_<?php echo $esercizio['nome']; ?>">
            <h1><?php echo $esercizio['nome']; ?></h1>
            <h2><?php echo $esercizio['muscolo']; ?></h2>
            <img src="<?php echo $esercizio['immagine']; ?>" alt="<?php echo $esercizio['nome']; ?>">
            <h3>Descrizione</h3>
            <div class="description"><?php echo $esercizio['descrizione']; ?></div>
        </div>

        <div id="overlay_<?php echo $esercizio['nome']; ?>" class="overlay" onclick="closePopup('popup_<?php echo $esercizio['nome']; ?>', 'overlay_<?php echo $esercizio['nome']; ?>')"> </div>
    <?php endforeach; ?>
    
</body>
</html>