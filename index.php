<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Betting Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Color Betting Game! Add New Colors!</h1>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="colorName">Color Name</label>
            <input type="text" name="colorName" required>
        </p>
        <p>
            <label for="dealerName">Dealer Name</label>
            <input type="text" name="dealerName" required>
            <input type="submit" name="insertColorBtn" value="Add Color">
        </p>
    </form>

    <?php $getAllColors = getAllColors($pdo); ?>
    <?php foreach ($getAllColors as $row) { ?>
        <div class="container" style="border-style: solid; width: 50%; height: auto; margin-top: 20px; padding: 15px;">
            <h3>Color ID: <?php echo $row['color_id']; ?></h3>
            <h3>Color Name: <?php echo $row['color_name']; ?></h3>
            <h3>Dealer Name: <?php echo $row['dealer_name']; ?></h3>
            <h3>Date Added: <?php echo $row['date_added']; ?></h3>

            <div class="editAndDelete" style="float: right; margin-right: 20px;">
                <a href="viewbettors.php?color_id=<?php echo $row['color_id']; ?>">View Bettors</a>
                <a href="editcolor.php?color_id=<?php echo $row['color_id']; ?>">Edit</a>
                <a href="deletecolor.php?color_id=<?php echo $row['color_id']; ?>">Delete</a>
            </div>
        </div>
    <?php } ?>
</body>
</html>
