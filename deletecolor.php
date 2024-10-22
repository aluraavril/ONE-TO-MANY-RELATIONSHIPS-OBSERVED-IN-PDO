<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Color</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php $getColorByID = getColorByID($pdo, $_GET['color_id']); ?>
        <h1>Delete Color Confirmation</h1>
        <div class="confirmation-box">
            <h2>Color Name: <?php echo $getColorByID['color_name']; ?></h2>
            <h2>Dealer Name: <?php echo $getColorByID['dealer_name']; ?></h2>
        </div>
        <form action="core/handleForms.php?color_id=<?php echo $_GET['color_id']; ?>" method="POST">
            <input type="submit" name="deleteColorBtn" value="Delete Color" class="btn btn-danger">
        </form>
        <a href="index.php" class="btn btn-cancel">Cancel</a>
    </div>
</body>
</html>
