$(document).ready(function () {
    $("#user-profile").submit(function (e) {
        var id = $(this).attr('data-identity');
        e.preventDefault();
        $.ajax(
            {
                url: '/profile/' + id,
                type: "post",
                datatype: "html",
                data: $('#user-profile').serialize()
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
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                $.each(jqXHR.responseJSON, function (index, value) {
                    $('input[name=' + index + ']').closest(".form-group").addClass('has-error');
                    $('#' + index + '-error').html(' - ' + value);
                });
            });
    });
});