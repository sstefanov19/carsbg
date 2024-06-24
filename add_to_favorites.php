<?php
session_start();
include_once 'includes/dbh.inc.php';

if (isset($_POST['carId'])) {
    $carId = intval($_POST['carId']); // Ensure carId is an integer
    $userId = intval($_SESSION['userid']); // Ensure userId is an integer

    // Debugging: Print values to check
    echo "Car ID: " . $carId . "<br>";
    echo "User ID: " . $userId . "<br>";

    // Check if carId exists in cars table
    $sqlCheckCar = "SELECT id FROM cars WHERE id = ?";
    $stmtCheckCar = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmtCheckCar, $sqlCheckCar)) {
        mysqli_stmt_bind_param($stmtCheckCar, "i", $carId);
        mysqli_stmt_execute($stmtCheckCar);
        mysqli_stmt_store_result($stmtCheckCar);

        if (mysqli_stmt_num_rows($stmtCheckCar) > 0) {
            // Insert into favorites table
            $sql = "INSERT INTO favorites (user_id, car_id) VALUES (?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ii", $userId, $carId);
                if (mysqli_stmt_execute($stmt)) {
                    echo "Car added to favorites successfully.";
                } else {
                    echo "Error: Could not add car to favorites.";
                }
            } else {
                echo "SQL error. Please try again later.";
            }
        } else {
            echo "Error: Car ID does not exist.";
        }
    } else {
        echo "SQL error. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
