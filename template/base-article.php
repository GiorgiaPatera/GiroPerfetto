<head>
    <style>
        /* Stile Mobile First */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 15px;
            display: flex;
            flex-direction: column; /* Layout verticale su mobile */
            gap: 20px;
        }

        .product {
            display: flex;
            flex-direction: column; /* Disposizione verticale su dispositivi mobili */
            gap: 20px;
        }

        .product-images img {
            width: 100%;
            height: auto;
            margin: 0;
        }

        .product-details h1 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        .prezzo {
            font-size: 1.2em;
            color: #90caf9;
            margin: 10px 0;
        }

        .product-details p {
            font-size: 1em;
            margin: 5px 0;
        }

        .add-to-cart {
            display: flex;
            flex-direction: column; /* Layout verticale su mobile */
            gap: 10px;
        }

        .add-to-cart button {
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

        .add-to-cart button:hover {
            background-color: #64b5f6;
        }

        .related-products {
            display: flex;
            flex-direction: column; /* Layout verticale su mobile */
        }

        .related-products h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .related-products .content {
            display: grid;
            grid-template-columns: 1fr; /* Solo una colonna su mobile */
            gap: 20px;
        }

        .related-products .content div {
            background-color: #f4f4f9;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .related-products .content img {
            width: 100%;
            height: auto;
        }

        .related-products .content aside {
            margin-top: 10px;
            font-size: 1em;
            color: #333;
        }

        a {
            text-decoration: none;
        }

        /* Media Queries per schermi più grandi */
        @media (min-width: 600px) {
            .product {
                flex-direction: row; /* Layout orizzontale su schermi più larghi */
            }

            .product-images {
                width: 40%;
            }

            .product-details {
                width: 60%;
            }

            .add-to-cart {
                flex-direction: row; /* Layout orizzontale per i bottoni su tablet */
                gap: 20px;
            }

            .related-products .content {
                grid-template-columns: repeat(3, 1fr); /* 3 colonne per tablet */
            }
        }

        @media (min-width: 1024px) {
            .product {
                flex-direction: row; /* Layout orizzontale per desktop */
            }

            .product-images {
                width: 30%;
            }

            .product-details {
                width: 70%;
            }

            .related-products .content {
                grid-template-columns: repeat(4, 1fr); /* 4 colonne per desktop */
            }
        }
    </style>
</head>

<div class="container">
    <?php $articolo = $templateParams["articoli"][0]; ?>
    <div class="product">
        <div class="product-images">
            <img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" />
        </div>
        <div class="product-details">
            <h1><?php echo $articolo["titoloarticolo"]; ?></h1>
            <div class="prezzo"><?php echo "€"; echo $articolo["prezzoarticolo"]; ?></div>
            <p><?php echo $articolo["testoarticolo"]; ?></p>
            <p><b>Venditore:</b></p>
            <?php $venditore = $dbh->getAuthorbyidArticle($articolo["idarticolo"])[0]; ?>
            <p><?php echo $venditore["nome"]; ?></p>
            <p><?php echo $venditore["brevedescrizione"]; ?></p>
            <p><?php echo $venditore["username"]; ?></p>
            <div class="add-to-cart">
                <button><a href="pagamento.php?id=<?php echo $articolo["idarticolo"] ?>">Procedi al pagamento</a></button>
                <button><a href="carrello.php?id=<?php echo $articolo["idarticolo"] ?>">Aggiungi al carrello</a></button>
            </div>
            <p><b>Lo vuoi? Affrettati, sta per finire!</b></p>
        </div>
    </div>

    <div class="related-products">
        <?php $templateParams["articoli"] = $dbh->getRandomPosts(3); ?>
        <h3>Potrebbero piacerti anche questi!</h3>
        <div class="content">
            <?php if (!empty($templateParams["articoli"])): ?>
                <?php foreach ($templateParams["articoli"] as $articolo): ?>
                    <div>
                        <a href="article.php?id=<?php echo $articolo["idarticolo"];?>">
                            <img src="<?php echo UPLOAD_DIR . $articolo["imgarticolo"]; ?>" alt="" />
                            <aside><?php echo $articolo["titoloarticolo"]; ?>, prezzo: € <?php echo $articolo["prezzoarticolo"]; ?></aside>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Non ci sono articoli disponibili per il filtro selezionato.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
