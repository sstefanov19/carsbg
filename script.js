// document.writeln('<script src="/javascripts/jquery.js" type="text/javascript"></script>');
// document.writeln('<script type="text/javascript" src="/javascripts/jquery.tablesorter.js"></script>');
// document.addEventListener('DOMContentLoaded', function() {
//     const favoriteButtons = document.querySelectorAll('.favorite-btn');
//     favoriteButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const carId = this.getAttribute('data-car-id');
//             const formData = new FormData();
//             formData.append('carId', carId);

//             fetch('add_to_favorites.php', {
//                 method: 'POST',
//                 body: formData
//             })
//             .then(response => response.text())
//             .then(data => {
//                 alert(data); // Optional: Show success/failure message
//             })
//             .catch(error => {
//                 console.error('Error:', error);
//             });
//         });
//     });
// });


$(document).ready(function() {
    $('.btn-oval-modal').click(function() {
        var selectedBrand = $this.data('brand');
            $('.car-item').each(function() {
                var carBrand = $this.data('brand');
                if(carBrand=== selectedBrand) {
                    $this.show();

                }else {
                    $this.hide();

                }
        });
        $this('#brandModal').modal('hide');   
     });
});
