<div class="modal fade" id="vehicleModal" tabindex="-1" role="dialog" aria-labelledby="vehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehicleModalLabel">Select vehicle type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    $vehicles = ['Sedan', 'Kombi', 'Coupe', 'Hatchback'];
                    foreach ($vehicles as $vehicle): ?>
                        <div class="col-6 mb-2">
                            <button class="btn btn-primary btn-vehicle-type-modal" data-vehicle_type="<?php echo htmlspecialchars($vehicle); ?>"><?php echo htmlspecialchars($vehicle); ?></button>
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
