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
        <img src="images/banner2.jpg" alt="Event Banner">
    </div>

    <!-- Music Event Section -->
    <section class="event-details">
        <h2>Art Exhibition</h2>
        <div class="row event-row">
            <!-- Event Image -->
            <div class="col-md-6 event-image">
                <img src="images/art.jpg" alt="Music Event">
            </div>
            <!-- Event Information -->
            <div class="col-md-6 event-info">
                <h3>India Art Festival</h3>
                <p><strong>Location:</strong>  16, Lake Temple Rd, Lake Range, Kalighat, Kolkata, West Bengal 700029</p>
                <p><strong>Date:</strong> September 16, 2024</p>
                <p><strong>Time:</strong> 12pm</p>
                <p><strong>Description:</strong> The India Art Festival, a contemporary art fair, is a vibrant celebration of art and creativity, showcasing the paintings and sculptural work of 450 artists in diverse artistic styles across 100 booths. The art festival promises to be a feast for the senses with 3500 paintings and sculptures on display. In addition to the visual art, attendees can also enjoy Fusion shows, including live music, art performances, and painting demos on all days. The daily film screening - ‘The Eternal Canvas’ offers viewers a journey through 12,000 years of Indian art.</p>
                <p><strong>Price:</strong> ₹299</p>

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

