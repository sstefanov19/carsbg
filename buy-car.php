<?php
include 'includes/dbh.inc.php';
include 'header.php';

if (!isset($_GET['carId'])) {
    echo 'Car ID not specified.';
    exit();
}

$carId = $_GET['carId'];

$sql = "SELECT car_image_path, car_image, brand, year, model, vehicle_type, price, fuel_type FROM cars WHERE id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo 'Error preparing statement.';
    exit();
}
mysqli_stmt_bind_param($stmt, "i", $carId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $imagePath = htmlspecialchars($row['car_image_path'] . $row['car_image']);
    $brand = htmlspecialchars($row['brand']);
    $year = htmlspecialchars($row['year']);
    $model = htmlspecialchars($row['model']);
    $vehicleType = htmlspecialchars($row['vehicle_type']);
    $price = htmlspecialchars($row['price']);
    $fuelType = htmlspecialchars($row['fuel_type']);
} else {
    echo 'Car not found.';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Car Details</title>
</head>

<body>
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="<?php echo $imagePath; ?>" alt="Car Image" class="car-image img-fluid">
            </div>
            <div class="col-lg-12 mx-auto">
                <div class="details">
                    <h2><?php echo $brand . ' ' . $model; ?></h2>
                    <p><strong>Year:</strong> <?php echo $year; ?></p>
                    <p><strong>Vehicle Type:</strong> <?php echo $vehicleType; ?></p>
                    <p><strong>Price:</strong> $<?php echo number_format($price, 2); ?></p>
                    <p><strong>Fuel Type:</strong> <?php echo $fuelType; ?></p>
                    <form action="buy-car.php" method="get">
                                                <input type="hidden" name="carId"
                                                    value="<?php echo htmlspecialchars($post['id']); ?>">
                                                <button type="submit" class="btn btn-primary">Buy now</button>
                                            </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
