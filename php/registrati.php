<?php
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: ../html/index.html");
        exit;
    } else {
        $dbconn = pg_connect("host=localhost port=5432 dbname=Improve user=postgres password=admin") or 
            die("Connessione fallita: " . pg_last_error());
    }
?>
<!DOCTYPE html>
<html lang="it">
<head></head>
<body>
    <?php
        if ($dbconn) {

            //verifica se email esiste già
            $email = $_POST["email"];
            $query = "select 1 from utenti where email=$1";
            $result = pg_query_params($dbconn, $query, array($email));

            //verifica se username esiste già
            $username = $_POST["username"];
            $query2 = "select 1 from utenti where username=$1";
            $result2 = pg_query_params($dbconn, $query2, array($username));            

            //check email
            if($tuple = pg_fetch_assoc($result)){
                header("Location: ../html/registrati.php?error=registered_email");
                exit();
            }

            //check username
            elseif($tuple = pg_fetch_assoc($result2)){
                header("Location: ../html/registrati.php?error=registered_username");
                exit();
            }

            //allora inseriamo i dati nel db
            else{
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $sesso = $_POST["sesso"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $query_inserimento = "insert into utenti (nome, cognome, email, sesso, username, password) values ($1, $2, $3, $4, $5, $6)";
                $result_inserimento = pg_query_params($dbconn, $query_inserimento, array($nome, $cognome, $email, $sesso, $username, $password));

                if($result_inserimento)
                    header("Location: ../html/registrasucc.html");
                else
                    die ("Errore");
            }
        }
?>
</body>
</html>