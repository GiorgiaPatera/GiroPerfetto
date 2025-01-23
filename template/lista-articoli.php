

<div class="search-cart">
        <input type="text" placeholder="Search">
        <div class="cart"><a href="#">🛒</a></div>
    </div>

    <div class="container">
    <div class="sidebar">
    <form method="post">
        <!-- Sezione Veicolo -->
        <h2>Veicolo:</h2>
        <?php for ($i = 0; $i < 4; $i++): 
            $categorie = $dbh->getCategories(); 
            $categoria = $categorie[$i]; ?>
            <div style="display: flex; align-items: center; gap: 5px;">
                <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>" name="categorie[]" value="<?php echo $categoria["idcategoria"]; ?>" />
                <label for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
            </div>
        <?php endfor; ?>

        <!-- Sezione Colore -->
        <h2>Colore:</h2>
        <?php for ($i = 4; $i < 8; $i++): 
            $categoria = $categorie[$i]; ?>
            <div style="display: flex; align-items: center; gap: 5px;">
                <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>" name="categorie[]" value="<?php echo $categoria["idcategoria"]; ?>" />
                <label for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
            </div>
        <?php endfor; ?>

        <!-- Sezione Carburante -->
        <h2>Carburante:</h2>
        <?php for ($i = 8; $i < 12; $i++): 
            $categoria = $categorie[$i]; ?>
            <div style="display: flex; align-items: center; gap: 5px;">
                <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>" name="categorie[]" value="<?php echo $categoria["idcategoria"]; ?>" />
                <label for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
            </div>
        <?php endfor; ?>

        <!-- Bottone per inviare il filtro -->
        <button type="submit">Filtra</button>
    </form>
    </div>

    <?php
        if (isset($_POST['categorie']) && is_array($_POST['categorie'])) {
            $categorieSelezionate = $_POST['categorie'];
            $templateParams["articoli"] = [];
            foreach ($categorieSelezionate as $idCategoria) {
                $articoli = $dbh->getPostByCategory($idCategoria);
                $templateParams["articoli"] = array_merge($templateParams["articoli"], $articoli);
            }
        } else {
            //$templateParams["articoli"] = $dbh->getPosts();
        }
    ?>

        <!-- da modificare -->
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
