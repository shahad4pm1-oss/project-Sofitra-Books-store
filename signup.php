<?php
require_once 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        $message = "Passwords do not match!";
    } else {
        // Check if email already exists
        $check_sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $message = "Email already registered!";
        } else {
            // Hash password and insert
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("sss", $fullname, $email, $hashed_password);

            if ($stmt->execute()) {
                header("Location: login.php?signup=success"); // Redirect to login page
                exit();
            } else {
                $message = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Sofitra Books</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <nav>
        <a href="home.php" class="button">← Back to Home</a>
        <a href="index.html" class="button">Log Out</a>
    </nav>

    <header>
        <h1>Create Your Account</h1>
        <p>Join Sofitra Books and start your reading journey!</p>
    </header>

    <main class="container">

        <section>
            <?php if (!empty($message))
                echo "<p style='color:red; text-align:center;'>$message</p>"; ?>
            <form class="page1" action="signup.php" method="POST">

                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="confirm">Confirm Password:</label>
                    <input type="password" id="confirm" name="confirm" required>
                </div>

                <button type="submit" style="width: 100%; margin-top: 10px;">Register</button>
            </form>
        </section>

        <section style="text-align: center; margin-top: 20px;">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </section>

    </main>



    <footer>
        <p>&copy; 2025 Sofitra Books. All rights reserved.</p>
    </footer>

</body>

</html>