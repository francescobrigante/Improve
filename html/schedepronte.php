    <!-- php -->
    <?php
        session_start();

        //se non hai username, allora non sei loggato
        if (!isset($_SESSION['username'])) {
            header("Location: ../html/index.html");
            exit();
        }
        $username = $_SESSION['username'];

    ?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Schede pronte</title>
        <link rel="stylesheet" type="text/css" href="../css/barrasup.css">
        <link rel="stylesheet" type="text/css" href="../css/schedepronte.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="//code.jquery.com/jquery-3.7.1.js"></script>
        <script src="../javascript/schedepronte.js"></script>
    </head>
<body>

    <!-- barra superiore -->
    <div class="barrasup">

        <a href="./index.html"><i id="home_container" class="fa-solid fa-house"></i></a>
        <img src="../img/logo.png">

        <!-- account -->
        <i id="account"class="fa-solid fa-user"></i>            
        <div class="dropdown" id="dropdown">
            <ul>
                <li><a href="./main.php"><i class="fa-solid fa-folder"></i> Archivio Esercizi</a></li>
                <li><a href="./mieschede.php"><i class="fa-solid fa-dumbbell"></i> Le mie schede</a></li>
                <li><a href="./diario.php"><i class="fa-solid fa-calendar-days"></i></i> Diario Allenamento</a></li>
                <li><a href="../php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a></li>
            </ul>
        </div>       
    </div> 

    <!-- Barra secondaria -->
    <div class="barra_secondaria"> 
        <h1> Schede Pronte </h1>
        <br>
        <h2> In questa sezione puoi trovare delle schede adatte per il tuo livello o per il tuo obiettivo </h2>
    </div>

    <!-- scrollbox -->
    <div class="scrollbox">

        <h1> Per Livello <h1>
        <div class="box-scheda">
            <h1 onclick="OpenScheda('Principiante')"> Principiante </h1>
            <div class="first3">
                <h2> Chest Press 4x12</h2><br>
                <h2> Alzate Laterali 4x10</h2><br>
                <h2> Lat Machine 4x10...</h2>  
            </div>
        </div>
        <div class="box-scheda">
            <h1 onclick="OpenScheda('Intermedio')"> Intermedio </h1>
            <div class="first3">
                <h2> Panca Piana 3x5</h2><br>
                <h2> Spinte su panca inclinata 4x8</h2><br>
                <h2> Squat 3x6...</h2>
            </div>
        </div>
        <div class="box-scheda">
            <h1 onclick="OpenScheda('Avanzato')"> Avanzato </h1>
            <div class="first3">
                <h2> Squat 5x5</h2><br>
                <h2> Panca Piana 5x4</h2><br>
                <h2> Military Press 3x10...</h2>  
            </div>
        </div>

        <h1> Per Tipo <h1>
        <div class="box-scheda">
            <h1 onclick="OpenScheda('Push')"> Push </h1>
            <div class="first3">
                <h2> Panca Piana 3x8</h2><br>
                <h2> Spinte su panca inclinata 3x12</h2><br>
                <h2> Shoulder Press 4x10...</h2>  
            </div>
        </div>
        <div class="box-scheda">
            <h1 onclick="OpenScheda('Pull')"> Pull </h1>
            <div class="first3">
                <h2> Trazioni 3xMAX</h2><br>
                <h2> Low Row 3x12</h2><br>
                <h2> Lat Machine 2x10...</h2>  
            </div>
        </div>
        <div class="box-scheda">
            <h1 onclick="OpenScheda('Legs')"> Legs </h1>
            <div class="first3">
                <h2> Squat 4x8</h2><br>
                <h2> Leg Press 3x12</h2><br>
                <h2> Affondi 3x15...</h2>  
            </div>
        </div>
    </div>

    <!-- inizio box aperti -->
    <div class="boxaperto" id="Push" style="display:none;">
        <div class ="top">
            <h4>Push</h4>
        </div>
            <div class="contenitoreesercizi">
                <div class="box-exercise">
                    <h1>Panca Piana </h1>
                    <h2>Petto </h2>
                    <h3>3 x 8 - 120s </h3>
                </div>
                <div class="box-exercise">
                    <h1>Spinte su panca inclinata </h1>
                    <h2>Petto </h2>
                    <h3>3 x 12 - 90s </h3>
                </div>
                <div class="box-exercise">
                    <h1>Shoulder Press </h1>
                    <h2>Spalle </h2>
                    <h3>4 x 10 - 90s </h3>
                </div>
                <div class="box-exercise">
                    <h1>Alzate Laterali </h1>
                    <h2>Spalle </h2>
                    <h3>3 x 12 - 90s </h3>
                </div>
                <div class="box-exercise">
                    <h1>Dip </h1>
                    <h2>Tricipiti </h2>
                    <h3>3 x MAX - 90s </h3>
                </div>
                <div class="box-exercise">
                    <h1>Pushdown con sbarra </h1>
                    <h2>Tricipiti </h2>
                    <h3>3 x 12 - 90s </h3>
                </div>
            </div>  
            <button class="button" id="chiudi_popupscheda" onclick="CloseScheda('Push')">Chiudi</button>
        </div> 
    </div>

    <div class="boxaperto" id="Pull" style="display:none;">
        <div class ="top">
            <h4>Pull</h4>
        </div>
        <div class="contenitoreesercizi">
            <div class="box-exercise">
                <h1>Trazioni </h1>
                <h2>Dorso </h2>
                <h3>3 x MAX - 150s </h3>
            </div>
            <div class="box-exercise">
                <h1>Low Row </h1>
                <h2>Dorso </h2>
                <h3>3 x 12 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Lat Machine </h1>
                <h2>Dorso </h2>
                <h3>2 x 10 - 60s </h3>
            </div>
            <div class="box-exercise">
                <h1>Hammer Curl </h1>
                <h2>Bicipiti </h2>
                <h3>3 x 12 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Preacher curl </h1>
                <h2>Bicipiti </h2>
                <h3>3 x 10 - 60s </h3>
            </div>
            <div class="box-exercise">
                <h1>Crunch </h1>
                <h2>Addominali </h2>
                <h3>3 x 15 - 60s </h3>
            </div>
            <div class="box-exercise">
                <h1>Sit-Up </h1>
                <h2>Addominali </h2>
                <h3>3 x 15 - 60s </h3>
            </div>
        </div>
        <button class="button" id="chiudi_popupscheda" onclick="CloseScheda('Pull')">Chiudi</button>
    </div> 

    <div class="boxaperto" id="Legs" style="display:none;">
        <div class ="top">
            <h4>Legs</h4>
        </div>
        <div class="contenitoreesercizi">
            <div class="box-exercise">
                <h1>Squat </h1>
                <h2>Quadricipiti </h2>
                <h3>4 x 8 - 180s </h3>
            </div>
            <div class="box-exercise">
                <h1>Leg Press </h1>
                <h2>Quadricipiti </h2>
                <h3>3 x 12 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Affondi </h1>
                <h2>Quadricipiti </h2>
                <h3>3 x 15 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Stacco Rumeno </h1>
                <h2>Femorali </h2>
                <h3>4 x 19 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Leg Curl Seduto </h1>
                <h2>Femorali </h2>
                <h3>3 x 12 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Calf Machine Seduto </h1>
                <h2>Polpacci </h2>
                <h3>4 x 15 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Plank </h1>
                <h2>Addominali </h2>
                <h3>4 x 90s </h3>
            </div>
        </div>
        <button class="button" id="chiudi_popupscheda" onclick="CloseScheda('Legs')">Chiudi</button>
    </div> 

    <div class="boxaperto" id="Principiante" style="display:none;">
        <div class ="top">
            <h4>Principiante</h4>
        </div>
        <div class="contenitoreesercizi">
            <div class="box-exercise">
                <h1>Chest Press </h1>
                <h2>Petto </h2>
                <h3>4 x 12 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Alzate laterali </h1>
                <h2>Spalle </h2>
                <h3>4 x 10 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Lat Machine </h1>
                <h2>Dorso </h2>
                <h3>4 x 10 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Leg Press </h1>
                <h2>Quadricipiti </h2>
                <h3>4 x 8 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Leg Curl Seduto </h1>
                <h2>Femorali </h2>
                <h3>3 x 15 - 60s </h3>
            </div>
            <div class="box-exercise">
                <h1>Pushdown con sbarra </h1>
                <h2>Tricipiti </h2>
                <h3>3 x 12 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Hammer Curl </h1>
                <h2>Bicipiti </h2>
                <h3>3 x 10 - 90s </h3>
            </div>
        </div>
        <button class="button" id="chiudi_popupscheda" onclick="CloseScheda('Principiante')">Chiudi</button>
    </div> 

    <div class="boxaperto" id="Intermedio" style="display:none;">
        <div class ="top">
            <h4>Intermedio</h4>
        </div>
        <div class="contenitoreesercizi">
            <div class="box-exercise">
                <h1>Panca Piana </h1>
                <h2>Petto </h2>
                <h3>3 x 5 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Spinte su panca inclinata </h1>
                <h2>Petto </h2>
                <h3>4 x 8 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Squat </h1>
                <h2>Quadricipiti </h2>
                <h3>3 x 6 - 180s </h3>
            </div>
            <div class="box-exercise">
                <h1>Stacco Rumeno </h1>
                <h2>Femorali </h2>
                <h3>3 x 8 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Lat Machine </h1>
                <h2>Dorso </h2>
                <h3>3 x 4 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Military Press </h1>
                <h2>Spalle </h2>
                <h3>3 x 8 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Dip </h1>
                <h2>Tricipiti </h2>
                <h3>3 x 12 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Bicep Curl al cavo basso </h1>
                <h2>Bicipiti </h2>
                <h3>3 x 12 - 90s </h3>
            </div>
        </div>
        <button class="button" id="chiudi_popupscheda" onclick="CloseScheda('Intermedio')">Chiudi</button>
    </div> 

    <div class="boxaperto" id="Avanzato" style="display:none;">
        <div class ="top">
            <h4>Avanzato</h4>
        </div>
        <div class="contenitoreesercizi">
            <div class="box-exercise">
                <h1>Squat </h1>
                <h2>Quadricipiti </h2>
                <h3>5 x 5 - 300s </h3>
            </div>
            <div class="box-exercise">
                <h1>Panca Piana </h1>
                <h2>Petto </h2>
                <h3>5 x 4 - 150s </h3>
            </div>
            <div class="box-exercise">
                <h1>Military Press </h1>
                <h2>Spalle </h2>
                <h3>3 x 10 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Alzate Laterali </h1>
                <h2>Spalle </h2>
                <h3>3 x 12 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Trazioni </h1>
                <h2>Dorso </h2>
                <h3>4 x 12 - 120s </h3>
            </div>
            <div class="box-exercise">
                <h1>Preacher Curl con bilanciere </h1>
                <h2>Bicipiti </h2>
                <h3>4 x 12 - 90s </h3>
            </div>
            <div class="box-exercise">
                <h1>Tricep Extension </h1>
                <h2>Tricipiti </h2>
                <h3>3 x 15 - 60s </h3>
            </div>
            <div class="box-exercise">
                <h1>Plank </h1>
                <h2>Addominali </h2>
                <h3>3 x 60s </h3>
            </div>
        </div>
        <button class="button" id="chiudi_popupscheda" onclick="CloseScheda('Avanzato')">Chiudi</button>
    </div> 

    <div id="Pushoverlay" class= "overlay" onclick="CloseScheda('Push')"> </div>
    <div id="Pulloverlay" class= "overlay" onclick="CloseScheda('Pull')"> </div>
    <div id="Legsoverlay" class= "overlay" onclick="CloseScheda('Legs')"> </div>
    <div id="Principianteoverlay" class= "overlay" onclick="CloseScheda('Principiante')"> </div>
    <div id="Intermediooverlay" class= "overlay" onclick="CloseScheda('Intermedio')"> </div>
    <div id="Avanzatooverlay" class= "overlay" onclick="CloseScheda('Avanzato')"> </div>

</body>
</html>