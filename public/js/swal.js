const { format } = require("core-js/core/date");

/* $(function () {
    $('form.confirm').click(function (e) {
        e.preventDefault();
        var tthis = $(this);
        swal({
            title: "Are you sure?",
            buttons: [true,$(this).data('title')],
            icon: $(this).data('type'),
        } , function (isConfirm) {
            if (isConfirm) {
                document.location.href = this.attr('href');
            }
        } );
    });
}); */
function swalConfirm() {
    swal({
        text: "Are you sure you want to delete this item?",
        icon: "warning",
        buttons: [
            {
                text: "OK",
                value: true,
                visible: true,
                className: "",
                closeModal: true,
            },
            {
                text: "Cancel",
                value: false,
                visible: true,
                className: "",
                closeModal: true,
            }
        ]
    }).then((isOkey) => {
        if (isOkey) {
            document.getElementById("#confirm").submit();
        }
    });
    return false;
}




