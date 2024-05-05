<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accedi</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../css/accedi.css">
        <script src="../javascript/accedi.js"></script>
    </head>
<body>
    <!-- Barra superiore -->
    <!-- barra superiore -->
    <div class="barrasup">
            <a href="./index.html"><i id="home_container" class="fa-solid fa-house"></i></a>
            <img src="/img/logo.png">
            <i> </i><!--serve solo per fare in mod che il logo sia centrale e la casa
                      a sinistra-->
    </div>

    <!-- corpo -->
    <h1>Accedi</h1>
    <h2>ed inizia il tuo percorso in&nbsp<b>Improve.</b></h2>

    <div class="container">
        <form action="../php/accedi.php" method="post" name="accedi" onsubmit="return validaForm();">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <div class="campo_password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" value="Accedi">
            <div class="accedi">Non sei ancora registrato? <a href="../html/registrati.html">Registrati</a></div>
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
