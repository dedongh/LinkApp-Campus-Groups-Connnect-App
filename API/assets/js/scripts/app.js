$(document).ready(function () {

    var loading = document.getElementById('loading');
    //show notifications
    function showNotif(messageText, elementNotif){
        $.notify({
            // options
            message: messageText
        },{
            // settings
            type: elementNotif,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'right'
            }
        });
    }

    $("#sign_in").on("submit", function () {
        var email = $("#username").val();
        var pwd = $("#password").val();
        $.ajax({
            url: "process.php",
            method: "POST",
            data: {username:email, password:pwd},
            success: function (data) {
                if (data == "success") {
                    alert(email)
                } else {

                }

            }
        })
    })
});