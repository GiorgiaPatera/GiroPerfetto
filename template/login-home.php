<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #90caf9;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            max-width: 100%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container section:nth-child(1) {
            width: 45%;
        }
        .car {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .car p {
            margin: 20px;
        }
        .car-actions button, .insert, .container > section > button {
            margin-left: 10px;
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .car-actions .edit, .insert, .container > section > button {
            background-color: #90caf9;
            color: white;
            transition: background-color 0.3s;
        }
        .car-actions .delete {
            background-color: darkgrey;
            color: white;
            transition: background-color 0.3s;
        }

        .car-actions .delete:hover {
            background-color: rgb(92, 92, 92);
        }
        .car-actions .edit:hover, .insert:hover, .container > section > button:hover {
            background-color: #42a5f5;
        }
        img {
            margin: 20px;
        }
        a {
            text-decoration: none;
        }

    </style>
</head>


<div class="container">
    <section>
        <h2>Nome e Cognome: <?php echo $_SESSION["nome"]; ?></h2>
        <p>Email: <?php echo $_SESSION["username"]; ?></p>
        <p>Breve descrizzione: <?php echo implode(',', $dbh->getDescriptionByAuthorId($_SESSION["idvenditore"])[0]); ?></p>
        <button>Disconnettiti</button>
    </section>

    <section>
        <h2>Macchine in vendita</h2>
        <?php foreach($templateParams["articoli"] as $articolo): ?>
        <div id="car-list">
            <h3><?php echo $articolo["titoloarticolo"]; ?></h3>
            <div class="car" id=<?php echo $articolo["idarticolo"]; ?>>
                <div><img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" /></div>
                <p><?php echo $articolo["testoarticolo"]; ?></p>
                <p><?php echo "€"; echo $articolo["prezzoarticolo"]; ?></p>
                <div class="car-actions">
                    <button class="edit"><a href="gestisci-articolo.php?action=2&id=<?php echo $articolo["idarticolo"]; ?>">Modifica</a></button>
                    <button class="delete"><a href="gestisci-articolo.php?action=3&id=<?php echo $articolo["idarticolo"]; ?>">Cancella</a></button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <button class="insert"><a href="gestisci-articolo.php?action=1">Aggiungi Articolo</a></button>
    </section>
</div>