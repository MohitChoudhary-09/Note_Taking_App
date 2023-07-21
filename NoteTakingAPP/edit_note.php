<!-- edit_note.php -->
<?php
// Ensure this file handles only POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // TODO: Validate the input and sanitize data

    // TODO: Update the note in the database

    // Redirect back to the view_note.php page with the updated note
    if (isset($_POST["note_id"])) {
        header("Location: view_note.php?id=" . $_POST["note_id"]);
        exit;
    }
}
?>
