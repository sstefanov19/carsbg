<?php
include_once 'includes/dbh.inc.php';

if (!isset($_GET['carId'])) {
    echo 'https://via.placeholder.com/150';
    exit();
}

$carId = intval($_GET['carId']);

$sql = "SELECT cars.car_image_path, users.username FROM cars JOIN users ON cars.user_id = users.id WHERE cars.id = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo 'https://via.placeholder.com/150';
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $carId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$imageSrc = 'https://via.placeholder.com/150';
$username = '';

if ($row = mysqli_fetch_assoc($result)) {
    $imagePath = '../' . $row['car_image_path']; // Updated path
    $username = $row['username'];

    if (!empty($imagePath)) {
        $absolutePath = __DIR__ . '/../' . $row['car_image_path']; // Updated path

        if (file_exists($absolutePath)) {
            $imageSrc = $imagePath;
        } else {
            echo "File does not exist: $absolutePath<br>"; // Debugging output
        }
    } else {
        echo "Image path is empty.<br>"; // Debugging output
    }
} else {
    echo "Car not found.<br>"; // Debugging output
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Image</title>
</head>
<body>
    <div class="center">
        <img src="<?php echo htmlspecialchars($imageSrc); ?>" height="150px" width="200px" alt="Car Picture">
        <p>Posted by: <?php echo htmlspecialchars($username); ?></p>
    </div>
</body>
</html>
