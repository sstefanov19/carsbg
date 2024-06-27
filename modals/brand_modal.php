<div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandModalLabel">Select Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    $brands = ['BMW', 'Audi', 'Mercedes' , 'VW'];
                    foreach ($brands as $brand): ?>
                        <div class="col-6 mb-2">
                            <button class="btn btn-primary btn-brand-modal" data-brand="<?php echo htmlspecialchars($brand); ?>"><?php echo htmlspecialchars($brand); ?></button>
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
