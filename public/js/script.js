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


$("#close-update-modal, #cancel-update-modal, .cancel-modal").click(function (event) {
    $(".update-modal-wrapper").hide();
    $(".subcategoryUpdate-modal-wrapper").hide();
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
if ($('#subcategory-expand-category').hasClass('active')) {
    $('.table-subcategory-group').show();
    $('.category-body').hide();
}


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
$('.archiveSubcategoryButton').on('click', function (e) {
    $('.archiveSubcategory-modal-wrapper').show();

});


$('.archive-sub').on('click', function (e) {
    $('.unarchive-modal-wrapper').show();

});
$('.edit-w').on('click', function (e) {
    $('.update-modal-wrapper').show();
});

$('.updateSubcategoryButton').on('click', function (e) {
    $('.subcategoryUpdate-modal-wrapper').show();

});
$('.cancel-modal').on('click', function (e) {
    $('.update-modal-wrapper').hide();

});



$('.cancel-archive').on('click', function (e) {
    $('.archive-modal-wrapper').hide();
    $('.archiveSubcategory-modal-wrapper').hide();
    $('.unarchive-modal-wrapper').hide();
});

$('#selectAllCheckbox').change(function () {

    $('.userCheckbox').prop('checked', $(this).prop('checked'));

    if ($(this).is(':checked')) {

        $('#archiveButton').show();
    } else {

        $('#archiveButton').hide();
    }
});

$('.userCheckbox').change(function () {

    if ($('.userCheckbox:checked').length > 0) {
        $('#archiveButton').show();
    } else {

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
    setProduct(productId, action) {
        this.form.attr('action', `/product/${action}/` + productId); // e.g. product/update/1
    }
    setCategory(categoryId, action) {
        this.form.attr('action', `/category/${action}/` + categoryId); // e.g. category/update/1
    }

    setSubcategory(subcategoryId, action) {
        this.form.attr('action', `/category/subcategory/${action}/` + subcategoryId); // e.g. category/subcategory/update/1

    }

}

var updateFormHandler = new FormHandler('#updateForm');


$('.updateButton').click(function () {
    var userId = $(this).data('id');
    var action = 'update';
    updateFormHandler.setAction(userId, action);

    $.get('/admin/employee/' + userId, function (user) {
        $('input[name="type"]').val(user.type);
        $('input[name="update-name"]').val(user.name);
        $('input[name="update-username"]').val(user.username);
        $('input[name="update-email"]').val(user.email);
        $('input[name="update-contact"]').val(user.contact);
    });
});
$('.updateCategoryButton').click(function () {
    var imageUrl = $(this).data('image-url');  
    var categoryId = $(this).data('id');
    var action = 'update';
    updateFormHandler.setCategory(categoryId, action);

    $.get('/admin/category/' + categoryId, function (category) {
        $('#update_category_image').attr('src', imageUrl);
        $('#update_category_image').attr('alt', category.category_name);
        $('input[name="category_name"]').val(category.category_name);
        $('input[name="category_description"]').val(category.category_description);

    });
});

var updateFormSubcategory = new FormHandler('#updateFormSubcategory');
$('.updateSubcategoryButton').click(function () {
    var imageUrl = $(this).data('image-url');
    var subcategoryId = $(this).data('id');
    console.log(subcategoryId);
    var action = 'update';
    updateFormSubcategory.setSubcategory(subcategoryId, action);

    $.get('/admin/category/subcategory/' + subcategoryId, function (subcategory) {
        $('#update_subcategory_image').attr('src', imageUrl);
        $('#update_subcategory_image').attr('alt', subcategory.subcategory_image);
        $('input[name="subcategory_name"]').val(subcategory.subcategory_name);
        $('input[name="subcategory_description"]').val(subcategory.subcategory_description);

    });

});

var updateProductForm = new FormHandler('#updateProductForm');
$('.updateProductButton').click(function () {
    var imageUrl = $(this).data('image-url');   
    var productId = $(this).data('id');
    var action = 'update';
    updateProductForm.setProduct(productId, action);
    $.get('/admin/product/' + productId, function (product) {
        $('#product_image').attr('src', imageUrl);
        $('#product_image').attr('alt', product.product_name);
        $('input[name="product_name"]').val(product.product_name);
        $('input[name="product_price"]').val(product.product_price);
        $('input[name="product_quantity"]').val(product.product_quantity);
        $('input[name="product_description"]').val(product.product_description);
        $('input[name="product_category"]').val(product.category_id);
        $('input[name="product_subcategory"]').val(product.subcategory_id);
    });
});

var archiveFormHandler = new FormHandler('#archiveForm');

var unarchiveFormHandler = new FormHandler('#unarchiveForm');


$('.archiveButton').click(function () {
    var userId = $(this).data('id');
    archiveFormHandler.setAction(userId, 'archive');

});





var archiveCategoryForm = new FormHandler('#archiveCategoryForm');
$('.archiveCategoryButton').click(function () {
    var categoryId = $(this).data('id');
    archiveCategoryForm.setCategory(categoryId, 'archive');

})


var archiveSubcategoryForm = new FormHandler('#archiveSubcategoryForm');
$('.archiveSubcategoryButton').click(function () {
    var categoryId = $(this).data('id');
    archiveSubcategoryForm.setSubcategory(categoryId, 'archive');
});

var archiveProductForm = new FormHandler('#archiveProductForm');
$('.archiveProductButton').click(function () {
    var productId = $(this).data('id');
    archiveProductForm.setProduct(productId, 'archive');
});

$('.unarchiveCategoryButton').click(function () {
    var categoryId = $(this).data('id');
    unarchiveFormHandler.setCategory(categoryId, 'unarchive');


});

var unarchiveSubcategory = new FormHandler('#unarchiveFormSubcategory');
$('.unarchiveSubcategoryButton').click(function () {
    var categoryId = $(this).data('id');
    unarchiveSubcategory.setSubcategory(categoryId, 'unarchive');


});

var unarchiveProductForm = new FormHandler('#unarchiveProductForm');
$('.unarchiveProductButton').click(function () {
    var productId = $(this).data('id');
    unarchiveProductForm.setProduct(productId, 'unarchive');

});




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

function handleImageChange(inputName, updateImageId, selectedImageId) {
    $('input[name="' + inputName + '"]').on('change', function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + updateImageId).attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }

        $('#' + selectedImageId).val('');
    });
}

function handleImageClick(imageContainerClass, updateImageId, selectedImageId) {
    $('.' + imageContainerClass + ' img').on('click', function () {
        var src = $(this).attr('src');
        $('#' + updateImageId).attr('src', src);
        $('#' + selectedImageId).val(src);
        $('input[name="' + updateImageId + '"]').val('');
        $('.image-modal-wrapper').hide();
        $('#myModal').modal('hide');
    });
}

handleImageChange('category_image', 'update_category_image', 'selected_image');
handleImageClick('img-con', 'update_category_image', 'selected_image');

handleImageChange('subcategory_image', 'update_subcategory_image', 'selected_subcategory_image');
handleImageClick('img-sub-con', 'update_subcategory_image', 'selected_subcategory_image');

handleImageChange('product_image', 'product_image', 'selected_product_image');
handleImageClick('img-pro-con', 'product_image', 'selected_product_image');





if ($('#select-ctgry').hasClass('active')) {
    $('.table-subcategory-group').hide();
}


$('#select-sbctgry').click(function () {
    $('#select-ctgry').removeClass('active');
    $('#select-sbctgry').addClass('active');
    if ($('#select-sbctgry').hasClass('active')) {
        $('#selectAllCheckbox').hide();
    }

    $('.table-subcategory-group').show();
    $('.category-body').hide();
});

$('#select-ctgry').click(function () {
    $('#select-sbctgry').removeClass('active');
    $('#selectAllCheckbox').show();
    $('#select-ctgry').addClass('active');
    $('.table-subcategory-group').hide();
    $('.category-body').show();
});

$('.unarchiveSubcategoryButton').click(function () {
    var subcategoryId = $(this).data('id');
    $('#categorySelect option').each(function () {
        if ($(this).val() == subcategoryId) {
            $(this).prop('selected', true);
        } else {
            $(this).prop('selected', false);
        }
    });
});


// *===============SUCCESS MODAL OPEN WHEN FORM IS SUCCESSSFULLY SUBMITTED====================

$('#category_insert').on('submit', function (e) {
    e.preventDefault();
   $('.confirm-wrapper').show();

    $('.confirm-submit').off('click').on('click', function () {
        $('.confirm-wrapper').hide();
        e.target.submit();
    });

    $('.cancel').click(function () {
        $('.confirm-wrapper').hide();
        
    });
});

$('#subcategory_insert').on('submit', function (e) {
    e.preventDefault();
   $('.confirm-wrapper').show();

    $('.confirm-submit').off('click').on('click', function () {
        $('.confirm-wrapper').hide();
        e.target.submit();
    });

    $('.cancel').click(function () {
        $('.confirm-wrapper').hide();
        
    });
});

$('#product_insert').on('submit', function (e) {
    e.preventDefault();
   $('.confirm-wrapper').show();

    $('.confirm-submit').off('click').on('click', function () {
        $('.confirm-wrapper').hide();
        e.target.submit();
    });

    $('.cancel').click(function () {
        $('.confirm-wrapper').hide();
        
    });
});

$('#register-employee').on('submit', function (e) {
    e.preventDefault();
    if ($('#password').val() != $('#confirm-password').val()) {
        e.preventDefault();
        alert('Passwords do not match');
    }
    else{
        $('.confirm-wrapper').show();

        $('.confirm-submit').off('click').on('click', function () {
            $('.confirm-wrapper').hide();
            e.target.submit();
        });
    
    }
  
    $('.cancel').click(function () {
        $('.confirm-wrapper').hide();
        
    });

});

$('.ok').click(function () {
    $('.success-modal').hide();
});
$('.cancel').click(function () {
    $('.error-wrapper').hide();
    
});

