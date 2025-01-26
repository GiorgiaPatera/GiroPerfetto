<head>
    <style>
         .container {
            width: 100%;
            margin: 20px auto;
            padding: 10px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        .car {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: block;
        }

        .car img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }

        .car p {
            margin: 10px 0;
        }

        .car-actions button {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .car-actions .edit {
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

        .car-actions .edit:hover {
            background-color: #42a5f5;
        }

        .insert {
            background-color: #90caf9;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }

        .insert:hover {
            background-color: #42a5f5;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Stili per schermi più grandi */
        @media (min-width: 768px) {
            div section:nth-child(1){
                width: 20%;
            }
            div section:nth-child(2){
                width: 90%;
            }
            .container {
                max-width: 750px;
                padding: 20px;
            }

            .car {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .car img {
                max-width: 150px;
                margin-right: 20px;
            }

            .car-actions button {
                display: inline-block;
                width: auto;
                margin-left: 10px;
            }

            section {
                margin-bottom: 40px;
            }
        }

        @media (min-width: 1024px) {
            .container {
                max-width: 960px;
            }

            .car {
                padding: 20px;
            }
        }

    </style>
</head>


<div class="container">
    <section>
        <h2>Nome e Cognome: <?php echo $_SESSION["nome"]; ?></h2>
        <p>Email: <?php echo $_SESSION["username"]; ?></p>
        <p>Breve descrizzione: <?php echo implode(',', $dbh->getDescriptionByAuthorId($_SESSION["idvenditore"])[0]); ?></p>
        <button><a href="logout.php">Disconnettiti</a></button>
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