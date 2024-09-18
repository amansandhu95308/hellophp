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
</body>
</html>
