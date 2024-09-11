<?php
// Database connection
$con = new mysqli("localhost", "root", "", "event");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the event ID from the form
if (isset($_POST['event_id'])) {
    $event_id = intval($_POST['event_id']);
    
    // Fetch event details from the database
    $sql = "SELECT * FROM music WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $event_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
    } else {
        echo "Event not found.";
        exit;
    }
} else {
    echo "No event selected.";
    exit;
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ticket - <?= htmlspecialchars($event['m_name']); ?></title>
    <style>
        :root {
            --primary-color: #4872b0;
            --grey-color: #E0E0E0;
            --text-color: #757575;
            --bg-white: #fff;
        }

        .ticket {
            display: flex;
            font-family: Roboto, sans-serif;
            margin: 16px;
            border: 1px solid var(--grey-color);
            position: relative;
            max-height: 330px;
        }

        .ticket:before,
        .ticket:after {
            content: '';
            width: 32px;
            height: 32px;
            background-color: var(--bg-white);
            border: 1px solid var(--grey-color);
            border-radius: 50%;
            position: absolute;
            z-index: 1;
        }

        .ticket:before {
            border-top-color: transparent;
            border-left-color: transparent;
            left: -18px;
            top: 50%;
            transform: translateY(-50%) rotate(-45deg);
        }

        .ticket:after {
            border-top-color: transparent;
            border-left-color: transparent;
            right: -18px;
            top: 50%;
            transform: translateY(-50%) rotate(135deg);
        }

        .ticket--start {
            position: relative;
            border-right: 1px dashed var(--grey-color);
            padding: 24px;
        }

        .ticket--start img {
            display: block;
            height: 270px;
            width: auto;
        }

        .ticket--center {
            padding: 24px;
            flex: 1;
        }

        .ticket--center--row {
            display: flex;
            margin-bottom: 48px;
        }

        .ticket--center--col {
            flex: 1;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            padding-right: 16px;
        }

        .ticket--center--col:first-child span {
            color: var(--primary-color);
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 500;
            line-height: 24px;
        }

        .ticket--center--col:first-child strong {
            font-size: 20px;
            font-weight: 400;
            text-transform: uppercase;
        }

        .ticket--info--title {
            text-transform: uppercase;
            color: var(--text-color);
            font-size: 13px;
            line-height: 24px;
            font-weight: 600;
        }

        .ticket--info--subtitle {
            font-size: 16px;
            line-height: 24px;
            font-weight: 500;
            color: var(--primary-color);
        }

        .ticket--info--content {
            font-size: 13px;
            line-height: 24px;
            font-weight: 500;
        }

        .ticket--end {
            padding: 24px;
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            color: white;
        }

        .ticket--end img {
            width: 128px;
            padding: 4px;
            background-color: var(--bg-white);
            margin-bottom: 16px;
        }

        .qr-code {
            width: 128px;
            height: 128px;
            display: block;
            margin: 0 auto;
        }
        
    </style>
</head>
<body>

<div class="ticket">
    <div class="ticket--start">
        <img src="<?= htmlspecialchars($event['m_image']); ?>" alt="<?= htmlspecialchars($event['m_name']); ?>">
    </div>
    <div class="ticket--center">
        <div class="ticket--center--row">
            <div class="ticket--center--col">
                <span>Your ticket for</span>
                <strong><?= htmlspecialchars($event['m_name']); ?></strong>
                <strong><?= htmlspecialchars($event['m_tag']); ?></strong>
            </div>
        </div>
        <div class="ticket--center--row">
            <div class="ticket--center--col">
                <span class="ticket--info--title">Date and time</span>
                <span class="ticket--info--subtitle"><?= htmlspecialchars($event['m_date']); ?></span>
                <span class="ticket--info--content"><?= htmlspecialchars($event['m_time']); ?></span>
            </div>
            <div class="ticket--center--col">
                <span class="ticket--info--title">Location</span>
                <span class="ticket--info--content"><?= htmlspecialchars($event['m_loc']); ?></span>
            </div>
        </div>
    </div>
    <div class="ticket--end">
        <div>
            <img src="images/logo.png" alt="Company Logo">
        </div>
        <div>
            <img class="qr-code" src="https://upload.wikimedia.org/wikipedia/commons/7/78/Qrcode_wikipedia_fr_v2clean.png" alt="QR Code">
        </div>
    </div>
</div>

</body>
</html>


