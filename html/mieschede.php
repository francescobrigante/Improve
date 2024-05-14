    <!-- php -->
    <?php
        session_start();

        //se non hai username, allora non sei loggato
        if (!isset($_SESSION['username'])) {
            header("Location: ../html/index.html");
            exit();
        }
        $username = $_SESSION['username'];

        //connessione al database
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
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
            <h1><?php echo $scheda['nomescheda'];?></h1>
            <i class="fa-solid fa-ellipsis" id="ThreeDots" onclick="Open3Dots('<?php echo $scheda['nomescheda'] . '3Dots'; ?>')"></i>
            <div class = "DropDown3Dots" id="<?php echo $scheda['nomescheda'] . '3Dots'; ?>" >
                 <ul>
                    <li><i class="fa-solid fa-pen" ></i>  Rinomina</li>
                    <li><i class="fa-solid fa-trash"></i>  Elimina</li>
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
    <?php endforeach;?>
</div>




    <!-- popup scheda aperta con esercizi -->
    <div class="boxaperto" id="boxaperto" style="display: none;"> 
        <div class ="top">
        <h4>Nome scheda</h4>
        <button class="button" id="salva">Salva</button>
        </div>
        <button class="button" id="newex" >+ Nuovo Esercizio</button>
        <div class="contenitoreesercizi"> 
            <div class="box-exercise">
                <h2>Panca Piana</h2>
                <img src="../fotoesercizi/Pettorali/pancapiana.png">
                <h1> Serie:4 </h1>
                <h1> Ripetizioni:10</h1>
                <h1> Recupero:</h1>
                <h1> 1 m e 30s</h1>
            </div>
            <div class="box-exercise">
                <img src="../fotoesercizi/Pettorali/chestpress.png">
                <h1> Serie: </h1>
            </div> 
            </div>
        </div>
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