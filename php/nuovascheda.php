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

        // header("Location:../html/mieschede.php");

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
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminaes_nomescheda"]) && isset($_POST["eliminaes_nomeesercizio"])) {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
                die("Connessione fallita: " . pg_last_error());
        $nomescheda = $_POST["eliminaes_nomescheda"];
        $nomeesercizio = $_POST["eliminaes_nomeesercizio"];
        $username = $_SESSION['username'];

        $query = "DELETE FROM schede WHERE username = '$username' AND nomescheda = '$nomescheda' AND nomeesercizio='$nomeesercizio'  AND numeroesercizi>1";
        // POSSIBILE BUG: se io utente fra ho la scheda day 1 che ha 2 volte lo stesso esercizio,
        // se premo la x rossa, allora mi vengono eliminati entrambi gli es invece di solo 1
        $result = pg_query($dbconn, $query);

        if (!$result) {
            echo "Errore durante l'operazione di rinomina";
        }

        //se il num di esercizi è 1, non bisogna eliminare l'intera tupla, altrimenti sparisce
        //la scheda, ma bisogna eliminare solo i campi: nomees, serie, recuper e decrementare num es
        $query = "UPDATE schede SET 
                    numeroesercizi = 
                    CASE 
                        WHEN numeroesercizi > 1 THEN numeroesercizi - 1 
                        ELSE 0
                    END,

                    posizione = 
                    CASE 
                        WHEN numeroesercizi > 1 THEN posizione
                        ELSE 0
                    END,

                    nomeesercizio =  
                    CASE 
                        WHEN numeroesercizi > 1 THEN nomeesercizio
                        ELSE ''
                    END,

                    serie = 
                    CASE 
                        WHEN numeroesercizi > 1 THEN serie
                        ELSE null
                    END,

                    ripetizioni =  
                    CASE 
                        WHEN numeroesercizi > 1 THEN ripetizioni
                        ELSE null
                    END,

                    recupero =  
                    CASE 
                        WHEN numeroesercizi > 1 THEN recupero
                        ELSE null
                    END

                WHERE username = $1 AND nomescheda = $2";
        $result = pg_query_params($dbconn, $query, array($username, $nomescheda));

        if (!$result) {
            echo "Errore durante l'operazione di rinomina";
        }

        //BISOGNA FARE UNA QUERY CHE ELIMINA TUTTE LE SCHEDE VUOTE TRANNE UNA
        //QUESTO SSE ESISTONO PIU DI 1 SCHEDA VUOTA

        // Chiudi la connessione al database
        pg_close($dbconn);
    }
?>