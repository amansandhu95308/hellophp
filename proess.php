<?php
session_start();
require_once 'Book.php';

$books = isset($_SESSION['books']) ? $_SESSION['books'] : [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $year = intval($_POST['year']);
    
    try {
        if (empty($title) || empty($author) || $year < 1900 || $year > date('Y')) {
            throw new Exception("Invalid input. Please fill all fields correctly.");
        }
        
        $book = new Book($title, $author, $year);
        $books[] = $book;
        $_SESSION['books'] = $books;
        
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>
</head>
<body>
    <h1>Book Management System</h1>
    <form action="index.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required><br>
        <label for="year">Publication Year:</label>
        <input type="number" id="year" name="year" min="1900" max="<?php echo date('Y'); ?>" required><br>
        <input type="submit" name="submit" value="Add Book">
    </form>

    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>

    <?php
    if (!empty($books)) {
        echo '<h2>Book List</h2>';
        echo '<table border="1"><tr><th>Title</th><th>Author</th><th>Year</th></tr>';
        foreach ($books as $book) {
            echo '<tr><td>' . htmlspecialchars($book->getTitle()) . '</td><td>' . htmlspecialchars($book->getAuthor()) . '</td><td>' . htmlspecialchars($book->getYear()) . '</td></tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No books have been added yet.</p>';
    }
    ?>
</body>
</html>
