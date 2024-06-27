<?php
session_start();
include_once 'header.php';
include 'sql.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Sales</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=1.3">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-auto">
                <?php if (isset($_SESSION["userid"])): ?>
                    <form action="postcar.php" method="post">
                        <button type="submit" name="postcar-submit" class="btn btn-dark btn-oval">Post car for sale</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container mt-5 p-4">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-4 col-md-3 mb-3">
                <button type="button" class="btn btn-dark btn-oval w-100" data-toggle="modal"
                    data-target="#brandModal">Brand</button>
            </div>
            <div class="col-6 col-sm-4 col-md-3 mb-3">
                <button type="button" class="btn btn-dark btn-oval w-100" data-toggle="modal"
                    data-target="#modelModal">Model</button>
            </div>
            <div class="col-6 col-sm-4 col-md-3 mb-3">
                <button type="button" class="btn btn-dark btn-oval w-100" data-toggle="modal"
                    data-target="#yearModal">Year</button>
            </div>
            <div class="col-6 col-sm-4 col-md-3 mb-3">
                <button type="button" class="btn btn-dark btn-oval w-100" data-toggle="modal"
                    data-target="#vehicleModal">Vehicle type</button>
            </div>
            <div class="col-6 col-sm-4 col-md-3 mb-3">
                <button type="button" class="btn btn-dark btn-oval w-100" data-toggle="modal"
                    data-target="#fuelModal">Fuel type</button>
            </div>
        </div>
    </div>

    <?php include 'modal.php' ?>

    <div class="container mt-5 h-100" id="car-container">
        <div id="postCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $chunked_posts = array_chunk($posts, 4);
                $active = true;
                foreach ($chunked_posts as $chunk): ?>
                    <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                        <div class="row">
                            <?php foreach ($chunk as $post): ?>
                                <div class="col-md-3 rounded car-item"
                                    data-brand="<?php echo htmlspecialchars($post['brand']); ?>"
                                    data-model="<?php echo htmlspecialchars($post['model']); ?>"
                                    data-year="<?php echo htmlspecialchars($post['year']); ?>"
                                    data-vehicle-type="<?php echo htmlspecialchars($post['vehicle_type']); ?>"
                                    data-fuel-type="<?php echo htmlspecialchars($post['fuel_type']); ?>">

                                    <div class="card mb-3">
                                        <div class="images">
                                            <img src="<?php echo htmlspecialchars($post['car_image_path'] . $post['car_image']); ?>"
                                                alt="Car Image" class="card-img">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($post['brand']); ?></h5>
                                            <p class="card-text">Model: <?php echo htmlspecialchars($post['model']); ?></p>
                                            <p class="card-text">Year: <?php echo htmlspecialchars($post['year']); ?></p>
                                            <p class="card-text">Type: <?php echo htmlspecialchars($post['vehicle_type']); ?>
                                            </p>
                                            <p class="card-text">Price: $<?php echo htmlspecialchars($post['price']); ?></p>
                                            <p class="card-text">Fuel Type: <?php echo htmlspecialchars($post['fuel_type']); ?>
                                            </p>

                                            <form action="add_to_favorites.php" method="post">
                                                <input type="hidden" name="carId"
                                                    value="<?php echo htmlspecialchars($post['id']); ?>">
                                                <?php if (isset($_SESSION['userid'])): ?>
                                                    <?php
                                                    $carId = $post['id'];
                                                    $alreadyAdded = false; // Assume car is not already added
                                                    if (isset($_SESSION['favorites']) && in_array($carId, $_SESSION['favorites'])) {
                                                        $alreadyAdded = true;
                                                    }
                                                    ?>

                                                    <?php if ($alreadyAdded): ?>
                                                        <button type="button" class="btn btn-success" disabled>Already Added</button>
                                                    <?php else: ?>
                                                        <button type="submit" class="btn btn-dark">Add to Favorites</button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </form>
                                            <form action="buy-car.php" method="get">
                                                <input type="hidden" name="carId"
                                                    value="<?php echo htmlspecialchars($post['id']); ?>">
                                                <button type="submit" class="btn btn-primary">Buy now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php
                    $active = false; // Only first chunk should have 'active' class
                endforeach; ?>
            </div>

            <a class="carousel-control-prev" href="#postCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#postCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>