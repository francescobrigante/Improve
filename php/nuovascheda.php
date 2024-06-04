<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nomescheda"])) {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
                die("Connessione fallita: " . pg_last_error());

        $nomescheda = $_POST["nomescheda"];
        $username = $_SESSION['username'];

        $query = "INSERT INTO schede(username, nomescheda, posizione) VALUES ('$username', '$nomescheda', 0)";
        $result = pg_query($dbconn, $query);


        if (!$result) {
            header("Location:../html/mieschede.php");
        }

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

    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminaes_nomescheda"]) && isset($_POST["eliminaes_nomeesercizio"])) {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
                die("Connessione fallita: " . pg_last_error());
        $nomescheda = $_POST["eliminaes_nomescheda"];
        $nomeesercizio = $_POST["eliminaes_nomeesercizio"];
        $posizione = $_POST["eliminaes_posizione"];
        $username = $_SESSION['username'];

        $query = "DELETE FROM schede WHERE username = '$username' AND nomescheda = '$nomescheda' AND nomeesercizio='$nomeesercizio' AND posizione='$posizione' AND numeroesercizi>1";
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
                        ELSE null
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

    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["aggiungies_nomescheda"]) && isset($_POST["aggiungies_nomeesercizio"]) 
            && isset($_POST["serie"]) && isset($_POST["ripetizioni"]) && isset($_POST["recupero"])) {

        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
                die("Connessione fallita: " . pg_last_error());
        $nomescheda = $_POST["aggiungies_nomescheda"];
        $nomeesercizio = $_POST["aggiungies_nomeesercizio"];
        $username = $_SESSION['username'];
        $serie = $_POST["serie"];
        $ripetizioni = $_POST["ripetizioni"];
        $recupero = $_POST["recupero"];

        //calcolo posizione esercizio e numero di esercizi
        //query al db per ottenere la posizione più alta attualmente ed incrementarla di 1

        $query = "SELECT MAX(posizione) as posizione FROM schede WHERE username=$1 AND nomescheda=$2";
        $result = pg_query_params($dbconn, $query, array($username, $nomescheda));

        if($result){
            $row = pg_fetch_assoc($result);
            $posizioneattuale = $row['posizione'];
        }
        else{
            echo "Errore calcolo posizione e numero di esercizi";
        }

        $query = "SELECT MAX(numeroesercizi) as numeroesercizi FROM schede WHERE username=$1 AND nomescheda=$2";
        $result = pg_query_params($dbconn, $query, array($username, $nomescheda));

        if($result){
            $row = pg_fetch_assoc($result);
            $numeroesercizi = $row['numeroesercizi'];
        }
        else{
            echo "Errore calcolo posizione e numero di esercizi";
        }

        $posizioneattuale++;

        //query che elimina tutte le schede vuote, cioè con 0 esercizi
        $query = "DELETE FROM schede WHERE username = $1 AND nomescheda = $2 AND numeroesercizi = 0 AND posizione IS NULL";
        $result = pg_query_params($dbconn, $query, array($username, $nomescheda));
        
        if (!$result) {
            echo "Errore durante l'operazione di eliminazione.";
        }


        //inserimento nel db

        $query = "INSERT INTO schede (username, nomescheda, nomeesercizio, serie, ripetizioni, recupero, numeroesercizi, posizione)
                     VALUES ($1, $2, $3, $4, $5, $6, $7, $8)";
        $result = pg_query_params($dbconn, $query, array($username, $nomescheda, $nomeesercizio, $serie, $ripetizioni, $recupero, 
                                    $numeroesercizi, $posizioneattuale));

        if (!$result) {
            echo "Errore durante l'operazione di inserimento esercizio";
        }

        // //query che incrementa di 1 numeroesercizi di tutti gli esercizi di questa scheda
        $query = "UPDATE schede SET numeroesercizi=numeroesercizi+1 WHERE username = '$username' AND nomescheda = '$nomescheda'";
        $result = pg_query($dbconn, $query);

        if (!$result) {
            echo "Errore durante l'operazione di incremento di 1 numeroesercizi";
        }

    }

    pg_close($dbconn);
?>