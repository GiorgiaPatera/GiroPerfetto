<head>
    <style>
        /* Stile Mobile First */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        section {
            padding: 15px;
        }

        h2 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        #car-list {
            display: flex;
            flex-direction: column; /* Layout verticale su mobile */
            gap: 15px;
            margin-bottom: 20px;
            background-color: #f4f4f9;
            padding: 15px;
            border-radius: 5px;
        }

        .car {
            display: flex;
            flex-direction: column; /* Disposizione verticale per i dettagli dell'articolo */
            gap: 15px;
        }

        .car img {
            width: 100%;
            height: auto;
        }

        .car p {
            font-size: 1em;
        }

        .car-actions {
            display: flex;
            flex-direction: column; /* Disposizione verticale per i bottoni */
            gap: 10px;
        }

        .car-actions button {
            padding: 10px;
            background-color: #90caf9;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
            font-size: 1em;
            text-align: center;
            transition: background-color 0.3s;
        }

        .car-actions button a {
            text-decoration: none;
            color: white;
        }

        .car-actions button:hover {
            background-color: #64b5f6;
        }

        /* Media Queries per schermi più grandi */
        @media (min-width: 600px) {
            #car-list {
                flex-direction: row; /* Layout orizzontale su tablet */
                justify-content: space-between;
            }

            .car {
                flex-direction: row; /* Layout orizzontale per ogni carrello */
            }

            .car img {
                width: 100%; /* Ridurre la dimensione dell'immagine su schermi più larghi */
                height: auto;
            }

            .car p {
                font-size: 1.1em;
            }

            .car-actions {
                flex-direction: row; /* Bottoni affiancati su schermi più larghi */
                gap: 20px;
            }
        }

        @media (min-width: 1024px) {
            .car img {
                width: 100%; /* Ancora più piccolo su desktop */
            }


            .car p {
                font-size: 1.2em;
            }
        }
    </style>
</head>

<section>
    <h2>Veicoli nel carrello:</h2>
    <?php 
    if (isset($_SESSION['idvenditore'])) {
        $id = $dbh->getArticlesByAuthors($_SESSION['idvenditore']);
        if ($id !== NULL) {
            foreach ($id as $article) {
                // Recupera i dettagli dell'articolo
                $articolovenditore = $dbh->getPostById($article["articolo"]);
                foreach ($articolovenditore as $articolo): ?>
                    <div id="car-list">
                        <h3><?php echo $articolo["titoloarticolo"]; ?></h3>
                        <div class="car" id=<?php echo $articolo["idarticolo"]; ?>>
                            <div><img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" /></div>
                            <p><?php echo $articolo["testoarticolo"]; ?></p>
                            <p><?php echo "€"; echo $articolo["prezzoarticolo"]; ?></p>
                            <div class="car-actions">
                                <button class="buy"><a href="pagamento.php?id=<?php echo $articolo["idarticolo"] ?>">Procedi al pagamento</a></button>
                                <button class="delete"><a href="elimina-dal-carrello.php?id=<?php echo $articolo["idarticolo"]; ?>">Cancella</a></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            }
        } else {
            echo "NESSUN ARTICOLO NEL CARRELLO";
        }
    } else {
        echo "EFFETTUARE IL LOGIN PER METTERE ARTICOLI NEL CARRELLO";
    }
    ?>
</section>

