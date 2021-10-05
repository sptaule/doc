$(function () {
    function checkDatabaseCredentials() {
        let db_host, db_name, db_username, db_password;
        db_host = $('#db_host').val();
        db_name = $('#db_name').val();
        db_username = $('#db_username').val();
        db_password = $('#db_password').val();
        $.ajax({
            url: "/setup/checkDatabaseCredentials.php",
            type: "POST",
            cache: false,
            data: {db_host:db_host, db_name:db_name, db_username:db_username, db_password:db_password},
            success: function(response) {
                if (response == 1) {
                    Notiflix.Notify.success("Tout semble correct !");
                    $('#submitSetup').removeAttr('disabled');
                } else if (response == 0) {
                    Notiflix.Notify.failure("Vérifiez les informations de connexion à la base de données");
                }
            }
        });
    }
    $("button#checkDatabaseCredentials").on('click', function() {
        checkDatabaseCredentials();
    });
});