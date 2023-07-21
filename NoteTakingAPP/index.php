<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Online Note-Taking App</title>
    <script src="particles.js"></script>
    <style>
        /* ... existing styles ... */

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form {
            max-width: 500px;
            margin: 0 auto;
        }

        .form input[type="text"],
        .form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }

        .form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .notes {
            list-style-type: none;
            padding: 0;
        }

        .notes li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <!-- Particle animation container -->
    <div id="particles-js"></div>

    <!-- Particle animation configuration -->
    <script>
        particlesJS("particles-js", {
            particles: {
                // ... particle configuration ...
            },
            interactivity: {
                // ... interactivity configuration ...
            },
            retina_detect: true
        });
    </script>

    <!-- Content section -->
    <div class="container">
        <div class="header">
            <h1>Online Note-Taking App</h1>
        </div>
        <div class="form">
            <form action="add_note.php" method="post">
                <input type="text" name="title" placeholder="Note Title" required>
                <textarea name="content" placeholder="Note Content" rows="6" required></textarea>
                <input type="submit" value="Save Note">
            </form>
        </div>
        <div class="notes">
            <h2>My Notes</h2>
            <ul>
                <?php
                // Connect to the database
                $connection = new mysqli("localhost", "root", "", "note_taking_db");

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Fetch notes from the database
                $query = "SELECT id, title FROM notes ORDER BY created_at DESC";
                $result = $connection->query($query);

                // Display notes
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li><a href="view_note.php?id=' . $row["id"] . '">' . $row["title"] . '</a></li>';
                    }
                } else {
                    echo "<li>No notes found.</li>";
                }

                // Close the database connection
                $connection->close();
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
