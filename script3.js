$(document).ready(function () {

    $('#deco').click(function () {
        $.post(
                "SessionDestroy.php",
                {

                },
                function (data) {
                   window.location.replace("index.php");
                }
        );
    });

});
