<section>
    <h2>Notifiche</h2>
    <?php foreach($templateParams["notifiche"] as $notifica): ?>
        <?php $notification = $dbh->getNotificationById($notifica["notifica"]); echo var_dump($notification);?>
        <div id="notification-list">
            <div class="notification" id=<?php echo $notifica["notifica"]; ?>>
                <p><?php echo $notification["contenutonotifica"]; ?></p>
                <div class="notificatio-actions">
                    <input type="checkbox" id="<?php echo $notifica["notifica"];?>" name="notifiche[]" value="<?php echo $notifica["notifica"];?>"
                    <?php 
                    if($notification["letto"] == 1){ 
                        echo ' checked="checked" '; 
                    } ?> onclick="<?php $dbh->setLetto($notifica["notifica"], 1) ?>"/>
                    <label for="<?php echo $notifica["notifica"]; ?>">Letto</label>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>