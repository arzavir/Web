<?php
include 'db.php';
include 'auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM articles ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Articles</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage.php">Manage Articles</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Manage Articles</h1>
        <a href="add_article.php">Add New Article</a>
        <hr>
        <?php while($row = $result->fetch_assoc()): ?>
            <h2><?php echo $row['title']; ?></h2>
            <?php if (!empty($row['image'])): ?>
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" style="max-width: 100%;">
            <?php endif; ?>
            <p><?php echo $row['content']; ?></p>
            <a href="edit_article.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete_article.php?id=<?php echo $row['id']; ?>">Delete</a>
            <hr>
        <?php endwhile; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
