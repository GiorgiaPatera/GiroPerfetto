
<head>
    <style>
        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .registration-form {
            background-color: #90caf9;
            border-radius: 10px;
            padding: 20px 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            text-align: left;
            width: 50%;
            margin: auto;
        }

        .registration-form h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .registration-form h1,p{
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        .registration-form label {
            display: block;
            margin-bottom: 5px;
            color: white;
            font-size: 14px;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .registration-form button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
        }

        .registration-form button:hover {
            background-color: #0056b3;
        }

        .image-container {
            width: 50%;
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<div class="flex-container">
    <div class="registration-form">
        <h1><?php echo $templateParams["nome"]; ?></h1>
        <p>Compila il modulo sottostante per registrarti come venditore.</p>
        <form action="#" method="POST">
            <label for="nome">1. Qual è il tuo nome?</label>
            <input type="text" id="nome" name="nome" placeholder="Inserisci il tuo nome" required />

            <label>2. Indirizzo di residenza:</label>
            <input type="text" id="via" name="via" placeholder="Via" required />
            <input type="text" id="comune" name="comune" placeholder="Comune" required />
            <input type="text" id="cap" name="cap" placeholder="CAP" required />

            <label for="username">3. Email:</label>
            <input type="email" id="username" name="username" placeholder="Inserisci la tua email" required />

            <label for="password">4. Password:</label>
            <input type="password" id="password" name="password" placeholder="Inserisci la tua password" required />

            <label for="brevedescrizione">5. Breve descrizione:</label>
            <input type="text" id="brevedescrizione" name="brevedescrizione" placeholder="Inserisci una breve descrizione" required />

            <button type="submit" name="registration">Registrati</button>
        </form>
    </div>

    <div class="image-container">
        <img src="img/macchina.png" alt="Immagine della macchina">
    </div>
</div>


