<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #90caf9;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            max-width: 100%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container section:nth-child(1) {
            width: 40%;
        }
        .car {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .car-actions button {
            margin-left: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .car-actions .edit {
            background-color: #ffc107;
            color: white;
        }
        .car-actions .delete {
            background-color: #dc3545;
            color: white;
        }
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

        .add-car-form .btn-submit {
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

        .add-car-form .btn-submit:hover {
            background-color: #42a5f5;
        }

    </style>
</head>


<div class="container">
    <section>
        <h2>Nome e Cognome: <?php echo $_SESSION["nome"]; ?></h2>
        <p>Email: <?php echo $_SESSION["username"]; ?></p>
        <p>Breve descrizzione: <?php echo "ciao"; ?></p>
    </section>

    <section>
        <h2>Macchine in vendita</h2>
        <?php foreach($templateParams["articoli"] as $articolo): ?>
        <div id="car-list">
        <h3><?php echo $articolo["titoloarticolo"]; ?></h3>
            <div class="car" id=<?php echo $articolo["idarticolo"]; ?>>
                <div><img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="" /></div>
                <p><?php echo $articolo["testoarticolo"]; ?></p>
                <p><?php echo $articolo["prezzoarticolo"]; ?></p>
                <div class="car-actions">
                    <button class="edit" onclick="editCar(1)">Edit</button>
                    <button class="delete" onclick="deleteCar(1)">Delete</button>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>

    <section>
        <h2>Aggiungi un articolo:</h2>
        <form id="add-car-form" onsubmit="addCar(event)" class="add-car-form">
            <div class="form-group">
                <label for="titoloarticolo">Titolo articolo:</label>
                <input type="text" id="titoloarticolo" placeholder="Inserisci il titolo" required />
            </div>
            <div class="form-group">
                <label for="testoarticolo">Testo articolo:</label>
                <textarea id="testoarticolo" placeholder="Inserisci il testo dell'articolo" required></textarea>
            </div>
            <div class="form-group">
                <label for="prezzoarticolo">Prezzo (€):</label>
                <input type="number" id="prezzoarticolo" placeholder="Inserisci il prezzo" required />
            </div>
            <div class="form-group">
                <label for="image-upload">Carica un'immagine:</label>
                <input type="file" id="image-upload" name="image" accept="image/*" />
            </div>
            <button type="submit" class="btn-submit">Aggiungi Articolo</button>
        </form>
    </section>
</div>

<script>
    function editCar(id) {
        //funzione per modificare articolo
    }

    function deleteCar(id) {
        //funzione per eliminare articolo
    }

    function addCar(event) {
        //funzione per aggiungere un articolo
    }
</script>


</html>