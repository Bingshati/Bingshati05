<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="event.css">
</head>

<body>
    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="banner">
        <img src="images/banner3.jpg" alt="Event Banner">
    </div>

    <!-- Music Event Section -->
    <section class="event-details">
        <h2>Comedy Show</h2>
        <div class="row event-row">
            <!-- Event Image -->
            <div class="col-md-6 event-image">
                <img src="images/bassi.jpg" alt="Music Event">
            </div>
            <!-- Event Information -->
            <div class="col-md-6 event-info">
                <h3>Kisi Ko Batana Mat Ft. Anubhav Singh Bassi</h3>
                <p><strong>Location:</strong> Nazrul Mancha: Kolkata, Southern Ave, Golpark, Beside Ramkrishna Mission, Near Rabindra Sarobar, Kolkata, West Bengal 700029, India.</p>
                <p><strong>Date:</strong> October 11, 2024</p>
                <p><strong>Time:</strong> 7pm</p>
                <p><strong>Description:</strong> After the great success of his previous show Bas kar bassi, Anubhav Singh Bassi is coming back to perform live on stage. This time, he will bring a whole new set of funny stories and jokes that will keep you entertained. Get ready to enjoy an exciting and hilarious performance that will make you laugh uncontrollably and leave you in high spirits.</p>
                <p><strong>Price:</strong> ₹799</p>

                <!-- Booking Button -->
                <?php
                session_start();
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                    echo '<a href="book_event.php?event_id=1" class="btn custom-btn">Book Now</a>';
                } else {
                    echo '<a href="login.php" class="btn custom-btn">Book Now</a>';
                    echo '<p class="text-danger mt-2">Please log in to book this event.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- FOOTER AREA -->
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

