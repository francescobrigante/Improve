<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../html/index.html");
    exit();
}

$username = $_SESSION['username'];

$dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") 
    or die("Connessione fallita: " . pg_last_error());

if ($dbconn) {

    $query = "DELETE FROM allenamenti WHERE username = $1";
    $result = pg_query_params($dbconn, $query, array($username));

    if ($result) {
        echo "Tutti i giorni di allenamento sono stati cancellati con successo.";
    } else {
        echo "Errore durante la cancellazione dei giorni di allenamento: " . pg_last_error($dbconn);
    }

    // Chiudi la connessione al database
    pg_close($dbconn);
} else {
    echo "Connessione al database non riuscita.";
}
?>
