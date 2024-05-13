$('.submit-button-application').on('click', function () {
    var name = $('#applicant_name').val();
    var email = $('#applicant_email').val();
    var phone = $('#applicant_phone').val();
    if (name === "") {
        $('#applicant_name').css('borderColor', 'red');
        $('#applicant_name').siblings('.err-empty').show();
    } else {
        $('#applicant_name').css('borderColor', 'rgb(180, 180, 180)');
        $('#applicant_name').siblings('.err-empty').hide();
    }

    if (email === "") {
        $('#applicant_email').css('borderColor', 'red');
        $('#applicant_email').siblings('.err-empty').show();
    } else {
        $('#applicant_email').css('borderColor', 'rgb(180, 180, 180)');
        $('#applicant_email').siblings('.err-empty').hide();
    }

    if (phone === "") {
        $('#applicant_phone').css('borderColor', 'red');
        $('#applicant_phone').siblings('.err-empty').show();
    } else {
        $('#applicant_phone').css('borderColor', 'rgb(180, 180, 180)');
        $('#applicant_phone').siblings('.err-empty').hide();
    }
    if (name !== "" && email !== "" && phone !== "") {
        $('.confirm-pass-wrapper').css('display', 'flex');
    }



});

$('.submit-button-cancel').on('click', function () {
    $('.confirm-pass-wrapper').hide();
})
setTimeout(function () {
    $('#errorModal').slideUp();
}, 3000);
function updateClock() {
    var now = new Date();
    var formattedTime = now.toLocaleString('en-US', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true
    });
    $('#realtimeClock').text(formattedTime);
}

setInterval(updateClock, 1000);
