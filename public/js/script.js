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


$(document).on('click', "#close-update-modal, #cancel-update-modal, .cancel-modal", function (event) {
    $('.cancel-modal').each(function() {
        $(this).closest('form')[0].reset();
    });
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
toggleElements('#archive-expand-member', '#expand-more-member', '#expand-less-member');
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
    const chevId = $(this).data("id");
    $(this).hide();
    $(` .chevron-up-category`).show();
    $(`#subcategory-group-${categoryId}`).slideDown(50);
});

$(".chevron-up-category").click(function (event) {
    const categoryId = $(this).data("id");
    $(this).hide();
    $(` .chevron-down-category`).show();
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




// *===archive===

$(document).on('click', '.archiveButton', function () {
    const archiveId = $(this).data('id');
    $(`#archive_${archiveId}`).show();

});
$(document).on('click', '.unarchiveParentButton', function(){
    const archiveId = $(this).data('id');   
    $(`#unarchive_${archiveId}`).show();
})


// ? this block will check if there are any parents archived. if there are, 
// ? we will show a different modal requesting the user to pick a new and active parent
$(document).on('click', '.unarchiveButton', function(){
    const archiveId = $(this).data('id');
    const parentId = $(this).data('parent-id');

    $.ajax({
        url: '/admin/archive/brands/check-category/' + parentId,
        method: 'GET',
        success: function(response) {
            console.log(response);
            if (response.is_active == 0) {

                $('.small').html(`Since the category ${response.category_name} is archived, we request you to choose a new and active category. `);
                $(`#unarchiveChoose_${archiveId}`).show();
               
            } else {
                
                $(`#unarchive_${archiveId}`).show();
            }
        }   
    })
    
});

// ? end


// ? this block will check if there are any parents archived. if there are, 
// ? we will show a different modal requesting the user to pick a new and active parent
$(document).on('click', '.unarchiveProductButton', function(){
    const archiveId = $(this).data('id');
    const parentId = $(this).data('parent-id');
    $.ajax({
        url: '/admin/archive/product/check-brands/' + parentId,
        method: 'GET',
        success: function(response) {
            console.log(response);
            if (response.is_active == 0) {
                $('.small').html(`Since the brand ${response.subcategory_name} is archived, we request you to choose a new and active brand. `);
                $(`#unarchiveChoose_${archiveId}`).show();
               
            } else {
                
                $(`#unarchive_${archiveId}`).show();
            }
        }   
    })
});

// ? end


// *===update===
$(document).on('click', '.updateButton', function (e) {
    const updateId = $(this).data('id');
    $(`#update_${updateId}`).show();
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
// *===start of archiving groups===

$('#archive_select_group').on('click', function(){
    $(this).siblings('.unarchive-modal-wrapper').show();
    $(this).siblings('.archive-modal-wrapper').show(); 
})
$(document).ready(function() {
    $('<input>').attr({
        type: 'hidden',
        id: 'memberIdsInput',
        name: 'archiveIds'
    }).appendTo('#archiveGroup');
    function updateMemberIdsInput() {
        var checkedMemberIds = [];
        $('.userCheckbox:checked').each(function() {
            checkedMemberIds.push($(this).val());
        });
        $('#memberIdsInput').val(checkedMemberIds.join(','));
    }

    function updateArchiveButtonVisibility() {
        var anyChecked = $('.userCheckbox:checked').length > 0;
        if (anyChecked) {
            $('#archive_select_group').show();
        } else {
            $('#archive_select_group').hide();
        }
    }

    $('.userCheckbox').on('change', function() {
        updateMemberIdsInput();
        updateArchiveButtonVisibility();
        var allChecked = $('.userCheckbox').length === $('.userCheckbox:checked').length;
        $('#selectAllCheckbox').prop('checked', allChecked);
    });
    $('#selectAllCheckbox').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('.userCheckbox').prop('checked', isChecked);
        updateMemberIdsInput();
        updateArchiveButtonVisibility();
    });
    updateArchiveButtonVisibility();
    
});

// *===end of archiving groups===



// $('.unarchiveButton').click(function () {
//     var userId = $(this).data('id');
//     unarchiveFormHandler.setAction(userId, 'unarchive');




// });


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
    $(document).on('click', '.' + imageContainerClass + ' img', function () {
        var imgId = $(this).data('id');
        console.log(imgId);
        var src = $(this).attr('src');
        console.log(src);
        $('.' + updateImageId).attr('src', src);
        $('.' + selectedImageId).val(src);
        $('input[name="' + updateImageId + '"]').val('');
        $('.image-modal-wrapper').hide();
    });
}

handleImageChange('category_image', 'update_category_image', 'selected_image');
handleImageClick('img-con', 'image-place', 'selected_image');

handleImageChange('subcategory_image', 'update_subcategory_image', 'selected_subcategory_image');
handleImageClick('img-sub-con', 'update_subcategory_image', 'selected_subcategory_image');

handleImageChange('product_image', 'product_image', 'selected_product_image');
handleImageClick('img-pro-con', 'image-place', 'selected_product_image');





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


// *===members updating===


// *===members archiving===
$('#archiveButton').on('click', function(){
    $('#archiveGroupMembers').submit();
});

$('.tbl-cell').on('click', '.select_archive_active_member', function(){
    const memberId = $(this).data('member-id');
    $(`#archive_modal_${memberId}`).css('display', 'flex');
    
});

// *===end of members archiving===
$('.tbl-cell').on('click', '.select_update_active_member', function(){
    const memberId = $(this).data('member-id');
    console.log(memberId);
    $(`#update_modal_${memberId}`).show();

});


// *===membership modal===

$('.tbdy-rw').on('click','#accept_membership', function (e) {
    $('#accept_membership_modal').css('display', 'flex');
});

$('.tbdy-rw').on('click', '#decline_membership',function (e) {
    $('#decline_membership_modal').css('display', 'flex');
});

$('.btn-no').on('click', function (e) {
    $('#accept_membership_modal').hide();
    $('#decline_membership_modal').hide();
    $('.a-m-wrapper').hide();
});
// *===end of membership modal action===

