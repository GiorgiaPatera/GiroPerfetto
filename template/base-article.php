<head>
    <style>
        button{
            margin-left: 10px;
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            background-color: #90caf9;
            color: white;
            transition: background-color 0.3s;
        }
        button:hover{
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
            <?php $venditore= $dbh->getAuthorbyidArticle($articolo["idarticolo"])[0]; ?>
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
    <?php $templateParams["articoli"]=$dbh->getRandomPosts(3); ?>
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