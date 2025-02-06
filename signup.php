<?php
// signup.php (Backend processing)

$servername = "localhost";  // Your database server name
$username = "your_db_user";     // Your database username
$password = "your_db_password"; // Your database password
$dbname = "your_db_name";       // Your database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password!
        $terms = isset($_POST['terms']) ? 1 : 0; // Check if terms were accepted


        // Check if email already exists (important!)
        $stmt = $conn->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "Error: Email already exists. Please choose a different email.";
        } else {
            $sql = "INSERT INTO users (email, password, terms) VALUES (:email, :password, :terms)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['email' => $email, 'password' => $password, 'terms' => $terms]);

            echo "Signup successful!"; // Or redirect to a thank you page
        }

    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null; // Close the connection
?>