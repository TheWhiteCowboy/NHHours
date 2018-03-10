$(document).ready(function () {
    $("#add-department").on('submit', function (e) {
        var id = e.target.getAttribute("data-identity");
        e.preventDefault();

        $.ajax(
            {
                url: '/departments/save/' + id,
                type: "post",
                datatype: "html",
                data: $("#add-department form").serialize()
            })
            .done(function (data) {
                $.toast({
                    heading: 'Gelukt',
                    text: 'Gegevens opgeslagen',
                    position: 'top-right',
                    loaderBg: '#9EC600',
                    icon: 'success',
                    hideAfter: 3500,
                    stack: 6
                });
                $("#add-department").modal('hide');

            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                $.each(jqXHR.responseJSON, function (index, value) {
                    $('input[name=' + index + ']').closest(".form-group").addClass('has-error');
                    $('#' + index + '-error').html(' - ' + value);
                });
            });
    });
});