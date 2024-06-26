
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrazione</title>
        <link rel="stylesheet" type="text/css" href="../css/registrati.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="//code.jquery.com/jquery-3.7.1.js"></script>
        <script src="../javascript/registrati.js"></script>
    </head>
<body>

    <!-- barra superiore -->
    <div class="barrasup">
            <a href="./main.php"><i id="home_container" class="fa-solid fa-arrow-left"></i></a>
            <img src="../img/logo.png">
            <div></div>
    </div>


    <!-- corpo -->
    <h1>Registrati</h1>
    <h2>ed inizia a migliorare te stesso </h2>


    <div class="container">
        <form action="../php/registrati.php" method="post" name="registr" onsubmit="return validaForm();">
            <!-- vedere differenza for e class -->
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Inserisci il nome" required>
            <label for="cognome">Cognome</label>
            <input type="text" name="cognome" id="cognome" placeholder="Inserisci il cognome" required>
            <label for="email"> Email </label>
            <input type="text" name="email" id="email" placeholder="Inserisci una email" required>
            <label for="sesso">Sesso</label>
            <br>
                <input type="radio" name="sesso" value="M">
                <label id="sesso" for="maschio">Maschio</label>
            <br id="space">
                <input type="radio" name="sesso" value="F">
                <label id="sesso" for="femmina">Femmina</label>
            <br>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Inserisci uno username" required>
            <label for="password">Password</label>
            <div class="scriviPassword">
                <input type="password" name="password" id="password" placeholder="Inserisci una password" required>
                <i id="eyeIcon1" class="fa-solid fa-eye"></i>
                <script>
                    document.getElementById('eyeIcon1').addEventListener('click', function() {
                        var password = document.getElementById('password');
                        var eyeIcon1 = document.getElementById('eyeIcon1');
                        if (password.type === 'password') {
                            password.type = 'text';
                            eyeIcon1.classList.remove('fa-eye');
                            eyeIcon1.classList.add('fa-eye-slash');
                        } else {
                            password.type = 'password';
                            eyeIcon1.classList.remove('fa-eye-slash');
                            eyeIcon1.classList.add('fa-eye');
                        }
                    });
                </script>
            </div>
            <label for="cpassword">Conferma Password</label>
            <div class="scriviCPassword">
                <input type="password" name="cpassword" id="cpassword" placeholder="Conferma la password" required>
                <i id="eyeIcon2" class="fa-solid fa-eye"></i>
                <script>
                    document.getElementById('eyeIcon2').addEventListener('click', function() {
                        var cpassword = document.getElementById('cpassword');
                        var eyeIcon2 = document.getElementById('eyeIcon2');
                        if (cpassword.type === 'password') {
                            cpassword.type = 'text';
                            eyeIcon2.classList.remove('fa-eye');
                            eyeIcon2.classList.add('fa-eye-slash');
                        } else {
                            cpassword.type = 'password';
                            eyeIcon2.classList.remove('fa-eye-slash');
                            eyeIcon2.classList.add('fa-eye');
                        }
                    });
                </script>
            </div>
            <input type="submit" value="Registrati">
            <p id="errormessage" style="color: red"></p> <!-- messaggio di errore per la validazione del form -->

            <div class="registrati">Sei già un membro? <a href="../html/accedi.php">Accedi</a></div>
        </form>
    </div>  

    <div id="overlayReg"></div>
    <div id="popupReg">
        <p id="testo_popupReg"></p>
    </div>

    <!-- codice php per controllare se ci sono errori, e quindi quale popup far visualizzare -->
    <?php
    // Controlla se è presente un errore nella query string
    if(isset($_GET['error'])) {
        $error = $_GET['error'];
        if($error === "registered_email") {
            echo "<script>
                    document.getElementById('overlayReg').style.display = 'block';
                    document.getElementById('popupReg').style.display = 'block';
                    document.getElementById('testo_popupReg').innerText = 'Email già registrata';
                    setTimeout(function(){ 
                        document.getElementById('overlayReg').style.display = 'none'; 
                        document.getElementById('popupReg').style.display = 'none'; 
                    }, 1500);
                  </script>";

        } elseif($error === "registered_username") {
            echo "<script>
                    document.getElementById('overlayReg').style.display = 'block';
                    document.getElementById('popupReg').style.display = 'block';
                    document.getElementById('testo_popupReg').innerText = 'Username già registrato';
                    setTimeout(function(){ 
                        document.getElementById('overlayReg').style.display = 'none'; 
                        document.getElementById('popupReg').style.display = 'none'; 
                    }, 1500);
                  </script>";
        }
    }
    ?>
</body>
</html>
