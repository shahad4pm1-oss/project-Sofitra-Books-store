<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'User';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sofitra Books</title>
    <style>
        /* Page background and text */
        body {
            background-color: beige;
            color: brown;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #fdf5e6;
            padding: 15px;
            border-bottom: 1px solid brown;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: bold;
            font-size: 20px;
            color: brown;
            text-decoration: none;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .welcome-msg {
            font-weight: bold;
            color: brown;
        }

        .logout-btn {
            background-color: brown;
            color: beige;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero {
            animation: fadeIn 1s ease-out;
        }

        .grid-container {
            animation: fadeIn 1.2s ease-out;
        }

        header {
            animation: fadeIn 0.8s ease-out;
        }

        .hero h1 {
            color: brown;
            margin-top: 40px;
        }

        .hero p {
            color: #5c3d2e;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background-color: #fdf5e6;
            border: 1px solid brown;
            border-radius: 8px;
            padding: 20px;
            text-decoration: none;
            color: brown;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #5c3d2e;
            font-size: 14px;
        }

        .card-arrow {
            margin-top: 10px;
            font-weight: bold;
            color: brown;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #5c3d2e;
            padding: 20px;
        }
    </style>
</head>

<body>

    <header>
        <a href="home.php" class="logo">Sofitra Books</a>
        <div class="user-profile">
            <span class="welcome-msg">Hello, <?php echo htmlspecialchars($fullname); ?>!</span>
            <a href="login.php?logout=true" class="logout-btn">Logout</a>
        </div>
    </header>

    <main>
        <div class="hero">
            <h1>Discover Your Next Great Adventure</h1>
            <p>Welcome to your personal dashboard. Explore our collection, manage your account, or get in touch with us.
            </p>
        </div>

        <div class="grid-container">
            <!-- Buy Books -->
            <a href="Categories.html" class="card">
                <h3> Browse Collection</h3>
                <p>Explore a vast library of books across multiple genres and find your perfect read today.</p>
                <div class="card-arrow">Start Reading →</div>
            </a>

            <!-- Payment -->
            <a href="payment.html" class="card">
                <h3>Secure Payment</h3>
                <p>Fast and secure checkout options including Apple Pay and credit cards.</p>
                <div class="card-arrow">Go to Payment →</div>
            </a>

            <!-- About Us -->
            <a href="about us.html" class="card">
                <h3> About Sofitra</h3>
                <p>Learn more about our mission, our story, and the team behind the books.</p>
                <div class="card-arrow">Read More →</div>
            </a>

            <!-- Contact -->
            <a href="contact.html" class="card">
                <h3> Contact Support</h3>
                <p>Have questions? Reach out to our 24/7 support team for assistance.</p>
                <div class="card-arrow">Get in Touch →</div>
            </a>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Sofitra Books. Crafted with passion.</p>
    </footer>

</body>

</html>