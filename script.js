$(document).ready(function() {
    var filters = {
        brand: [],         // Array to store selected brands
        model: [],         // Array to store selected models
        yearRange: [2000, 2024],  // Default year range
        vehicleType: [],   // Array to store selected vehicle types
        fuelType: []       // Array to store selected fuel types
    };
    

    // // Initialize the year range slider
    // $("#year-range-slider").slider({
    //     range: true,
    //     min: 1980,
    //     max: 2024,
    //     values: filters.yearRange,
    //     slide: function(event, ui) {
    //         $("#year-range").text(ui.values[0] + " - " + ui.values[1]);
    //     }
    // });

    // $("#year-range").text($("#year-range-slider").slider("values", 0) + " - " + $("#year-range-slider").slider("values", 1));

    function applyFilters() {
        $('.car-item').each(function() {
            var carBrand = $(this).data('brand');
            var carModel = $(this).data('model');
            var carYear = $(this).data('year');
            var carVehicleType = $(this).data('vehicle-type');
            var carFuelType = $(this).data('fuel-type');
    
            var show = true;
            if (filters.brand.length > 0 && !filters.brand.includes(carBrand)) show = false;
            if (filters.model.length > 0 && !filters.model.includes(carModel)) show = false;
            if (filters.yearRange && (carYear < filters.yearRange[0] || carYear > filters.yearRange[1])) show = false;
            if (filters.vehicleType.length > 0 && !filters.vehicleType.includes(carVehicleType)) show = false;
            if (filters.fuelType.length > 0 && !filters.fuelType.includes(carFuelType)) show = false;
    
            if (show) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    // Apply year range filter
    $("#apply-year-range").click(function() {
        filters.yearRange = $("#year-range-slider").slider("values");
        applyFilters();
        $('#yearModal').modal('hide');
    });

    // Other filter buttons (same as before)
    $('.btn-brand-modal').click(function() {
        filters.brand = $(this).data('brand');
        applyFilters();
        $('#brandModal').modal('hide');
    });

    $('.btn-model-modal').click(function() {
        filters.model = $(this).data('model');
        applyFilters();
        $('#modelModal').modal('hide');
    });
    

    $('.btn-vehicle-type-modal').click(function() {
        filters.vehicleType = $(this).data('vehicle_type');
        applyFilters();
        $('#vehicleModal').modal('hide');
    });

    $('.modal').on('hidden.bs.modal', function () {
        if ($('.modal.show').length) {
            $('body').addClass('modal-open');
        } else {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
    });


    $('.btn-fuel-modal').click(function() {
        filters.fuelType = $(this).data('fuel-type');
        applyFilters();
        $('#fuelModal').modal('hide');
    });

    $('.modal').on('hidden.bs.modal', function () {
        if ($('.modal.show').length) {
            $('body').addClass('modal-open');
        } else {
            $('body').removeClass('modal-open');
        }
        $('.modal-backdrop').remove();
    });

});
