<?php

include_once 'includes/dbh.inc.php'; // Adjust path as per your setup

if (isset($_SESSION['userid'])) {
    $userId = intval($_SESSION['userid']);

    // SQL query to fetch favorite cars for the logged-in user
    $sql = "SELECT c.* FROM cars c
            INNER JOIN favorites f ON c.id = f.car_id
            WHERE f.user_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if there are favorite cars
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display each favorite car
                ?>
                <div class='col-md-6 rounded car-item' data-brand='<?php echo htmlspecialchars($row["brand"]); ?>'>
                    <div class='card mb-3'>
                        <div class='images w-150'>
                            <img src='<?php echo htmlspecialchars($row['car_image_path']); ?>' alt='Car Image' class='card-img'>
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo htmlspecialchars($row['brand']); ?></h5>
                            <p class='card-text'>Model: <?php echo htmlspecialchars($row['model']); ?></p>
                            <p class='card-text'>Year: <?php echo htmlspecialchars($row['year']); ?></p>
                            <p class='card-text'>Type: <?php echo htmlspecialchars($row['vehicle_type']); ?></p>
                            <p class='card-text'>Price: $<?php echo htmlspecialchars($row['price']); ?></p>
                            <p class='card-text'>Fuel Type: <?php echo htmlspecialchars($row['fuel_type']); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "You have no favorite cars.";
        }
    } else {
        echo "SQL error: " . mysqli_error($conn);
    }
} else {
    echo "User not logged in.";
}
?>
