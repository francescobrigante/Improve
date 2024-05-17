    <!-- php -->
    <?php
        session_start();

        //se non hai username, allora non sei loggato
        if (!isset($_SESSION['username'])) {
            header("Location: ../html/index.html");
            exit();
        }
        $username = $_SESSION['username'];
        //ciao

        //connessione al database
        $dbconn = pg_connect("host=localhost port=3000 dbname=Improve user=postgres password=admin") or 
            die("Connessione fallita: " . pg_last_error());

        //se la connessione è andata a buon fine, inizio una sessione
        if($dbconn){
            // query per salvare tutte le schede realizzate da un utente
            $query = "SELECT distinct nomescheda FROM schede where username='$username'";
            $result = pg_query($dbconn, $query);
            $nomischede = array();

            if ($result) {
                while ($row = pg_fetch_assoc($result)) {
                    $nomischede[] = $row;
                }
            }
        }
    ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Le mie schede</title>
        <link rel="stylesheet" type="text/css" href="../css/barrasup.css">
        <link rel="stylesheet" type="text/css" href="../css/mieschede.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="//code.jquery.com/jquery-3.7.1.js"></script>
        <script src="../javascript/mieschede.js"></script>
    </head>
<body>

    <!-- barra superiore -->
    <div class="barrasup">

    <a href="./index.html"><i id="home_container" class="fa-solid fa-house"></i></a>
    <img src="../img/logo.png">

    <!-- account -->
    <i id="account"class="fa-solid fa-user"></i>            
    <div class="dropdown" id="dropdown">
        <ul>
            <li><a href="./main.php"><i class="fa-solid fa-folder"></i> Archivio Esercizi</a></li>
            <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
        </ul>
    </div>       
    </div> 

    <!-- Barra secondaria -->
    <div class="barra_secondaria"> 
        <button class="nuovascheda" onclick="openPopupNuovaScheda()">+ Nuova scheda</button>
        <h1> Le tue schede </h1>
    </div>

    <!-- scrollbox di visualizzazione schede -->
    <div class="scrollbox" id="scrollbox">
    <?php foreach ($nomischede as $scheda): ?>
        <div class="box-scheda">
            <h1 onclick="openScheda('<?php echo $scheda['nomescheda'];?>')"><?php echo $scheda['nomescheda'];?></h1>
            <i class="fa-solid fa-ellipsis" id="ThreeDots" onclick="Open3Dots('<?php echo $scheda['nomescheda'] . '3Dots'; ?>')"></i>
            <div class = "DropDown3Dots" id="<?php echo $scheda['nomescheda'] . '3Dots'; ?>" >
                 <ul>
                    <li onclick="openPopupRinominaScheda('<?php echo $scheda['nomescheda']?>')"><i class="fa-solid fa-pen" ></i>  Rinomina</li>
                    <li onclick="openPopupEliminaScheda('<?php echo $scheda['nomescheda'] ?>3Dots','<?php echo $scheda['nomescheda'] ?>')" ><i class="fa-solid fa-trash" ></i>  Elimina </li>
                </ul>
            </div>
            <div class="first3">
            <?php 
            // query per selezionare i primi 3 esercizi di ogni scheda e farli visualizzare nel box
            $query_new = "SELECT * FROM schede WHERE username='$username' AND nomescheda='{$scheda['nomescheda']}' order by posizione LIMIT 3";
            $result = pg_query($dbconn, $query_new);
            
            if ($result) {
                while ($tupla = pg_fetch_assoc($result)) {
                    if($tupla['numeroesercizi'] != 0) {  //cioè se ci sono elementi nella query, quindi la scheda non è vuota
            ?>  
                <h2><?php echo $tupla['nomeesercizio']; ?>: <?php echo $tupla['serie']; ?>x<?php echo $tupla['ripetizioni']; ?></h2><br>
            <?php
                    }
                }
            }
            ?>
            </div>
        </div>
        <div class="overlay3dots" id="<?php echo $scheda['nomescheda'] . '3Dots' . 'overlay'; ?>" onclick="Close3Dots('<?php echo $scheda['nomescheda'] . '3Dots'; ?>')"></div>

        <!--POPUP ELIMINA SCHEDA-->
        <div class ="eliminaschedapopup" id="eliminaschedapopup<?php echo $scheda['nomescheda']?>">
            <h1> Elimina scheda </h1>
            <h2> Sei sicuro di voler eliminare la scheda: <?php echo $scheda['nomescheda']; ?>?</h2>
            <button class="button" onclick="eliminaScheda('<?php echo $scheda['nomescheda'];?>')">Sì</button> <!--ELIMINA SCHEDA DA IMPLEMENTARE -->
            <button class="button" id="noelimina" onclick="closePopupEliminaScheda('<?php echo $scheda['nomescheda'];?>')">No</button>
        </div>
    <!--Interno Scheda -->

      <!-- popup scheda aperta con esercizi -->
      <div class="boxaperto" id="<?php echo $scheda['nomescheda'];?>" style="display: none;"> 
        <div class ="top">
            <h4><?php echo $scheda['nomescheda'];?></h4>
        </div>
        <button class="button" id="newex" >+ Nuovo Esercizio</button>
        <div class="contenitoreesercizi"> 
            <div class="box-exercise">
                <h1>Panca Piana </h1>
                <h2>Petto</h2>
                <h3>3 x 10 - 90s</h3> 
                <button class ="button" id="rimuovies"><i class="fa-solid fa-xmark"></i></button>
            </div> 
            <div class="box-exercise">
            </div> 
            </div>
        <button class="button" id="salva" >Salva</button>
        <button class="button" id="annulla" onclick="CloseScheda('<?php echo $scheda['nomescheda'];?>')">Annulla</button>
    </div>

    <!--overlay per le schede--> 
    <div id="<?php echo $scheda['nomescheda'].'overlay';?>" class= "overlay" onclick="CloseScheda('<?php echo $scheda['nomescheda'];?>')"> </div>




    <?php endforeach;?>
        <div id="overlayelimina" class="overlayelimina" onclick="closePopupEliminaScheda()"> </div>

        <!-- popup rinomina -->
        <div class="rinominaschedapopup" id="rinominaschedapopup"> 
        <h1> Rinomina scheda</h1>
            <div class = "input-field" >
                <div>
                    <input type="text" name="" required="" id="rinomina"> 
                    <label>Rinomina la scheda</label>
                    <span></span>
                </div>
            </div>
            <button class="button" id="Rinomina" onclick="rinominaScheda()">Rinomina</button>
            <button class="button" onclick="closePopupRinominaScheda()">Annulla</button>
        </div>

    <div id="overlayrinomina" class="overlayrinomina" onclick="closePopupRinominaScheda()"> </div>
</div>

  

    <!-- popup creazione scheda -->
    <div class="nuovaschedapopup" id="nuovaschedapopup"> 
        <h1> Nuova scheda</h1>
            <div class = "input-field" >
                <div>
                    <input type="text" name="" required="" id="nomescheda"> 
                    <label> Inserisci il nome della scheda</label>
                    <span></span>
                </div>
            </div>

            <button class="button" id="aggiungi" onclick="creaBox()">Aggiungi</button>
            <button class="button" id="annulla" onclick="closePopupNuovaScheda()">Annulla</button>
        </div>

    <div id="overlay" class="overlay" onclick="closePopupNuovaScheda()"> </div>
</body>
</html>

<?php pg_close($dbconn); ?>