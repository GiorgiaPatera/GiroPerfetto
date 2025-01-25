<section>
    <h2>Veicoli nel carrello:</h2>
        <?php if ($_SESSION['cart'] != []){
            foreach($_SESSION['cart'] as $articolo): ?>
                <div id="car-list">
                    <h3><?php echo $articolo["titoloarticolo"]; ?></h3>
                    <div class="car" id=<?php echo $articolo["idarticolo"]; ?>>
                        <div><img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" /></div>
                        <p><?php echo $articolo["testoarticolo"]; ?></p>
                        <p><?php echo "€"; echo $articolo["prezzoarticolo"]; ?></p>
                        <div class="car-actions">
                            <button class="buy"><a href="">Compra</a></button>
                            <button class="delete"><a href="elimina-dal-carrello.php?id=<?php echo $articolo["idarticolo"]; ?>">Cancella</a></button>
                        </div>
                    </div>
                </div>
        <?php endforeach;} ?>
</section>