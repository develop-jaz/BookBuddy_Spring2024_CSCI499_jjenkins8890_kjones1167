// Function to add a book to the library
function addBook() {
    var title = prompt('Enter the title of the book:');
    var author = prompt('Enter the author of the book:');
    var genre = prompt('Enter the genre of the book:');
    var rating = prompt('Enter your rating for the book:');
    var length = prompt('Enter the length of the book (short, medium, or long):');

    // Send SQL INSERT statement to add book
    var sql = "INSERT INTO books (Title, Author, Genre, Your Rating, Length) VALUES ('" + title + "', '" + author + "', '" + genre + "', '" + rating + "', '" + length + "')";
    executeSqlStatement(sql);
}

// Function to delete a book from the library
function deleteBook(id) {
    //var id = prompt('Enter the id of the book to delete:');

    // Construct SQL DELETE statement
    var sql = "DELETE FROM books WHERE id='" + id + "'";

    // Send SQL statement to server for execution
    executeSqlStatement(sql);
}
// Function to delete a book
function deleteBook(id) {
    if (confirm("Are you sure you want to delete this book?")) {
        // Send AJAX request to delete the book
        $.ajax({
            type: "POST",
            url: "main.php",
            data: {
                delete_book: true,
                id: id
            },
            success: function(response) {
                alert(response);
                // Reload the page after deletion
                location.reload();
            }
        });
    }
}

// Function to change the rating of a book
function changeRating(id) {
    var newRating = prompt("Enter the new rating:");
    if (newRating !== null && newRating !== "") {
        // Send AJAX request to change the rating of the book
        $.ajax({
            type: "POST",
            url: "main.php",
            data: {
                change_rating: true,
                id: id,
                new_rating: newRating
            },
            success: function(response) {
                alert(response);
                // Reload the page after rating change
                location.reload();
            }
        });
    }
}



