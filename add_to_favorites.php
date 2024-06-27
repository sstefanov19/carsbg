<?php
session_start();
include_once 'includes/dbh.inc.php';

if (isset($_POST['carId']) && isset($_SESSION['userid'])) {
    $carId = intval($_POST['carId']);
    $userId = intval($_SESSION['userid']);

    // Perform further validation if needed (e.g., check if carId exists in the database)

    // Example SQL to insert into favorites table
    $sql = "INSERT INTO favorites (user_id, car_id) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ii", $userId, $carId);
        if (mysqli_stmt_execute($stmt)) {
            echo "Car added to favorites successfully.";
            header("Location: index.php");
        } else {
            echo "Error: Could not add car to favorites.";
        }
    } else {
        echo "SQL error. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
