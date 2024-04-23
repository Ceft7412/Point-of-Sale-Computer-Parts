$("#topbar_menu").click(function (event) {
    event.stopPropagation();
    $("#topbar_menu").toggleClass("active");
    $(".tb-mn-ln").toggle(50);
});
$(document).click(function () {
    $("#topbar_menu").removeClass("active");
    $(".tb-mn-ln").hide(50);

});
$("#add-button-modal").click(function (event) {
    $("#modal").show();
});


$("#close-update-modal, #cancel-update-modal").click(function (event) {
    $(".update-modal-wrapper").hide();
    event.preventDefault();
});
$("#close-modal, #cancel-modal").click(function (event) {
    $("#modal").hide();
    event.preventDefault();
});
$(".category-menu").click(function (event) {
    $('.category-show').css("display", "flex");
    $('.subcategory-show').css("display", "none");
});
$(".subcategory-menu").click(function (event) {
    $('.subcategory-show').css("display", "flex");
    $('.category-show').css("display", "none");

});
$("#expand-more-category, #expand-less-category").click(function (event) {
    $('#archive-expand-category').toggle();
    $('#expand-more-category').toggle();
    $('#expand-less-category').toggle();
});
$("#expand-more-product, #expand-less-product").click(function (event) {
    $('#archive-expand-product').toggle();
    $('#expand-more-product').toggle();
    $('#expand-less-product').toggle();
});
$("#expand-more-employee, #expand-less-employee").click(function (event) {
    $('#archive-expand-employee').toggle();
    $('#expand-more-employee').toggle();
    $('#expand-less-employee').toggle();
});
if ($('#archive-expand-employee').hasClass('active')) {
    $('#archive-expand-employee').show(); 
    $('#expand-more-employee').toggle();
    $('#expand-less-employee').toggle();
} else {
    $('#archive-expand-employee').hide();
}
if ($('#archive-expand-admin').hasClass('active')) {
    $('#archive-expand-admin').show(); 
    $('#expand-more-admin').toggle();
    $('#expand-less-admin').toggle();
} else {
    $('#archive-expand-employee').hide();
}
$("#expand-more-admin, #expand-less-admin").click(function (event) {
    $('#archive-expand-admin').toggle();
    $('#expand-more-admin').toggle();
    $('#expand-less-admin').toggle();
});


$(".table-group").each(function () {
    if ($(this).find('.row-subcategory').length) {
        $(this).find(".chevron-down-category").show();
    }
});
$(".chevron-down-category").click(function (event) {
    $(this).toggle();
    $(this).siblings(".chevron-up-category").toggle();
    $(this).closest('.table-group').find('.table-subcategory-group').slideDown(50);
});

$(".chevron-up-category").click(function (event) {
    $(this).toggle();
    $(this).siblings(".chevron-down-category").toggle();
    $(this).closest('.table-group').find('.table-subcategory-group').slideUp(50);
});


$('.cc').click(function () {
    var category_id = $(this).attr('id');
    console.log('Category ID:', category_id);
    $('#orders-items-container').load('getCategories.php', {
        category_id: category_id

    });
});


$('#register-employee').on('submit', function (e) {
    if ($('#password').val() != $('#confirm-password').val()) {
        e.preventDefault();
        alert('Passwords do not match');
    }
});

$('#toggle-password').click(function () {
    $(this).find('i').toggleClass('bi-eye-slash-fill bi-eye-fill');
    var input = $('#password');
    if (input.attr('type') == 'password') {
        input.attr('type', 'text');
    } else {
        input.attr('type', 'password');
    }
});
$('.archive-w').on('click', function (e) {
    $('.archive-modal-wrapper').show();

});
$('.edit-w').on('click', function (e) {
    $('.update-modal-wrapper').show();
});



$('.cancel-archive').on('click', function (e) {
    $('.archive-modal-wrapper').hide();
});

$('#selectAllCheckbox').change(function () {
    // When the "select all" checkbox is checked or unchecked,
    // check or uncheck all other checkboxes
    $('.userCheckbox').prop('checked', $(this).prop('checked'));

    if ($(this).is(':checked')) {
        // If the "select all" checkbox is checked, show the archive button
        $('#archiveButton').show();
    } else {
        // If the "select all" checkbox is unchecked, hide the archive button
        $('#archiveButton').hide();
    }
});

$('.userCheckbox').change(function () {
    // If at least one checkbox is checked, show the archive button
    if ($('.userCheckbox:checked').length > 0) {
        $('#archiveButton').show();
    } else {
        // If no checkboxes are checked, hide the archive button
        $('#archiveButton').hide();
    }
});


class FormHandler {
    constructor(formId) {
        this.form = $(formId);
    }

    setAction(userId, action) {
        this.form.attr('action', `/${action}/` + userId);
    }
}


var archiveFormHandler = new FormHandler('#archiveForm');

$('.archiveButton').click(function () {
    var userId = $(this).data('user-id');
    archiveFormHandler.setAction(userId, 'archive');
   
}); 

var unarchiveFormHandler = new FormHandler('#unarchiveForm');

$('.unarchiveButton').click(function () {
    var userId = $(this).data('user-id');
    unarchiveFormHandler.setAction(userId, 'unarchive');
   
}); 


var updateFormHandler = new FormHandler('#updateForm');


$('.updateButton').click(function() {
    var userId = $(this).data('user-id');
    var action = 'update';
    updateFormHandler.setAction(userId, action);
    
    $.get('/admin/employee/' + userId, function(user) {
        $('input[name="type"]').val(user.type);
        $('input[name="update-name"]').val(user.name);
        $('input[name="update-username"]').val(user.username);
        $('input[name="update-email"]').val(user.email);
        $('input[name="update-contact"]').val(user.contact);
    });
});