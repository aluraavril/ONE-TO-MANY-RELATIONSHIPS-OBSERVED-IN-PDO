<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Bettor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php $getBettorByID = getBettorByID($pdo, $_GET['bettor_id']); ?>
        <h1>Delete Bettor Confirmation</h1>
        <div class="confirmation-box">
            <h2>Bettor Name: <?php echo $getBettorByID['bettor_firstname']; ?></h2>
            <h2>Betting Price: <?php echo $getBettorByID['betting_price']; ?></h2>
        </div>
        <form action="core/handleForms.php?bettor_id=<?php echo $_GET['bettor_id']; ?>" method="POST">
            <input type="hidden" name="color_id" value="<?php echo $_GET['color_id']; ?>">
            <input type="submit" name="deleteBettorBtn" value="Delete Bettor" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this bettor?');">
        </form>
        <a href="viewbettors.php?color_id=<?php echo $_GET['color_id']; ?>" class="btn btn-cancel">Cancel</a>
    </div>
</body>
</html>
