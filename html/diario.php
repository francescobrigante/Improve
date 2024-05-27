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

    if($dbconn){
        //verifico se è già attiva una sessione
        if (session_status() !== PHP_SESSION_ACTIVE){
            if(!session_start()){
                echo "Errore nell'inizializzazione della sessione";
                exit;
            }
        }

        $query = "SELECT giorno, mese, anno FROM allenamenti WHERE username = $1 ORDER BY anno, mese, giorno";
        $result = pg_query_params($dbconn, $query, array($username));
        $allenamenti = array();

        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                $allenamenti[] = $row;
            }
        } else {
            echo "Errore nel recupero dei dati di allenamento: " . pg_last_error($dbconn);
        }

        pg_close($dbconn);
    }
?>

<!DOCTYPE html>
    <html lang="it">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Diario</title>
            <link rel="stylesheet" type="text/css" href="../css/barrasup.css">
            <link rel="stylesheet" type="text/css" href="../css/diario.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
            <script src="//code.jquery.com/jquery-3.7.1.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script defer>
                const allenamenti = <?php echo json_encode($allenamenti); ?>;
            </script>
            <script src="../javascript/diario.js" defer></script>
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
                  <li><a href="./mieschede.php"><i class="fa-solid fa-dumbbell"></i> Le mie schede</a></li>
                  <li><a href="../html/schedepronte.html"><i class="fa-solid fa-file-lines"></i> Schede Pronte</a></li>
                  <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
              </ul>
          </div>       
        </div> 

        <div class="barra_secondaria"> 
          <h1> Diario di allenamento</h1>
          <h2> Tieni traccia dei tuoi progressi selezionando il giorno in cui ti sei allenato</h2>
        </div>

        <div class="wrapper">
            <header>
              <p class="current-date"></p>
              <div class="icons">
                <span id="prev" class="material-symbols-rounded">chevron_left</span>
                <span id="next" class="material-symbols-rounded">chevron_right</span>
              </div>
            </header>
            <div class="calendar">
              <ul class="weeks">
                <li>Dom</li>
                <li>Lun</li>
                <li>Mar</li>
                <li>Mer</li>
                <li>Gio</li>
                <li>Ven</li>
                <li>Sab</li>
              </ul>
              <ul class="days"></ul>
            </div>
          </div>

          <button id="cancellaGiorniAllenamento">Cancella tutti i giorni di allenamento</button>

          <div class="wrapper">
            <canvas id="trainingChart" width="400px" height="300px"></canvas>
        </div>
    </body>
</html>