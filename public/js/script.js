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
$(".cancel-image-modal").click(function (event) {
    $(".image-modal-wrapper").hide();
});
$(".category-menu").click(function (event) {
    $('.category-show').css("display", "flex");
    $('.subcategory-show').css("display", "none");
});
$(".subcategory-menu").click(function (event) {
    $('.subcategory-show').css("display", "flex");
    $('.category-show').css("display", "none");

});


function toggleElements(archiveId, moreId, lessId) {
    if ($(archiveId).hasClass('active')) {
        $(archiveId).show(); 
        $(moreId).toggle();
        $(lessId).toggle();
    } else {
        $(archiveId).hide();
    }

    $(moreId + ", " + lessId).click(function (event) {
        $(archiveId).toggle();
        $(moreId).toggle();
        $(lessId).toggle();
    });
}
toggleElements('#archive-expand-product', '#expand-more-product', '#expand-less-product');
toggleElements('#archive-expand-category', '#expand-more-category', '#expand-less-category');
toggleElements('#archive-expand-employee', '#expand-more-employee', '#expand-less-employee');
toggleElements('#archive-expand-admin', '#expand-more-admin', '#expand-less-admin');



$(".table-group").each(function () {
    if ($(this).find('.row-subcategory').length) {
        $(this).find(".chevron-down-category").show();
    }
});
$(".chevron-down-category").click(function (event) {
    const categoryId = $(this).data("category-id");
    $(this).hide();
    $(`#category-group-${categoryId} .chevron-up-category`).show();
    $(`#subcategory-group-${categoryId}`).slideDown(50);
});

$(".chevron-up-category").click(function (event) {
    const categoryId = $(this).data("category-id");
    $(this).hide();
    $(`#category-group-${categoryId} .chevron-down-category`).show();
    $(`#subcategory-group-${categoryId}`).slideUp(50);
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
$('.cancel-modal').on('click', function (e) {
    $('.update-modal-wrapper').hide();

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

    setCategory(categoryId, action) {
        this.form.attr('action', `/category/${action}/` + categoryId); // e.g. category/update/1
    }
}

var updateFormHandler = new FormHandler('#updateForm');


$('.updateButton').click(function() {
    var userId = $(this).data('id');
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
$('.updateCategoryButton').click(function() {
    var categoryId = $(this).data('id');
    var action = 'update';
    updateFormHandler.setCategory(categoryId, action);
    
    $.get('/admin/category/' + categoryId, function(category) {
        $('#update_category_image').attr('src', '/assets/images/category_uploads/' + category.category_image);
        $('#update_category_image').attr('alt', category.category_name);
        $('input[name="category_name"]').val(category.category_name);
        $('input[name="category_description"]').val(category.category_description);
        // Add more fields as needed
    });
});
var archiveFormHandler = new FormHandler('#archiveForm');

$('.archiveButton').click(function () {
    var userId = $(this).data('id');
    archiveFormHandler.setAction(userId, 'archive');
   
}); 

var unarchiveFormHandler = new FormHandler('#unarchiveForm');   

$('.unarchiveButton').click(function () {
    var userId = $(this).data('id');
    unarchiveFormHandler.setAction(userId, 'unarchive');


    
   
}); 
$('.img-con').click(function () {
    var imgId = $(this).data('id');

});


$('.t-ps').click(function () {
    $('.image-modal-wrapper').show();
});

$('input[name="category_image"]').on('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#update_category_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});


$('.img-con img').on('click', function() {
    // Set the source of the image in the .picture-wrapper div to the source of the clicked image
    $('#update_category_image').attr('src', $(this).attr('src'));

    // Set the value of the hidden input field to the source of the clicked image
    $('#selected_image').val($(this).attr('src'));

    // Close the modal
    // This depends on how your modal is implemented
    // Here's an example if you're using Bootstrap's modal
    $('.image-modal-wrapper').hide();
});


$('input[name="category_image"]').on('change', function() {
    // Clear the value of the hidden input
    $('#selected_image').val('');
});
$('.img-con img').on('click', function() {
    // Clear the value of the file input
    $('input[name="category_image"]').val('');

    // Set the source of the image in the .picture-wrapper div to the source of the clicked image
    $('#update_category_image').attr('src', $(this).attr('src'));

    // Set the value of the hidden input field to the source of the clicked image
    $('#selected_image').val($(this).attr('src'));

    // Close the modal
    // This depends on how your modal is implemented
    // Here's an example if you're using Bootstrap's modal
    $('#myModal').modal('hide');
});

    