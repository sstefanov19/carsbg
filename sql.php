<?php

include_once 'includes/dbh.inc.php';

$sql = "SELECT   id, car_image_path ,  car_image, brand, model, year, vehicle_type, price, fuel_type FROM cars ";
$result = $conn->query($sql);
    
$posts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}
