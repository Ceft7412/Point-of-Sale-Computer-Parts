$('.item-all').on('click', function () {
    $.get('/order/all-products', function(data) {
        const oFlexBody = $('.o-flex-body');
        oFlexBody.empty();

        data.forEach(product => {
            const productItem = `
                <div class="product-item">
                    <div class="header-product">
                        <span class="price-product">₱${product.product_price}</span>
                    </div>
                    <div class="body-product">
                        <img src="${product.product_image}" alt="${product.product_name}" class="">
                    </div>
                    <div class="footer-product">
                        <span class="prod">${product.product_name}</span>
                    </div>
                </div>
            `;

            oFlexBody.append(productItem);
        });
    });
});


//Hide category and show subcategory
$('.item-category').on('click', function() {
    $('.category-group, .item-all').hide();
    
    const categoryId = $(this).data('category-id');
    $(`#subcategory-order-${categoryId}`).css('display', 'flex');

    //the data parameter is an array containing objects(my products)
    //to get the data, first we should set the route in order to get the json data and passing it into the parameter to hold
    //since the data array contains many objects(products) we must perform for loop
    //to show all the products specfied by our category_id in the column of product
    // to visualize the loop, in Laravel, it will look like this: foreach (data as product)
    // as to why the foreach looks like this in jquery, because why not? to make it complicated.
    // developers like complicated things haha!
    $.get(('/order/products/' + categoryId), function(data) { 
        const oFlexBody = $('.o-flex-body');
        oFlexBody.empty();

        data.forEach(product => {
            const productItem = `
                <div class="product-item">
                    <div class="header-product">
                        <span class="price-product">₱${product.product_price}</span>
                    </div>
                    <div class="body-product">
                        <img src="${product.product_image}" alt="${product.product_name}" class="">
                    </div>
                    <div class="footer-product">
                        <span class="prod">${product.product_name}</span>
                    </div>
                </div>
            `;

            oFlexBody.append(productItem);
        });
    });
});


$('.single-item').on('click', function() {
    const productId = $(this).data('subcategory-id');
    $.get(('/order/subcategory/products/' + productId), function(data) {
        const oFlexBody = $('.o-flex-body');
        oFlexBody.empty();

        data.forEach(product => {
            const productItem = `
                <div class="product-item">
                    <div class="header-product">
                        <span class="price-product">₱${product.product_price}</span>
                    </div>
                    <div class="body-product">
                        <img src="${product.product_image}" alt="${product.product_name}" class="">
                    </div>
                    <div class="footer-product">
                        <span class="prod">${product.product_name}</span>
                    </div>
                </div>
            `;

            oFlexBody.append(productItem);
        });
    });

});

//Show the category again
$('.back').on('click', function() {
    $('.subcategory-group').hide();
    $('.category-group, .item-all').css('display', 'flex');
});


//Show the category again
$('.proceed-button').on('click', function () {
    $('.o-modal-wrapper').show();
});






$(".num .item ").click(function () {
    var num = $(this).children().first().text();
    var inputVal = $("#input_numbers").val();
    $("#input_numbers").val(inputVal + num);
});



$(".backspace").click(function () {
    var inputVal = $("#input_numbers").val();
    $("#input_numbers").val(inputVal.slice(0, -1));
});






//clicking the item will put it into the right side bar order
//we must create an array to store the different products added, why not? it should be an array.
let productItems = [];
$('.o-flex-body').on('click', '.product-item', function ()  {

    const productId = $(this).data('product-id')
    const cashierId = $('#cashier_name').data('user-id');
    
    
    const productItem = $(this);   
   
   
    // getting the data of the product - name and the price
    const productName = productItem.find('.footer-product span').text();
    const productPrice = parseFloat(productItem.find('.header-product .price-product').text().replace('₱', ''));

    // so we have a push method in javascript 
    //- we PUSH PUSH the data to our created array(productItem) 
    //- product-id, product-name, product-price

    //creating the product item

    // careful, it's a curly brace!
    productItems.push({
        product_id: productId,
        product_name: productName,
        product_price: productPrice,
        product_quantity: 1 // so why 1? after clicking a product item the default is of course 1
                            // unless changed, it will stay as so.
                            // i declared an on change functonality below down.
                            // so that whenever the quantity is changed by the employee, the input(which is 1) will be replaced.
                            // isn't that amazing, yeah?

    });
        


    const orderItem = `
    <div class="rightbar-body-item" data-product-id="${productId}">
        <div class="quantity-product">
            <i class="bi bi-chevron-up increase-quantity"></i>
            <input type="number" min="1" value="1" class="num-product-input">
            <i class="bi bi-chevron-down decrease-quantity"></i>
        </div>
        <div class="product-name">
            <span>${productName}</span>
        </div>
        <div class="product-price">
            <span>₱${productPrice.toFixed(2)}</span>
        </div>
        <div class="icon-remove remove-item">
            <i class="bi bi-x-circle-fill"></i>
        </div>
    </div>`;


    //adding the product item to the rightside bar
   
    $('.rightbar-body').append(
        `<input type="hidden" id="product-${productId}" name="productItems[]" value='${JSON.stringify({id: productId, name: productName, price: productPrice, quantity: 1})}' />`
    );
    $('.rightbar-body').append(orderItem);

    //updating the total price whenevr a new item is inserted 
    updateTotalPrice();

});

$('.rightbar-body').on('input', '.num-product-input', function () {
   
    const productItemDiv = $(this).closest('.rightbar-body-item');
    const productId = productItemDiv.data('product-id');
    const quantity = +$(this).val();
  
    

    const productItem = productItems.find(item => item.product_id === productId);
    console.log('Before change:', productItem);  
    productItem.product_quantity = quantity;
    console.log('After change:', productItem);

    $(`#product-${productId}`).val(JSON.stringify(productItem));
});


$('.rightbar-body').on('click', '.increase-quantity, .decrease-quantity', function () {
    const quantityInput = $(this).siblings('.num-product-input');
    let quantity = +quantityInput.val();
    if ($(this).hasClass('increase-quantity')) {
        quantity += 1;
    } else {
        if (quantity > 1) {
            quantity -= 1;
        }
    }
    quantityInput.val(quantity);
    quantityInput.trigger('input');
    updateTotalPrice();
});


$('.rightbar-body').on('click', '.remove-item', function(){
    $(this).closest('.rightbar-body-item').remove();
    updateTotalPrice();
});

function updateTotalPrice() {
    let totalPrice = 0;
    $('.rightbar-body-item').each(function () {
        const quantity = +$(this).find('.num-product-input').val();
        const price = parseFloat($(this).find('.product-price span').text().replace('₱', ''));
        totalPrice += quantity * price;
    });
    $('.value-total').text(`₱${totalPrice.toFixed(2)}`);
}



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
