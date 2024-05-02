
//Hide category and show subcategory
$('.item-category').on('click', function() {
    $(this).hide();
    $(this).next().css('display', 'flex');

});


//Show the category again
$('#back_category').on('click', function() {
    $('.item-category').show();
    $('.item-subcategory').hide();
});


$('.proceed-button').on('click', function() {
    $('.o-modal-wrapper').show();
});