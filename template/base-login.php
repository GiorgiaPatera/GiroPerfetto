<head>
    <style>
        /* Stile Mobile-first */
        main {
            display: flex;
            flex-direction: column;
            padding: 20px;
            gap: 20px;
        }

        .flex-container {
            display: flex;
            flex-direction: column; /* Column layout by default */
            gap: 20px;
            width: 100%;
        }

        .login-form {
            background-color: #90caf9; /* Celeste chiaro */
            border-radius: 10px;
            padding: 20px 30px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%; /* Full width on mobile */
            margin: 0;
        }

        .right-div {
            width: 30%;
            text-align: center;
            max-width: 30%;
            height: auto;
        }

        .login-form h1 {
            color: white;
            margin-bottom: 20px;
        }

        .login-form label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: white;
            font-size: 14px;
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-btn {
            background-color: #4CAF50; /* Verde */
            color: white;
        }

        .login-btn:hover {
            background-color: #45a049;
        }

        .divider {
            margin: 10px 0;
            font-size: 12px;
            color: white;
        }

        .divider::before,
        .divider::after {
            content: "";
            display: inline-block;
            width: 30%;
            height: 1px;
            background-color: white;
            vertical-align: middle;
            margin: 0 5px;
        }

        .register-btn {
            background-color: #007BFF; /* Blu */
            color: white;
        }

        .register-btn:hover {
            background-color: #0056b3;
        }

        /* Media Query for larger screens */
        @media (min-width: 768px) {
            .flex-container {
                flex-direction: row; /* Switch to row layout on larger screens */
                /* justify-content: space-between;*/
                width: 80%;
            }

            .login-form {
                width: 45%; /* 45% width for larger screens */
            }

            .right-div {
                width: 45%; /* 45% width for larger screens */
            }
        }

        @media (min-width: 1024px) {
            .login-form {
                width: 40%; /* 40% width for very large screens */
            }

            .right-div {
                width: 50%; /* 50% width for very large screens */
            }
        }
    </style>
</head>

<div class="flex-container">
    <div class="login-form">
        <h1>Accedi</h1>
        <form action="#" method="POST">
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <label for="username">Email:</label>
            <input type="email" id="username" name="username" placeholder="Inserisci la tua email" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Inserisci la tua password" required />

            <button type="submit" name="submit" class="login-btn">Accedi</button>
        </form>

        <div class="divider">OR</div>

        <button class="register-btn" onclick="window.location.href='index.php?page=registration';">Registrati</button>
    </div>
    <div class="right-div">
        <img src="img/macchina.png" alt="immagineAuto"/>
    </div>
</div>


