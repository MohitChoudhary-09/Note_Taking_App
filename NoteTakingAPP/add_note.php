<!-- add_note.php -->
<?php
// Ensure this file handles only POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate the input and sanitize data
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars($_POST["content"]);

    // Save the note in the database
    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "note_taking_db");

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare the SQL statement using a parameterized query
    $query = "INSERT INTO notes (title, content) VALUES (?, ?)";
    $stmt = $connection->prepare($query);

    // Bind the parameters to the statement
    $stmt->bind_param("ss", $title, $content);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the index.php after successful insertion
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $connection->close();
}
?>
