<div class="modal fade" id="modelModal" tabindex="-1" role="dialog" aria-labelledby="modelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelModalLabel">Select a Model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php
                    $carModels = [
                        'Toyota' => ['Corolla', 'Camry', 'Rav4'],
                        'Honda' => ['Accord', 'Civic', 'CR-V'],
                        'Ford' => ['F-150', 'Escape', 'Mustang'],
                        'Chevrolet' => ['Silverado', 'Camaro', 'Equinox'],
                        'BMW' => ['3 Series', '320' ,  '5 Series', 'X3'],
                        'Audi' => ['A4', 'Q5', 'R8'],
                        'VW' => ['Golf', 'Passat', 'Tiguan']
                    ];

                    foreach ($carModels as $brand => $models): ?>
                    <div class="col-6 mb-2 models-container" data-brand="<?php echo htmlspecialchars($brand); ?>">
                        <?php foreach ($models as $model): ?>
                        <button class="btn btn-primary btn-model-modal"
                            data-brand="<?php echo htmlspecialchars($brand); ?>"
                            data-model="<?php echo htmlspecialchars($model); ?>"><?php echo htmlspecialchars($model); ?></button>
                        <?php endforeach; ?>
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