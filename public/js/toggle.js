$('#toggle-password').click(function () {
    $(this).find('i').toggleClass('bi-eye-slash-fill bi-eye-fill');
    var input = $('#password');
    if (input.attr('type') == 'password') {
        input.attr('type', 'text');
    } else {
        input.attr('type', 'password');
    }
});