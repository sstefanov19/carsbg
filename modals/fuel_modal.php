<div class="modal fade" id="fuelModal" tabindex="-1" role="dialog" aria-labelledby="fuelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fuelModalLabel">Select Fuel Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    $fuels = ['Petrol', 'Diesel'];
                    foreach ($fuels as $fuel): ?>
                        <div class="col-6 mb-2">
                            <button class="btn btn-primary btn-fuel-modal" data-fuel-type="<?php echo htmlspecialchars($fuel); ?>"><?php echo htmlspecialchars($fuel); ?></button>
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
