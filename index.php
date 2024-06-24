<?php
session_start();
include 'header.php';
include 'sql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Sales</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-auto">
            <?php if (isset($_SESSION["userid"])): ?>
                <form action="postcar.php" method="post">
                    <button type="submit" name="postcar-submit" class="btn btn-dark">Post car for sale</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container mt-5">
    <button type="button" class="btn btn-dark btn-oval" data-toggle="modal" data-target="#brandModal">Brand</button>
    <button type="button" class="btn btn-dark btn-oval">Model</button>
    <button type="button" class="btn btn-dark btn-oval">Year</button>
    <button type="button" class="btn btn-dark btn-oval">Vehicle type</button>
    <button type="button" class="btn btn-dark btn-oval">Fuel type</button>
</div>

<!-- Modal -->
<div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandModalLabel">Select a Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    $brands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'BMW']; // Example array
                    foreach ($brands as $brand): ?>
                        <div class="col-6 mb-2">
                            <button class="btn btn-primary btn-oval-modal" data-brand="<?php echo htmlspecialchars($brand); ?>"><?php echo htmlspecialchars($brand); ?></button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 h-100" id="car-container">
    <div id="postCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $chunked_posts = array_chunk($posts, 4); // Assuming $posts is an array of car data
            $active = true;
            foreach ($chunked_posts as $chunk): ?>
                <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                    <div class="row">
                        <?php foreach ($chunk as $post): ?>
                            <div class="col-md-3 rounded car-item" data-brand="<?php echo htmlspecialchars($post['brand']); ?>">
                                <div class="card mb-3">
                                    <div class="images">
                                        <img src="<?php echo htmlspecialchars($post['car_image_path'] . $post['car_image']); ?>" alt="Car Image" class="card-img">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($post['brand']); ?></h5>
                                        <p class="card-text">Model: <?php echo htmlspecialchars($post['model']); ?></p>
                                        <p class="card-text">Year: <?php echo htmlspecialchars($post['year']); ?></p>
                                        <p class="card-text">Type: <?php echo htmlspecialchars($post['vehicle_type']); ?></p>
                                        <p class="card-text">Price: $<?php echo htmlspecialchars($post['price']); ?></p>
                                        <p class="card-text">Fuel Type: <?php echo htmlspecialchars($post['fuel_type']); ?></p>
                                        <?php if (isset($_SESSION['userid'])): ?>
                                            <button class="btn btn-dark" data-car-id="<?php echo $post['id']; ?>">Add to Favorites</button>
                                        <?php endif; ?>
                                        <form action="buy-car.php" method="get">
                                            <input type="hidden" name="carId" value="<?php echo htmlspecialchars($post['id']); ?>">
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
<script src="script.js"></script>
</body>
</html>
