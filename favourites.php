<?php 


include 'header.php'; 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title >My Favorite Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">My Favorite Cars</h1>
        <div class="row">
            <?php include 'display_favorites.php'; ?>
        </div>
    </div>
</body>
</html>
