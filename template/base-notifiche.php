

<section>
    <h2>Notifiche:</h2>
    <?php foreach($templateParams["notifiche"] as $notifica): ?>
        <?php $notification = $dbh->getNotificationById($notifica["notifica"]); ?>
        <div id="notification-list"><a href="#" onclick="<?php $dbh->setLetto($notifica["notifica"], 1); ?>">
            <div class="notification" id=<?php echo $notifica["notifica"]; ?>>
                <p><?php echo $notification[0]["contenutonotifica"]; ?></p>
                <div class="notificatio-actions">
                    <?php 
                    if($notification[0]["letto"] == 1):?>
                        <style>.notification{background-color: orange;}</style>
                        
                    <?php endif ?> 
                    <label for="<?php echo $notifica["notifica"]; ?>">Letto</label>
                </div>
            </div>
        </a></div>
    <?php endforeach; ?>
</section>