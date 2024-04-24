<?php
session_start();

// Check if user is not logged in, redirect to index.php
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

// Database configuration
$servername = "localhost";
$username = 'root'; 
$password = '';
$dbname = "final-project-db";

$link = mysqli_connect($servername, $username, $password, $dbname);    

if(mysqli_connect_error()){
    die("Database connection unsuccessful and exiting program");
}

// Fetch user's profile information from the database (you'll need to modify this query based on your database schema)
$query = "SELECT * FROM signin WHERE Email='{$_SESSION['Email']}'";
$result = mysqli_query($link, $query);
$userData = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="assets/style-fp.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BookBuddy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="main.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mt-5 mb-3">User Profile</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile Information</h5>
                        <p class="card-text"><strong>Email:</strong> <?php echo $userData['email']; ?></p>
                        <!-- Add more profile information as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/script-fp.js"></script>
</body>
</html>
