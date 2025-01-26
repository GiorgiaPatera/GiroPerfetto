<!DOCTYPE html>
<html lang="it">
<head>
    <title><?php echo $templateParams["titolo"]; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

    <header>
        <div><h1><?php echo $templateParams["nome"]; ?></h1></div>
        <nav>
            <!-- da modificare -->
            <a href="index.php?page=home">Home</a>
            <a href="index.php?page=offerte">Offerte</a>
            <a href="index.php?page=nuovo">Nuovo</a>
            <a href="index.php?page=usato">Usato</a>
            <a href="index.php?page=notifiche">Notifiche</a>
            <a href="index.php?page=login">Login</a>
        </nav>
        
    </header>

    <main>
    <?php
    if(isset($templateParams["contenuto"])){
        require($templateParams["contenuto"]);
    }
    ?>
    </main>
    
    <footer class="footer">
        <div>GiroPerfetto - La tua prossima auto, oggi!</div>
        <div>Servizi: Vendita auto nuove | Vendita auto usate | Pronta consegna</div>
        <div><img src="img/GiroPerfettoLogo.png" alt=""/></div>
        <div class="subscribe">

            <input type="email" placeholder="Enter Email">
            <a href = "index.php?page=login">Accedi</a>
        </div>
    </footer>
    
</body>
</html>