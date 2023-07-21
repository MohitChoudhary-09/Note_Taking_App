<!-- delete_note.php -->
<?php
// Ensure this file handles only POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // TODO: Validate the input and sanitize data

    // TODO: Delete the note from the database

    // Redirect back to the index.php after deletion
    header("Location: index.php");
    exit;
}
?>
