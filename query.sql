drop table esercizi;

CREATE TABLE esercizi (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    muscolo VARCHAR(100) NOT NULL,
    immagine TEXT,
    descrizione TEXT
);

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Panca Piana', 'Petto', '../fotoesercizi/Pettorali/pancapiana.png', 'Posizione iniziale: sdraiati supini su una panca orizzontale, impugnare il bilanciere con i palmi delle mani in avanti e con l’ampiezza delle braccia poco superiore a quella delle spalle, in modo che a bilanciere abbassato gli avambracci siano perfettamente perpendicolari al terreno. 
Movimento: abbassare lentamente il bilanciere, fino a quasi toccare il petto. Sollevare dunque il bilanciere senza raggiungere la completa estensione delle braccia, ma mantenendo il gomito in lieve tensione.
Scopo esercizio: le spinte panca piana con il bilanciere sono il principale esercizio per lo sviluppo per lo sviluppo della massa e della forza dell’intero muscolo pettorale, utilizzato solitamente come primo esercizio nelle routine dei pettorali. Il coinvolgimento dei tricipiti è significativo e vengono anche coinvolti i deltoidi anteriori come muscoli accessori. 
Respirazione: inspirare durante la fase discendente ed espirare durante la fase di spinta verso l’alto. 
Consigli: esercizio multi-articolare fondamentale per lo sviluppo della parte superiore del corpo, dato che coinvolge torace, gran pettorale, tricipiti e deltoidi anteriori. Variando la larghezza della presa si sposta il lavoro sui tricipiti (presa stretta) o sulla parte esterna del pettorale (allargando molto la presa).
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Chest Press', 'Petto', '../fotoesercizi/Pettorali/chestpress.png', 'Posizione iniziale: seduti con la schiena ben appoggiata al cuscino della macchina, afferrare le apposite impugnature con le mani in posizione prona. Il sedile è posizionato in modo che le impugnature siano a livello della parte centrale del pettorale.
Movimento: spingere in avanti fino alla quasi completa estensione delle braccia. Dopo un attimo di contrazione muscolare ritornare lentamente alla posizione iniziale.
Scopo esercizio: l’esercizio lavora sul gran pettorale sfruttando nella fase di ritorno anche l’allungamento delle fibre esterne. Come muscoli secondari vengono reclutati sia deltoidi anteriori sia tricipiti.
Respirazione: espirare durante la fase di spinta ed inspirare durante la fase di ritorno alla posizione iniziale.
Consigli: regolare la seduta del sellino per modificare il maggior punto di lavoro dell’esercizio. Abbassandolo verrà coinvolta maggiormente la parte alta del pettorale e il deltoide anteriore, mentre alzandolo si lavorerà maggiormente sulla zona inferiore del pettorale.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Spinte su panca inclinata', 'Petto', '../fotoesercizi/Pettorali/pancainclinata.png', 'Posizione iniziale: sdraiati su una panca inclinata di circa 30°, impugnare due manubri con i palmi rivolti in avanti. I manubri sono all’altezza del petto e gli avambracci perpendicolari al terreno.
Movimento: sollevare i manubri verso l’alto con una traiettoria fino al punto massimo di estensione delle braccia (con i manubri che si “toccano” in alto davanti al capo).  
Scopo esercizio: le distensioni con manubri su panca inclinata lavorano principalmente sulla parte alta del gran pettorale, coinvolgendo anche tricipiti e deltoidi anteriori come muscoli secondari. 
Respirazione: inspirare durante la fase discendente ed espirare durante la spinta.
Consigli: l’inclinazione ottimale della panca è tra i 30° e i 45°. Inclinazioni maggiori coinvolgono maggiormente il deltoide, scaricando il lavoro dal pettorale. Durante la discesa, abbassare il più possibile i manubri per sfruttare il massimo allungamento delle fibre muscolari del gran pettorale. 
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Alzate laterali', 'Spalle', '../fotoesercizi/Spalle/alzatelaterali.png', 'Posizione iniziale: in piedi, impugnare i manubri uno da ciascun lato con i palmi delle mani rivolti verso l’interno. Le braccia devono essere quasi tese con i gomiti leggermente piegati.
Movimento: sollevare le braccia verso l’esterno fino al punto in cui i manubri raggiungeranno il livello delle spalle. Dopo un attimo di contrazione muscolare ritornare lentamente alla posizione di partenza.
Scopo esercizio: le alzate laterali con manubri sono un esercizio specifico per lo sviluppo della parte laterale del deltoide. Vengono reclutati anche come muscoli secondari sia la parte anteriore e posteriore del deltoide che il trapezio, nella fase di contrazione.
Respirazione: espirare durante la fase attiva dell’esercizio, ovvero mentre si sollevano i manubri verso l’alto, ed inspirare durante la fase passiva di ritorno delle braccia verso la posizioni iniziale dell’esercizio.
Consigli: se i manubri vengono sollevati fino ad un’altezza maggiore delle spalle, sarà il trapezio a contribuire nell’ultima parte del movimento. Il deltoide laterale lavora di più quando i manubri si mantengono paralleli al suolo durante il movimento. Importante sottolineare il fatto che la posizione di partenza può coinvolgere parti differenti della spalla. 
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Military Press', 'Spalle', '../fotoesercizi/Spalle/military.png', 'Posizione iniziale: in stazione eretta e piedi divaricati. Schiena diritta, sguardo in avanti, addominali contratti e una leggera retroversione del bacino.
Movimento: mantenendo il busto e le gambe ferme, portare il bilanciere sopra la testa leggermente indietro. Nel ritorno fermare il bilanciere all’altezza del mento per la ripetizione successiva.
Scopo esercizio: esercizio che interessa il muscolo deltoide nella sua totalità, ma la posizione eretta coinvolge anche la muscolatura della schiena e addominali. 
Respirazione: inspirare prima di iniziare il movimento ed espirare durante la spinta.
Consigli: esercizio facile anche se poco adatto al principiante, che ancora non ha il controllo del bacino e addome, e a chi ha problemi di schiena. Da non eseguire in presenza di patologie all’articolazione della spalla.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Shoulder Press', 'Spalle', '../fotoesercizi/Spalle/shoulderpress.png', 'Posizione iniziale: sedersi alla macchina impugnando le maniglie con un angolo braccio/avambraccio di circa 90°.
Movimento: distendere le braccia verso l’alto e ritorno.
Scopo esercizio: esercizio fondamentale per il deltoide, usato sia per la massa che la forza.
Respirazione: inspirare quando le braccia sono basse ed espirare quando arrivano in alto.
Consigli: il momento più stressante per l’articolazione è il momento dello stacco, dunque si consiglia di partire con una regolazione della seduta con le maniglie poco più alte delle spalle. Alcune Shoulder Press hanno anche un’impugnatura parallela, consigliabile quando si hanno problemi all’articolazione.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Pushdown con sbarra', 'Tricipiti', '../fotoesercizi/Tricipiti/pushdown.png', 'Posizione iniziale: in ginocchio con le mani che afferrano la sbarra al cavo alto con i palmi delle mani in avanti e i gomiti appoggiati alla panca piana.
Movimento: distendere le braccia in avanti senza spostare i gomiti.
Scopo esercizio: esercizio di isolamento sul tricipite, che con l’utilizzo del cavo permette dei carichi maggiori.
Respirazione: inspirare quando le braccia sono flesse ed espirare durante la distensione.
Consigli: esercizio semplice dato dal controllo del cavo, fare attenzione a non iper estendere il gomito durante la distensione.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Tricep Extension', 'Tricipiti', '../fotoesercizi/Tricipiti/tricepextension.png', 'Posizione iniziale: in piedi davanti al cavo, gambe larghezza bacino e busto diritto, impugnare la corda con gli avambracci paralleli.
Movimento: spingere le braccia verso l’alto distendendole mantenendo il polso in linea con l’avambraccio e al ritorno a piegare completamente avambraccio sul braccio.
Scopo esercizio: esercizio di isolamento del tricipite interessato nella sua totalità.
Respirazione: inspirare a braccia flesse ed espirare a braccia tese.
Consigli: contrarre gli addominali per stabilizzare il busto.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Dip', 'Tricipiti', '../fotoesercizi/Tricipiti/dip.png', 'Posizione iniziale: posizionarsi alle parallele con presa stretta, i polsi diritti in linea con l’avambraccio e il corpo sospeso.
Movimento: scendere, con il corpo in verticale, tenendo i gomiti stretti fino ad avere le spalle in linea con i gomiti. Mantenere il corpo fermo per poi spingere in alto fino a distendere completamente il braccio.
Scopo esercizio: esercizio classico per la massa del tricipite, con coinvolgimento del pettorale alto e dei muscoli delle spalle per controllare la discesa.
Respirazione: inspirare durante la discesa ed espirare durante la spinta.
Consigli: esercizio non facile e molto intenso in cui si lavora a carico naturale, quindi sfruttando il proprio peso. Poco adatto ai principianti, in quanto deve esserci molto controllo del corpo. Il principiante può iniziare alle parallele assistite, dove la pedana con il carico aiuta nella spinta.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Bicep Curl al cavo basso', 'Bicipiti', '../fotoesercizi/Bicipiti/curlcavo.png', 'Posizione iniziale: in piedi, di fronte al cavo, tenendo le gambe leggermente piegate e il busto dritto. Impugnare la sbarra attaccata al cavo basso, tenendo i pollici rivolti verso l’esterno e le braccia vicino al corpo.
Movimento: flettere le braccia, portando la sbarra vicino al petto.
Scopo esercizio: esercizio molto comune nei programmi di fitness e bodybuilding che concentra il lavoro sui bicipiti, con la partecipazione della muscolatura degli avambracci. Il movimento prevede inoltre l’interessamento della parte anteriore della spalla (deltoide anteriore).
Respirazione: inspirare distendendo le braccia ed espirare flettendole.
Consigli: evitare di appoggiare la sbarra sulle gambe al termine della fase di discesa.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Hammer Curl', 'Bicipiti', '../fotoesercizi/Bicipiti/hammercurl.png', 'Posizione iniziale: Impugnare due manubri, con i pollici rivolti verso davanti e le braccia distese vicino al corpo.
Movimento: flettere le braccia, avvicinando i manubri alle spalle.
Scopo esercizio: esercizio molto comune nei programmi di bodybuilding e fitness, utilizzato per migliorare la forza e il volume muscolare dei bicipiti. Il movimento prevede inoltre la partecipazione della muscolatura degli avambracci e l’interessamento della regione anteriore della spalla (deltoide anteriore).
Respirazione: inspirare distendendo le braccia ed espirare flettendole.
Consigli: evitare di far oscillare le braccia al termine della fase di discesa.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Preacher Curl con bilanciere', 'Bicipiti', '../fotoesercizi/Bicipiti/pancascott.png', 'Posizione iniziale: posizionarsi alla panca scott ed impugnare il bilanciere con una presa a larghezza spalle ed i pollici rivolti verso l’esterno, tenendo le braccia distese sull’apposito sostegno della panca.
Movimento: flettere le braccia, portando il bilanciere al mento.
Scopo esercizio: esercizio molto comune nei programmi di bodybuilding che si focalizza sui bicipiti concentrando il lavoro soprattutto sulla parte del bicipite più vicina all’articolazione del gomito (parte distale). Viene inoltre coinvolta la muscolatura degli avambracci e può essere inserito nell’ultima parte dell’allenamento per i bicipiti per andare a lavorare sul dettaglio muscolare.
Respirazione: inspirare distendendo le braccia ed espirare flettendole.
Consigli: nella fase di discesa, fermarsi un attimo prima di raggiungere la completa distensione delle braccia.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Plank', 'Addominali', '../fotoesercizi/Addominali/plank.png', 'Posizione iniziale: sdraiarsi sul tappetino con la schiena a terra. Piegare le gambe, tenendo i piedi appogiati a terra ed intrecciare le mani dietro la nuca.
Movimento: flettere il busto in avanti, sollevando dal tappetino a parte superiore del busto.
Scopo esercizio: esercizio a corpo libero molto comune che concentra il lavoro sulla sezione centrale dell’addome (retto dell’addome) ed in parte anche a livello dei fianchi (obliqui). Viene solitamente effettuato con un alto numero di ripetizioni.
Respirazione: inspirare abbassando il busto sul tappetino ed espirare flettendolo.
Consigli: esercizio adatto anche per i principianti.
Errori: sollevare dal tappetino anche la parte bassa della schiena, far forza con le braccia per aiutarsi a flettere il busto e sollevare i piedi da terra.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Crunch', 'Addominali', '../fotoesercizi/Addominali/crunch.png', 'Posizione iniziale: posizionarsi su un tappetino, sorreggendosi sulle braccia e sulle punte dei piedi. Il corpo è sollevato da terra, con le gambe vicine, distese ed in linea con il busto. 
Movimento: mantenere la posizione, concentrandosi sulla concentrazione a livello addominale.
Scopo esercizio: lavoro specifico per l’allenamento della muscolatura degli addominali. Si tratta anche si un ottimo esercizio posturale, che migliora le capacità di equilibrio. Permette di rinforzare la muscolatura della schiena, rassodare i glutei e migliorare il tono delle gambe.
Respirazione: respirare normalmente.
Consigli: assicurarsi che in gomiti si trovino in linea con le spalle e ai principianti si consiglia di tenere la posizione per pochi secondi, andando poi ad incrementare il tempo gradualmente.
Errori: spostare il bacino al di sopra o al di sotto della linea tra gambe e busto e piegare le gambe. 
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Sit-Up', 'Addominali', '../fotoesercizi/Addominali/situp.png', 'Posizione iniziale: sedersi inclinando leggermente il busto indietro e tenere le braccia e gambe distese in avanti, senza toccare terra con i piedi.
Movimento: piegare le gambe avvicinando le ginocchia al petto ed eseguendo una piccola flessione del busto in avanti.
Scopo esercizio: migliora il tono della muscolatura addominale e coinvolge anche i quadricipiti (retto femorale).
Respirazione: inspirare distendendo le gambe ed espirare flettendole.
Consigli: cercare di mantenere l’equilibrio sul bosu durante l’esercizio.
Errori: toccare terra con i piedi.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Lat Machine', 'Dorso', '../fotoesercizi/Dorso/latmachine.png', 'Posizione iniziale: sedersi alla lat machine, incastrando le gambe sotto gli appositi rulli e tenendo il busto dritto. Distendere le braccia verso l’alto, andando ad impugnare la sbarra con una presa un po’ più larga delle spalle ed i pollici rivolti verso l’interno. 
Movimento: tirare la sbarra verso di sè, facendole sfiorare la parte alta del petto.
Scopo esercizio: esercizio molto comune nei programmi di fitness e bodybuilding, utilizzato per migliorare la forza ed il volume della muscolatura del dorso. Questo tipo di impugnatura tende a concentrare il lavoro più sull’area superiore e laterale della schiena, andando a coinvolgere anche il fascio posteriore della spalla (deltoide posteriore). Vengono inoltre interessati i bicipiti e la muscolatura degli avambracci.
Respirazione: Inspirare distendendo le braccia verso l’alto ed espirare portando la sbarra sulla parte alta del petto. 
Consigli: esercizio che può essere svolto dai principianti come alternativa alle trazioni alla sbarra.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Low Row', 'Dorso', '../fotoesercizi/Dorso/lowrow.png', 'Posizione iniziale: sedersi sul sellino del macchinario, tenendo il busto ben appoggiato contro il cuscinetto. Distendere le braccia in avanti, andando ad afferrare con le mani le impugnature dell’attrezzo, con i palmi delle mani rivolti verso l’interno.
Movimento: tirare le impugnature verso di sè.
Scopo esercizio: esercizio che si focalizza sulla muscolatura della schiena, andandola a lavorare in modo completo. Il movimento determina inoltre la partecipazione del fascio posteriore della spalla (deltoide posteriore).
Respirazione: inspirare distendendo le braccia in avanti ed espirare tirando le impugnature verso di sè.
Consigli: esercizio semplice ed adatto a tutti che può anche essere utilizzato come alternativa al pulley.
Errori: staccare il busto dal cuscinetto, eseguire il movimento in modo parziale, senza distendere bene le braccia, ed allargare i gomiti verso l’esterno. 
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Trazioni', 'Dorso', '../fotoesercizi/Dorso/pullup.png', 'Posizione iniziale: posizionarsi sotto la sbarra per le trazioni impugnando con i palmi delle mani verso l’esterno (impugnatura pronata), con le braccia mani più larghe delle spalle.
Movimento: corpo disteso con le gambe in linea con il busto, o piegate in dietro, eseguire la trazione piegando i gomiti, portando le spalle a toccare la sbarra, controllando poi il ritorno. 
Scopo esercizio: esercizio che coinvolge tutta la parte bassa e laterale della schiena, usato sia per la forza che la massa del muscolo gran dorsale.
Respirazione: inspirare con le braccia tese ed espirare durante la trazione.
Consigli: esercizio difficile poco adatto ai principianti perché si lavora con il proprio peso corporeo. Per i principianti si consiglia l’utilizzo dell’easy power, macchina per le trazioni dotata di contrappeso, ottima per imparare.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Squat', 'Quadricipiti', '../fotoesercizi/Quadricipiti/squat.png', 'Posizione iniziale: posizione del corpo eretta, con i piedi larghezza bacino e sguardo in avanti testa alta. Impugnare i manubri con i palmi delle mani all’interno e le braccia parallele al busto.
Movimento: compiere un passo in avanti poco più lungo del passo normale e piegare entrambe le gambe in modo da creare un angolo di 90° gamba-coscia, sia con la gamba anteriore sia con quella posteriore. La gamba davanti spinge verso l’alto-dietro ritornando piedi paralleli. All’andata si appoggia prima il tallone poi la pianta del piede, mentre al ritorno si solleva prima la punta del piede poi il tallone.
Scopo esercizio: con la gamba anteriore c’è interessamento di gluteo e quadricipite e con quella posteriore c’è interessamento del femorale.
Respirazione: si inspira nella fase di andata e si espira nella fase di ritorno.
Consigli: imparare il movimento senza pesi e poi con i manubri. Lo sguardo sempre in avanti alto, dato che abbassare lo sguardo sposta il baricentro in avanti. Durante il movimento mantenere i piedi paralleli.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Leg Press', 'Quadricipiti', '../fotoesercizi/Quadricipiti/legpress.png', 'Posizione iniziale: seduti alla macchina, regolare la seduta in modo da avere le ginocchia libere. Il rullo va regolato in modo da averlo sul collo del piede, con i piedi a martello, e più avanti rispetto la verticale delle gambe.
Movimento: distendere le gambe in avanti, controllando il movimento e il ritorno.
Scopo esercizio: esercizio di isolamento sul quadricipite con interessamento dei vasti laterale e mediale. 
Respirazione: inspirare quando le gambe sono basse ed espirare durante la distensione.
Consigli: lavorare iniziando l’esecuzione con le gambe in avanti rispetto alla verticale, in questo modo si ha un lavoro muscolare e non articolare. Se si vuole localizzare il lavoro più sul vasto mediale, basta aprire leggermente la punta dei piedi in fuori.
Errori: farsi aiutare nella distensione alzando i glutei dalla seduta, fatto da chi parte con i talloni sotto la seduta e carichi elevati. 
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Affondi', 'Quadricipiti', '../fotoesercizi/Quadricipiti/affondi.png', 'Posizione iniziale: seduto alla pressa 45° con la schiena ben aderente allo schienale, appoggiare i piedi, con una larghezza pari a quella delle spalle, sulla pedana.
Movimento: scendere lentamente fino ad un piegamento di circa 90° e spingere il peso fino alla posizione iniziale.
Scopo esercizio: lavora sull’intero muscolo quadricipite agendo sul vasto mediale-interno, su quello esterno e sul retto femorale. Come muscoli secondari coinvolge sia i glutei che le parte posteriore delle cosce (muscoli femorali).
Respirazione: inspirare durante la fase di discesa della pedana ed espirare durante la fase di sforzo e di salita del peso.
Consigli: la posizione dei piedi influenza il punto di maggior interesse dell’esercizio. Appoggiando infatti i piedi verso l’alto della pedana l’esercizio coinvolge maggiormente i glutei e i femorali, mentre posizionando i piedi verso il basso della pedana si isolano maggiormente i quadricipiti. Anche la larghezza dei piedi influenza il settore di maggior lavoro, infatti con i piedi ravvicinati si accentua il lavoro sui quadricipiti esterni (vasto laterale), mentre con i piedi ad un’ampiezza maggiore delle spalle si focalizza il lavoro sul vasto interno.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Leg Extension', 'Quadricipiti', '../fotoesercizi/Quadricipiti/legextension.png', 'Posizione iniziale: in piedi, con piedi leggermente distanziati tra loro a larghezza bacino. Posizionare il bilanciere sulla parte alta della schiena, impugnandolo ad una larghezza leggermente superiore a quella delle spalle.
Movimento: portare il bacino indietro ed abbassarsi, piegando le ginocchia. Tenere la schiena dritta durante il movimento.
Scopo esercizio: esercizio molto comune per migliorare la forza ed il volume muscolare a livello dei quadricipiti e dei glutei. Il movimento prevede inoltre l’interessamento degli addominali. Viene generalmente inserito come primo esercizio all’inizio dell’allenamento per le gambe e, in alcuni casi, può prevedere l’utilizzo di carichi anche piuttosto elevati, con un numero di ripetizioni basso.
Respirazione: inspirare prima di iniziare il movimento, trattenere il respiro abbassandosi ed espirare raggiungendo la posizione in piedi nell’ultima fase del movimento.
Consigli: durante il movimento si consiglia di andare a scaricare il peso del corpo più sui talloni. Inoltre bisogna tenere le spalle ben indietro, in modo tale da formare una stabile base d’appoggio per il bilanciere con la parte alta della schiena.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Calf Machine Seduto', 'Polpacci', '../fotoesercizi/Polpacci/calfseduto.png', 'Posizione iniziale: seduti alla calf machine, appoggiare l’avampiede sul supporto e portare i talloni il più in basso possibile. Il cuscino della macchina deve essere appoggiato nella parte inferiore (vicino alle ginocchia) della gamba. 
Movimento: sollevare i talloni il più in alto possibile e, dopo un attimo di contrazione, tornare lentamente alla posizione iniziale.
Scopo esercizio: è un esercizio di isolamento che lavora su tutto il muscolo del polpaccio, sia il capo mediale interno che quello laterale esterno.
Respirazione: espirare durante la fase di contrazione muscolare ed inspirare durante la fase di discesa verso la posizione iniziale.
Consigli: modificando la posizione dei piedi si altera la zona di maggior lavoro dell’esercizio. Con i piedi paralleli il lavoro sarà uniforme su tutto il polpaccio, con i piedi convergenti si sollecita meglio la parte esterna del polpaccio, mentre con i piedi divergenti si sollecita meglio la parte interna.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Calf alla pressa', 'Polpacci', '../fotoesercizi/Polpacci/calfpressa.png', 'Posizione iniziale: seduti alla pressa orizzontale, con schiena appoggiata, gambe leggermente flesse, punta dei piedi appoggiata sulla pedana e i talloni fuori.
Movimento: spingere con la punta dei piedi verso il corpo, mantenendo ferme le ginocchia. Nella fase di ritorno si può riportare i talloni in linea con la punta dei piedi o portare i talloni più bassi, cosi da aumentare l’escursione.
Scopo esercizio: esercizio che coinvolge il polpaccio, con maggior interesse nella parte esterna del muscolo.
Respirazione: inspirare prima di iniziare il movimento ed espirare durante la spinta.
Consigli: esercizio semplice, privo di rischi, dato dal movimento guidato. Può essere usato come alternativa all’esercizio con bilanciere e consente carichi maggiori con la schiena protetta.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Stacco Rumeno', 'Femorali', '../fotoesercizi/Femorali/staccorumeno.png', 'Posizione iniziale: in piedi, schiena dritta, gambe larghezza bacino, impugnare il bilanciere con i palmi delle mani verso il corpo e le braccia distese verso il basso. 
Movimento: facendo scorrere il bilanciere sulle cosce, scendere con il bilanciere sotto alle ginocchia con schiena dritta e sguardo in avanti, contraendo glutei e femorali per risalire.
Scopo esercizio: interessa glutei e femorali, lavorando nella zona dove finisce il gluteo e iniziano i femorali.
Respirazione: inspirare in discesa ed espirare durante il movimento nel ritorno.
Consigli: esercizio non facile e delicato, dunque non adatto ai principianti. Imparare bene il movimento con carichi bassi e contrarre gli addominali nel ritorno in modo da stabilizzare il bacino.
Errori: incurvare la schiena in fase di discesa.
');

INSERT INTO esercizi (nome, muscolo, immagine, descrizione) 
VALUES ('Leg Curl Seduto', 'Femorali', '../fotoesercizi/Femorali/legcurl.png', 'Posizione iniziale: sedersi alla macchina regolando il sedile in modo che la schiena sia appoggiata comoda, con i rulli dietro alle ginocchia e il cuscino che blocca le ginocchia sulla parte bassa delle cosce.
Movimento: partendo con le gambe distese in avanti, flettere le ginocchia portando i rulli sotto il sedile della seduta, controllando la fase di ritorno.
Scopo esercizio: esercizio di isolamento del bicipite femorale.
Respirazione: inspirare quando le gambe sono tese in avanti ed espirare durante il movimento di flessione.
Consigli: assicurarsi che l’articolazione sia libera durante il movimento e che non si abbiano sensazioni di blocco.
');