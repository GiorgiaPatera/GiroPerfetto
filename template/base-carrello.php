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
