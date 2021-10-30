$(function () {
    function checkPassword(aValue, bValue) {
        let fields = $('#password, #password_conf');
        if (aValue.length >= 8 || bValue.length >= 8) {
            $(fields).removeClass('border-green-500 border-red-500');
            if (aValue != bValue) {
                $(fields).removeClass('border-gray-300 focus:border-gray-500');
                $(fields).toggleClass('border-red-500');
            } else {
                $(fields).toggleClass('border-green-500');
            }
        } else {
            $(fields).removeClass('border-green-500 border-red-500');
        }
    }
    $('#password, #password_conf').on('input', function () {
        let password = $("#password").val();
        let passwordConf = $("#password_conf").val();
        checkPassword(password, passwordConf);
    });
});