
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accedi</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../css/accedi.css">
        <script>
            function validaForm(){
                if(document.accedi.username.value=="" || document.accedi.password.value==""){
                    alert("Inserisci username e password");
                    return false;
                }
                return true;
            }
        </script>
    </head>
<body>
    <!-- barra superiore -->
    <div class="barrasup">
            <a href="./index.html"><i id="home_container" class="fa-solid fa-arrow-left"></i></a>
            <img src="../img/logo.png">
            <i> </i><!--serve solo per fare in modo che il logo sia centrale e la casa
                      a sinistra-->
    </div>

    <!-- corpo -->
    <h1>Accedi</h1>
    <h2>ed inizia il tuo percorso in&nbsp<b>Improve.</b></h2>

    <div class="container">
        <form action="../php/accedi.php" method="post" name="accedi" onsubmit="return validaForm();">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Inserisci il tuo username">
            <div class="campo_password">
                <label for="password">Password</label>
                <div class="scriviPassword">                    
                    <input type="password" id="password" name="password" placeholder="Inserisci la tua password">
                    <i id="eyeIcon" class="fa-solid fa-eye"></i>
                    <script>
                        document.getElementById('eyeIcon').addEventListener('click', function() {
                            var password = document.getElementById('password');
                            var eyeIcon = document.getElementById('eyeIcon');
                            if (password.type === 'password') {
                                password.type = 'text';
                                eyeIcon.classList.remove('fa-eye');
                                eyeIcon.classList.add('fa-eye-slash');
                            } else {
                                password.type = 'password';
                                eyeIcon.classList.remove('fa-eye-slash');
                                eyeIcon.classList.add('fa-eye');
                            }
                        });
                    </script>
                </div>
            </div>
            <input type="submit" value="Accedi">
            <div class="accedi">Non sei ancora registrato? <a href="../html/registrati.php">Registrati</a></div>
        </form>
    </div>

    <div id="overlay"></div>
    <div id="popup">
        <p id="testo_popup"></p>
    </div>
    
    <!-- codice php per controllare se ci sono errori, e quindi quale popup far visualizzare -->
    <?php
    // Controlla se è presente un errore nella query string
    if(isset($_GET['error'])) {
        $error = $_GET['error'];
        if($error === "not_registered") {
            echo "<script>
                    document.getElementById('overlay').style.display = 'block';
                    document.getElementById('popup').style.display = 'block';
                    document.getElementById('testo_popup').innerText = 'Non sei ancora registrato';
                    setTimeout(function(){ 
                        document.getElementById('overlay').style.display = 'none'; 
                        document.getElementById('popup').style.display = 'none'; 
                    }, 1500);
                  </script>";

        } elseif($error === "wrong_password") {
            echo "<script>
                    document.getElementById('overlay').style.display = 'block';
                    document.getElementById('popup').style.display = 'block';
                    document.getElementById('testo_popup').innerText = 'Password errata';
                    setTimeout(function(){ 
                        document.getElementById('overlay').style.display = 'none'; 
                        document.getElementById('popup').style.display = 'none'; 
                    }, 1500);
                  </script>";
        }
    }
    ?>
    
</body>
</html>
