<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nomescheda"])) {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
                die("Connessione fallita: " . pg_last_error());

        $nomescheda = $_POST["nomescheda"];
        $username = $_SESSION['username'];

        $query = "INSERT INTO schede(username, nomescheda) VALUES ('$username', '$nomescheda')";
        $result = pg_query($dbconn, $query);


        if (!$result) {
            echo "Errore durante l'inserimento della scheda.";
        }

        header("Location:../html/mieschede.php");

        // Chiudi la connessione al database
        pg_close($dbconn);
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminascheda"])) {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
                die("Connessione fallita: " . pg_last_error());

        $nomescheda = $_POST["eliminascheda"];
        $username = $_SESSION['username'];

        $query = "DELETE FROM schede WHERE username = '$username' AND nomescheda = '$nomescheda'";
        $result = pg_query($dbconn, $query);

        if (!$result) {
            echo "Errore durante l'operazione di eliminazione";
        }
        // Chiudi la connessione al database
        pg_close($dbconn);
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rinominascheda1"]) && isset($_POST["rinominascheda2"])) {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
                die("Connessione fallita: " . pg_last_error());
        $vecchionome = $_POST["rinominascheda1"];
        $nuovonome = $_POST["rinominascheda2"];
        $username = $_SESSION['username'];


        $query = "UPDATE schede SET nomescheda='$nuovonome' WHERE username = '$username' AND nomescheda = '$vecchionome'";
        $result = pg_query($dbconn, $query);


        if (!$result) {
            echo "Errore durante l'operazione di rinomina";
        }

        // Chiudi la connessione al database
        pg_close($dbconn);
    }
?>