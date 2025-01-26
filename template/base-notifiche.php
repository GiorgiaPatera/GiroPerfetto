<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            font-size: 24px;
            margin: 20px;
            color: #90caf9;
        }

        .notification-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .notification {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .notification:last-child {
            border-bottom: none;
        }

        .notification-unread {
            background-color: #e7f3ff; /* Azzurro chiaro */
        }

        .notification-read {
            background-color: #ffffff; /* Bianco */
        }

        .notification:hover {
            background-color: #f0f8ff;
        }

        .notification-icon {
            font-size: 24px;
            margin-right: 15px;
            color: #90caf9;
        }

        .notification-content {
            flex: 1;
        }

        .notification-content p {
            margin: 0;
            font-size: 16px;
        }

        .notification-actions {
            text-align: right;
        }

        .mark-as-read-btn {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #90caf9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .mark-as-read-btn:hover {
            background-color: #004099;
        }
    </style>

<section>
        <h2>Notifiche:</h2>
        <div class="notification-container">
            <?php foreach($templateParams["notifiche"] as $notifica): ?>
                <?php 
                    $notification = $dbh->getNotificationById($notifica["notifica"]); 
                    $isRead = $notification[0]["letto"] == 1 ? "notification-read" : "notification-unread";
                ?>
                <div class="notification <?php echo $isRead; ?>">
                    <div class="notification-icon">🔔</div>
                    <div class="notification-content">
                        <p><?php echo $notification[0]["contenutonotifica"]; ?></p>
                    </div>
                    <div class="notification-actions">
                        <form method="post" action="update-notification.php">
                            <input type="hidden" name="idnotifica" value="<?php echo $notifica['notifica']; ?>">
                            <?php if ($notification[0]["letto"] == 0): ?>
                                <button type="submit" class="mark-as-read-btn">Segna come letto</button>
                            <?php else: ?>
                                <span style="color: #888; font-size: 14px;">Letto</span>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>



