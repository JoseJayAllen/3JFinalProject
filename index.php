<?php
require 'fetchdb.php';

$services = getServices($pdo);
$reviews = getReviews($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellness Spa</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="hero-section">
        <div class="hero-content">
            <h1>Your Wellness Journey Starts Here</h1>
            <p>Relax, rejuvenate, and refresh with our premium spa services.</p>
            <div class="cta-buttons">
                <a href="book.php" class="btn-primary">Book Now</a>
                <a href="services.php" class="btn-secondary">View Services</a>
            </div>
        </div>
    </header>

    <section class="services-overview">
        <h2>Our Popular Services</h2>
        <div class="services-grid">
            <?php foreach ($services as $service): ?>
                <div class="service-card">
                    <img src="images/<?php echo $service['image']; ?>" alt="<?php echo $service['service_name']; ?>">
                    <h3><?php echo $service['service_name']; ?></h3>
                    <p><?php echo $service['description']; ?></p>
                    <p><strong>Price:</strong> $<?php echo $service['price']; ?></p>
                    <a href="booking.php?service=<?php echo urlencode($service['service_name']); ?>" class="btn-primary">Book Now</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="review">
        <h2>What Our Customers Say</h2>
        <div class="review-slider">
            <?php foreach ($reviews as $review): ?>
                <div class="reviews-card">
                    <h3><?php echo $reviews['user_id']; ?></h3>
                    <p>Rating: <?php echo $reviews['rating']; ?>/5</p>
                    <p>"<?php echo $reviews['comment']; ?>"</p>
                </div>  
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="call-to-action">
        <h2>Ready to Begin Your Journey?</h2>
        <p>Create an account or schedule your first session today!</p>
        <a href="signup.php" class="btn-primary">Get Started</a>
    </section>
</body>
</html>
