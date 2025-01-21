<div class="search-cart">
        <input type="text" placeholder="Search">
        <div class="cart"><a href="#">🛒</a></div>
    </div>

    <div class="container">
        <div class="sidebar">
            <!-- da modificare -->
            <h2>Veicolo:</h2>
            <form>
                <label for="autovettura"><input type="checkbox" id="autovettura" name="autovettura" /> Autovettura</label>
                <label for="motoveicolo"><input type="checkbox"id="motoveicolo" name="motoveicolo" /> Motoveicolo </label>
                <label for="autocarri"><input type="checkbox" id="autocarri" name="autocarri" /> Autocarri</label>
                <label for="autocaravan"><input type="checkbox" id="autocaravan" name="autocaravan" /> Autocaravan </label>
            </form>
            <h2>Colore:</h2>
            <form>
                <label for="rosso"><input type="checkbox" id="rosso" name="rosso" /> Rosso </label>
                <label for="blu"><input type="checkbox"id="blu" name="blu" /> Blu </label>
                <label for="nero"><input type="checkbox" id="nero" name="nero" /> Nero </label>
                <label for="bianco"><input type="checkbox" id="bianco" name="bianco" /> Bianco </label>
            </form>
            <h2>Carburante:</h2>
            <form>
                <label for="benzina"><input type="checkbox" id="benzina" name="benazina" /> Benzina </label>
                <label for="diesel"><input type="checkbox"id="diesel" name="diesel" /> Diesel </label>
                <label for="elettrica"><input type="checkbox" id="elettrica" name="elettrica" /> Elettrica </label>
                <label for="ibrida"><input type="checkbox" id="ibrida" name="ibrida" /> Ibrida </label>
            </form>
        </div>
    
        <!-- da modificare -->
        <div class="content">
            <?php foreach($templateParams["articoli"] as $articolo): ?>
                    <div><a href = #>

                        <img src = "<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt = "" />
                
                        <aside><?php echo $articolo["titoloarticolo"];?>, prezzo: € <?php echo $articolo["prezzoarticolo"] ?></aside>
                        </a>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>