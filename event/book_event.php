<?php
$con = new mysqli("localhost", "root", "", "event");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['event_id'])) {
    $event_id = intval($_GET['event_id']);
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
    <title>Order <?= htmlspecialchars($event['m_name']); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
   
    <style>
       /* Header styling */
        header {
            background-color: black;
            padding: 10px 0;
        }

        header nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        header nav ul li {
            margin: 0 15px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        header nav a:hover {
            color: #ffdd57;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .card-img-top {
            height: 300px;
            width: 80%; /* Ensure the image takes the full width */
            object-fit: cover;
        }
        
        .btn{
            background-color: #212529;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .btn:hover{
            background-color: black;
        }

        .footer {
            background-color: black;
            color: #ffffff;
            padding: 40px 0;
            margin-top: 80px;
        }

        .footer h5 {
            color: #ffffff;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .footer p {
            color: #f4f4f4;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 10px;
        }

        .footer ul li a {
            color: #f4f4f4;
            text-decoration: none;
        }

        .footer ul li a:hover {
            text-decoration: underline;
        }

        .footer .social-icons a {
            color: #ffffff;
            font-size: 18px;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .footer .social-icons a:hover {
            color: #f4f4f4;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="login.html">Events</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
<div class="container">
    <h2 class="text-center my-4">Booking Details</h2>
    <div class="row">
        <div class="col-md-4">
            <img class="card-img-top" src="<?= htmlspecialchars($event['m_image']); ?>" alt="<?= htmlspecialchars($event['m_name']); ?>">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($event['m_name']); ?></h5>
                <h5 class="card-title"><?= htmlspecialchars($event['m_tag']); ?></h5>
                <h5 class="card-title"><?= htmlspecialchars($event['m_date']); ?></h5>
                <h5 class="card-title"><?= htmlspecialchars($event['m_time']); ?></h5>
                <h5 class="card-title">Price: <?= htmlspecialchars($event['m_price']); ?></h5>
            </div>
        </div>
    </div>

    <!-- Payment Form -->
    <form action="billing.php" method="POST" class="mt-4">
        <input type="hidden" name="event_id" value="<?= htmlspecialchars($event_id); ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-block">Submit Order</button>
    </form>
</div>

<!-- Footer section -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Company Information -->
            <div class="col-md-4">
                <h5>BlissHive</h5>
                <p>BlissHive: Crafting Moments, Creating Memories.</p>
                <p>&copy; 2024 Event Booking Platform. All rights reserved.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p><i class="fas fa-map-marker-alt"></i> NewTown, Kolkata</p>
                <p><i class="fas fa-phone"></i> +91 8240546461</p>
                <p><i class="fas fa-envelope"></i> Bliss@Hive</p>

                <!-- Social Media Links -->
                <div class="social-icons">
                    <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
