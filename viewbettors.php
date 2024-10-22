<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bettors</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn">Return to Main Page</a>
        <h1>Bettors for Color ID: <?php echo htmlspecialchars($_GET['color_id']); ?></h1>

        <div class="input-container">
            <form action="core/handleForms.php" method="POST" class="input-form">
                <input type="hidden" name="color_id" value="<?php echo htmlspecialchars($_GET['color_id']); ?>">
                <input type="text" name="bettor_firstname" placeholder="Bettor First Name" required>
                <input type="number" name="betting_price" placeholder="Betting Price" required>
                <input type="submit" name="insertBettorBtn" value="Add Bettor" class="btn">
            </form>
        </div>

        <div class="bettors-container">
            <h2>Registered Bettors:</h2>
            <?php $getAllBetters = getAllBettersByColor($pdo, $_GET['color_id']); ?>
            <?php if (empty($getAllBetters)) { ?>
                <p>No bettors registered yet.</p>
            <?php } else { ?>
                <?php foreach ($getAllBetters as $row) { ?>
                    <div class="container" style="border-style: solid; width: 50%; height: auto; margin-top: 20px; padding: 15px;">
                        <h3>Bettor ID: <?php echo $row['bettor_id']; ?></h3>
                        <h3>First Name: <?php echo $row['bettor_firstname']; ?></h3>
                        <h3>Betting Price: <?php echo $row['betting_price']; ?></h3>
                        <h3>Date Added: <?php echo $row['date_added']; ?></h3>
                        <div class="button-group" style="float: right; margin-right: 20px;">
                            <a href="editbettor.php?bettor_id=<?php echo $row['bettor_id']; ?>&color_id=<?php echo $_GET['color_id']; ?>" class="btn">Edit</a>
                            
                            <form action="core/handleForms.php?bettor_id=<?php echo $row['bettor_id']; ?>" method="POST" style="display:inline;">
                                <input type="hidden" name="color_id" value="<?php echo $_GET['color_id']; ?>">
                                <button type="submit" name="deleteBettorBtn" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this bettor?');">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</body>
</html>
