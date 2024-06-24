<?php
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Add a New Car</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add a New Car</h1>
        <form action="includes/car.inc.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="carImage">Car Image:</label>
                <input type="file" class="form-control-file" id="carImage" name="carImage" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" min="1886" max="2024" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>
            <div class="form-group">
                <label for="vehicleType">Vehicle Type:</label>
                <input type="text" class="form-control" id="vehicleType" name="vehicleType" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="fuelType">Fuel Type:</label>
                <input type="text" class="form-control" id="fuelType" name="fuelType" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Car</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
