<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Errore: Utente non autenticato.";
    header("../html/index.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $giorno = $_POST['giorno'];
    $mese = $_POST['mese'];
    $anno = $_POST['anno'];

    // Connessione al database
    $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
        die("Connessione fallita: " . pg_last_error());

    if ($dbconn) {
        // Verifica se il giorno di allenamento esiste già nel database per questo utente
        $check_query = "SELECT * FROM allenamenti WHERE username = $1 AND giorno = $2 AND mese = $3 AND anno = $4";
        $check_result = pg_query_params($dbconn, $check_query, array($username, $giorno, $mese, $anno));

        if ($check_result) {
            if (pg_num_rows($check_result) > 0) {
                // la tupla esiste nel db, quindi esegui la query di eliminazione
                $delete_query = "DELETE FROM allenamenti WHERE username = $1 AND giorno = $2 AND mese = $3 AND anno = $4";
                $delete_result = pg_query_params($dbconn, $delete_query, array($username, $giorno, $mese, $anno));

                if ($delete_result) {
                    echo "Giorno di allenamento rimosso dal database.";
                } else {
                    echo "Errore nella rimozione del giorno di allenamento: " . pg_last_error($dbconn);
                }
            } else {
                // la tupla non esiste, quindi esegui la query di inserimento
                $insert_query = "INSERT INTO allenamenti (username, giorno, mese, anno) VALUES ($1, $2, $3, $4)";
                $insert_result = pg_query_params($dbconn, $insert_query, array($username, $giorno, $mese, $anno));

                if ($insert_result) {
                    echo "Giorno di allenamento inserito correttamente nel database.";
                } else {
                    echo "Errore nell'inserimento del giorno di allenamento: " . pg_last_error($dbconn);
                }
            }
        } else {
            echo "Errore nella verifica della presenza del giorno di allenamento: " . pg_last_error($dbconn);
        }

        pg_close($dbconn);
    } else {
        echo "Connessione al database non riuscita.";
    }
} else {
    echo "Metodo di richiesta non valido.";
}
?>
