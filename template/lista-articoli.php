

<head>
    <style>
        /* Mobile First Styles */
        .search-cart {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-cart form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .search-cart input[type="text"],
        .search-cart button {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .cart {
            text-align: center;
            font-size: 24px;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar form {
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            margin-bottom: 10px;
        }

        .sidebar div {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .sidebar input[type="checkbox"] {
            margin-right: 10px;
        }

        .content {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .content div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .content aside {
            margin-top: 10px;
            text-align: center;
        }

        /* Tablet and larger screens (min-width: 768px) */
        @media (min-width: 768px) {
            .search-cart {
                width: 400px ;
                flex-direction: row;
                justify-content: space-between;
            }
            .search-cart form{
                flex-direction: row;
            }

            .search-cart input[type="text"] {
                width: 60%;
            }

            .search-cart button {
                width: 20%;
            }

            .container {
                flex-direction: row;
                justify-content: space-between;
            }

            .sidebar {
                width: 25%;
            }

            .content {
                width: 70%;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 20px;
            }

            .content div {
                width: 45%;
            }
        }

        /* Desktop and larger screens (min-width: 1024px) */
        @media (min-width: 1024px) {
            .sidebar {
                width: 20%;
            }

            .content {
                width: 75%;
                gap: 25px;
            }

            .content div {
                width: 30%;
            }
        }
    </style>
</head>

<div class="search-cart">
    <form action="cerca-articoli.php" method="post">
        <input type="text" placeholder="Search" id="cerca" name="cerca" />
        <button type="submit">Cerca</button>
    </form>
    <div class="cart"><a href="carrello.php">🛒</a></div>
</div>

<div class="container">
    <div class="sidebar">
        <form method="post">
            <h2>Veicolo:</h2>
            <?php for ($i = 0; $i < 4; $i++): 
                $categorie = $dbh->getCategories(); 
                $categoria = $categorie[$i]; ?>
                <div>
                    <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>" name="categorie[]" value="<?php echo $categoria["idcategoria"]; ?>" />
                    <label for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
                </div>
            <?php endfor; ?>

            <h2>Colore:</h2>
            <?php for ($i = 4; $i < 8; $i++): 
                $categoria = $categorie[$i]; ?>
                <div>
                    <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>" name="categorie[]" value="<?php echo $categoria["idcategoria"]; ?>" />
                    <label for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
                </div>
            <?php endfor; ?>

            <h2>Carburante:</h2>
            <?php for ($i = 8; $i < 12; $i++): 
                $categoria = $categorie[$i]; ?>
                <div>
                    <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>" name="categorie[]" value="<?php echo $categoria["idcategoria"]; ?>" />
                    <label for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
                </div>
            <?php endfor; ?>

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
        }
    ?>

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

