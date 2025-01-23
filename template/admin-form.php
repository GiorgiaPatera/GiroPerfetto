<head>
    <style>
    /* Stile per la sezione Aggiungi articolo */
        .add-car-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            background: #f4f4f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .add-car-form .form-group {
            display: flex;
            flex-direction: column;
        }

        .add-car-form label {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .add-car-form input,
        .add-car-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .add-car-form textarea {
            resize: none;
            height: 80px;
        }

        .add-car-form .btn-submit, .add-car-form > a {
            padding: 10px 20px;
            background-color: #90caf9;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s;
        }

        .add-car-form .btn-submit:hover,  .add-car-form > a:hover {
            background-color: #42a5f5;
        }
        .add-car-form > a {
            text-decoration: none;
        }
    </style>
</head>

<?php 
    $articolo = $templateParams["articolo"]; 
    $azione = getAction($templateParams["azione"])
?>

<section>
    <h2><?php echo $azione?> Articolo:</h2>
    <form action="processa-articolo.php" method="POST" id="add-car-form" class="add-car-form">
        <?php if($articolo==null): ?>
            <p>Articolo non trovato</p>
        <?php else: ?>
        <div class="form-group">
            <label for="titoloarticolo">Titolo articolo:</label>
            <input type="text" id="titoloarticolo" name="titoloarticolo" placeholder="Inserisci il titolo" required value="<?php echo $articolo["titoloarticolo"]; ?>"/>
        </div>
        <div class="form-group">
            <label for="testoarticolo">Testo articolo:</label>
            <textarea id="testoarticolo" name="testoarticolo" placeholder="Inserisci il testo dell'articolo" required><?php echo $articolo["testoarticolo"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="prezzoarticolo">Prezzo (€):</label>
            <input type="number" id="prezzoarticolo" name="prezzoarticolo" placeholder="Inserisci il prezzo" required value="<?php echo $articolo["prezzoarticolo"]; ?>"/>
        </div>
        <div class="form-group">
        <?php if($templateParams["azione"]!=3): ?>
            <label for="imgarticolo">Immagine Articolo:</label><input type="file" name="imgarticolo" id="imgarticolo" />
            <?php endif; ?>
            <?php if($templateParams["azione"]!=1): ?>
            <img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" />
        <?php endif; ?>
        </div>
        <div>
            <?php foreach($templateParams["categorie"] as $categoria): ?>
            <input type="checkbox" id="<?php echo $categoria["idcategoria"]; ?>" name="categoria_<?php echo $categoria["idcategoria"]; ?>" <?php 
                if(in_array($categoria["idcategoria"], $articolo["categorie"])){ 
                    echo ' checked="checked" '; 
                } 
            ?> /><label for="<?php echo $categoria["idcategoria"]; ?>"><?php echo $categoria["nomecategoria"]; ?></label>
            <?php endforeach; ?>
        </div>
        <input type="submit" class="btn-submit" name="submit" value="<?php echo $azione; ?> Articolo"/>
        <a href="index.php?page=login">Annulla</a>
        <?php if($templateParams["azione"]!=1): ?>
            <input type="hidden" name="idarticolo" value="<?php echo $articolo["idarticolo"]; ?>" />
            <input type="hidden" name="categorie" value="<?php echo implode(",", $articolo["categorie"]); ?>" />
            <input type="hidden" name="oldimg" value="<?php echo $articolo["imgarticolo"]; ?>" />
        <?php endif;?>

        <input type="hidden" name="action" value="<?php echo $templateParams["azione"]; ?>" />
        <?php endif;?>
    </form>
</section>