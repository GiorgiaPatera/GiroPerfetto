<head>
    <style>
        /* Mobile first styles */
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
            text-align: center;
        }

        .notification-container {
            max-width: 100%;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .notification {
            display: flex;
            flex-direction: column; /* Default column layout for small screens */
            align-items: flex-start;
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
            margin-bottom: 10px;
            color: #90caf9;
        }

        .notification-content p {
            margin: 0;
            font-size: 16px;
        }

        .notification-actions {
            width: 100%;
            text-align: right;
            margin-top: 10px;
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

        /* Media Query for larger screens */
        @media (min-width: 768px) {
            .notification {
                flex-direction: row; /* Row layout for wider screens */
                align-items: center;
            }

            .notification-icon {
                margin-right: 15px;
                margin-bottom: 0; /* Remove bottom margin in row layout */
            }

            .notification-actions {
                text-align: right;
                flex: 1;
            }
        }
    </style>
</head>

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




