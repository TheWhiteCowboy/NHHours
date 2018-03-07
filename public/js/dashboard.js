$(document).ready(function() {
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    $(document).on('click', '.pagination a',function(event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });

    function getData(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html"
            })
            .done(function(data)
            {
                $("#working-hours").empty().html(data);
                location.hash = page;
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('Er ging iets niet goed');
            });
    }

    $(document).on('change', '#select-user, #select-month, #select-year', function() {
        $.ajax(
            {
                url: '/',
                type: "post",
                datatype: "html",
                data: $('#working-hours-filters').serialize()
            })
            .done(function(data)
            {
                $("#working-hours").empty().html(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('Er ging iets niet goed');
            });
    });
});