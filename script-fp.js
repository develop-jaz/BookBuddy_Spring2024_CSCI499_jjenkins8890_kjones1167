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
function deleteBook() {
    var title = prompt('Enter the title of the book to delete:');

    // Construct SQL DELETE statement
    var sql = "DELETE FROM books WHERE title='" + title + "'";

    // Send SQL statement to server for execution
    executeSqlStatement(sql);
}

// Function to change the rating of a book in the library
function changeRating() {
    var title = prompt('Enter the title of the book to change rating:');
    var newRating = prompt('Enter the new rating for the book:');

    // Construct SQL UPDATE statement
    var sql = "UPDATE books SET rating='" + newRating + "' WHERE title='" + title + "'";

    // Send SQL statement to server for execution
    executeSqlStatement(sql);
}

// Function to execute SQL statement
function executeSqlStatement(sql) {
    // Send SQL statement to server for execution
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'execute_sql.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
                // Handle success message or update UI accordingly
            } else {
                console.error('Error executing SQL statement:', xhr.status);
                // Handle error or display error message to user
            }
        }
    };
    xhr.send('sql=' + encodeURIComponent(sql));
}