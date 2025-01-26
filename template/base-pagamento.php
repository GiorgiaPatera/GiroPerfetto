<head>
    <style>
        /* Stile mobile-first */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            font-size: 24px;
            color: #90caf9;
            text-align: center;
            margin: 20px 0;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .product-images img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .product-details {
            text-align: center;
            padding: 0 20px;
        }

        .prezzo {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            margin: 10px 0;
        }

        .pagament-products {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s;
        }


        /* Media Query for larger screens */
        @media (min-width: 768px) {
            .product {
                flex-direction: column;
                justify-content: space-between;
                align-items: flex-start;
                width: 70%;
            }

            .product-images img {
                margin-right: 20px;
            }

            .product-details, h1 {
                max-width: 50%;
                text-align: left;
            }

            .pagament-products {
                width: 30%;
                margin: 20px 0;
                padding: 20px;
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
            <?php $venditore= $dbh->getAuthorbyidArticle($articolo["idarticolo"])[0]; ?>
            <p><?php echo $venditore["nome"]; ?></p>
            <p><?php echo $venditore["brevedescrizione"]; ?></p>
            <p><?php echo $venditore["username"]; ?></p>
            <div class="add-to-cart">
                <button><a href="carrello.php?id=<?php echo $articolo["idarticolo"] ?>" style="color: white; text-decoration: none;">Aggiungi al carrello</a></button>
            </div>
            <p><b>Lo vuoi? Affrettati, sta per finire!</b></p>
        </div>
    </div>

    <div class="pagament-products">
        <section>
            <h2>Effettua il pagamento:</h2>
            <form action="articolo-pagato.php?id=<?php echo $articolo["idarticolo"]; ?>" method="POST">
                <div class="form-group">
                    <label for="intestatario">Nome Intestatario Carta:</label>
                    <input type="text" id="intestatario" placeholder="Mario Rossi" required>
                </div>
                <div class="form-group">
                    <label for="numerocarta">Numero carta:</label>
                    <input type="text" id="numerocarta" placeholder="0000 0000 0000 0000" required />
                </div>
                <div class="form-group">
                    <label for="scadenza">Scadenza:</label>
                    <input type="month" id="scadenza" placeholder="XX/XX" required />
                </div>
                <div class="form-group">
                    <label for="cvc">CVV/CVC:</label>
                    <input type="password" id="cvc" placeholder="XXX" required />
                </div>
                <input type="submit" class="btn-submit" name="submit" value="Paga" onclick="mostraNotifica()" />
            </form>
        </section>
    </div>
</div>

<script type="text/javascript">
    function mostraNotifica(){
        window.alert("Pagamento Accettato");
    }
</script>
