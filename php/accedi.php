<?php
    //connessione al database
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: ../html/index.html");
        exit;
    } else {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
            die("Connessione fallita: " . pg_last_error());
    }

    //se la connessione è andata a buon fine, inizio una sessione
    if($dbconn){
        //verifico se è già attiva una sessione
        if (session_status() !== PHP_SESSION_ACTIVE){
            if(!session_start()){
                echo "Errore nell'inizializzazione della sessione";
                exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="it">
<head></head>
<body>
    <?php
        if ($dbconn) {

            //verifica se username è presente nel db
            $username = $_POST["username"];
            $query = "select password from utenti where username=$1";
            $result = pg_query_params($dbconn, $query, array($username));            

            //check username
            if(!($tuple = pg_fetch_assoc($result)))
                echo "Non sei ancora registrato";

            //allora sei registrato
            else{
                $stored_password = $tuple["password"];
                $password = $_POST["password"];

                if(password_verify($password, $stored_password)){
                    $_SESSION['username'] = $username;
                    echo "Login avvenuto con successo, benvenuto " . $_SESSION['username'];
                }
                else
                    echo "Password errata";
            }
        }
?>
</body>
</html>