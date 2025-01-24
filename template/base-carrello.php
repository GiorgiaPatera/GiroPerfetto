<section>
    <h2>Veicoli nel carrello</h2>
    <?php foreach($templateParams["articoli"] as $articolo): ?>
    <div id="car-list">
        <h3><?php echo $articolo["titoloarticolo"]; ?></h3>
        <div class="car" id=<?php echo $articolo["idarticolo"]; ?>>
            <div><img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" /></div>
            <p><?php echo $articolo["testoarticolo"]; ?></p>
            <p><?php echo "€"; echo $articolo["prezzoarticolo"]; ?></p>
            <div class="car-actions">
                <button class="buy"><a href="">Compra</a></button>
                <button class="delete"><a href="">Cancella</a></button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>