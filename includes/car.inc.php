<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $file = $_FILES['carImage'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

    if (in_array($fileExt, $allowedExtensions)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // Limit to 5MB
                $fileNameNew = uniqid('', true) . "." . $fileExt;
                $fileDestination = '../uploads/' . $fileNameNew; // Updated path

                // Ensure the uploads directory exists
                if (!is_dir('../uploads')) {
                    mkdir('../uploads', 0777, true);
                }

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $carImagePath = 'uploads/' . $fileNameNew; // Full path stored
                    $brand = $_POST['brand'];
                    $year = $_POST['year'];
                    $model = $_POST['model'];
                    $vehicleType = $_POST['vehicleType'];
                    $price = $_POST['price'];
                    $fuelType = $_POST['fuelType'];
                    $userId = $_SESSION['userid']; // Assuming user_id is stored in the session

                    $sql = "INSERT INTO cars (car_image_path, brand, year, model, vehicle_type, price, fuel_type, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL error. Please try again later.";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssisssss", $carImagePath, $brand, $year, $model, $vehicleType, $price, $fuelType, $userId);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../index.php?upload=success");
                        exit();
                    }
                } else {
                    echo "Failed to move uploaded file.";
                    exit();
                }
            } else {
                echo "File is too large.";
                exit();
            }
        } else {
            echo "There was an error uploading your file.";
            exit();
        }
    } else {
        echo "Invalid file type.";
        exit();
    }
}
?>
