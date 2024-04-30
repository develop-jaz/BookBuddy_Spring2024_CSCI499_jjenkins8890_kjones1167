<?php

session_start();

// Check if user is not logged in, redirect to index.php
if (!isset($_SESSION['email'])) {
    header('Location: index-fp.php');
    exit();
}

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: logout.php');
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

// Handle add book
if (isset($_POST['add_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $length = $_POST['length'];

    // Insert data into books table
    $sql = "INSERT INTO books (`title`, `author`, `genre`, `rating`, `length`) VALUES ('$title', '$author', '$genre', '$rating', '$length')";
    if ($link->query($sql) === TRUE) {
        echo "Book added successfully";
    } else {
        echo "Error adding book: " . $link->error;
    }
}

// Handle delete book
if (isset($_POST['delete_book'])) {
    $id = $_POST['id'];

    // Delete book from books table using ID
    $sql = "DELETE FROM books WHERE id='$id'";

    if ($link->query($sql) === TRUE) {
        echo "Book deleted successfully";
    } else {
        echo "Error deleting book: " . $link->error;
    }
}

// Handle change rating
if (isset($_POST['change_rating'])) {
    $id = $_POST['id'];
    $new_rating = $_POST['new_rating'];

    // Update book rating in books table using ID
    $sql = "UPDATE books SET `rating`='$new_rating' WHERE id='$id'";

    if ($link->query($sql) === TRUE) {
        echo "Rating changed successfully";
    } else {
        echo "Error changing rating: " . $link->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
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
                    <a class="nav-link" href="dashboard.php">My Library</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post">
            <!-- Logout image button -->
            <button type="submit" name="logout"><img src="logout.png" alt="Logout"></button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Welcome to BookBuddy!</h1>
        <p>Track your reading progress and discover new books.</p>
        
        <!-- Benefits of Tracking Your Reading -->
        <h2>Benefits of Tracking Your Reading</h2>
        <ul>
            <li>Helps to diversify your reading habits</li>
            <li>Helps to improve retention</li>
            <li>Helps to gain valuable insights about yourself as a reader</li>
        </ul>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Main Content</h5>
                        <p class="card-text">Add or Delete a Book, or change your book rating!</p>
                        <!-- Updated form for adding a book -->
                        <form method="post">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author" required>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre:</label>
                                <input type="text" class="form-control" id="genre" name="genre" placeholder="Enter Genre" required>
                            </div>
                            <div class="form-group">
                                <label for="rating">Your Rating:</label>
                                <input type="text" class="form-control" id="rating" name="rating" placeholder="Enter Rating" required>
                            </div>
                            <div class="form-group">
                                <label for="length">Length:</label>
                                <select class="form-control" id="length" name="length" required>
                                    <option value="short">Short</option>
                                    <option value="medium">Medium</option>
                                    <option value="long">Long</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_book">Add Book to Library</button>
                        </form>
                        <br>
                        <!-- Button to delete a book -->
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" placeholder="Enter Book ID to Delete">
                            </div>
                            <button type="submit" class="btn btn-danger" name="delete_book">Delete Book from Library</button>
                        </form>
                        <br>
                        <!-- Button to change book rating -->
                        <form method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" placeholder="Enter Book ID to Change Rating">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="new_rating" placeholder="Enter New Rating">
                            </div>
                            <button type="submit" class="btn btn-secondary" name="change_rating">Change Book Rating</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/script-fp.js"></script>
</body>
</html>
