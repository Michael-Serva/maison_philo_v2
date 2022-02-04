/* Preview de l'image upload CRUD PRODUIT */
if (document.getElementById('product_image')) {
    document.getElementById('product_image').onchange = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    }
}
if (document.getElementById('account_picture')) {
    document.getElementById('account_picture').onchange = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    }
}