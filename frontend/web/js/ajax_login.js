$(document).ready(function(){
    jQuery(".navbar-right").on("click", "#login_ajax_sbmt", function(event){
        event.preventDefault();
        var form = $("#login-form");
        console.log( $('#login-form'));
        //console.log(event);

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(data) {
                console.log(data);
                if(data != 0){
                    $("ul.navbar-right>li.dropdown").removeClass("open");
                    $("ul.navbar-right").html(data);
                }


            }
        });

    });


});