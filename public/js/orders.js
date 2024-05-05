$('.item-all').on('click', function () {
    $.get('/order/all-products', function (data) {
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
$('.item-category').on('click', function () {
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
    $.get(('/order/products/' + categoryId), function (data) {
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


$('.single-item').on('click', function () {
    const productId = $(this).data('subcategory-id');
    $.get(('/order/subcategory/products/' + productId), function (data) {
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
$('.back').on('click', function () {
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











//=========================================================
// this product item is the card that is clicked in the content body
//=========================================================

$(document).on('click', '.product-item', function () {
    const product = {
        productId: $(this).data('product-id'),
        productName: $(this).find('#product_name').text(),
        productPrice: parseFloat($(this).find('#price_product').text().replace('₱', '')),
        quantity: 1,
        maxQuantity: $(this).data('max-quantity') 
    };


    // to call the product
    addToOrder(product);
});

// ===================================
// this order array will be the one to hold the object that is the product item that is clicked
// the object (product) will contain properties such as productId, productName, productPrice, and quantity
// it will look like this:
// order = [
        //index0
//     {
//         productId: 1,
//         productName: 'Product 1',
//         productPrice: 100.00,
//         quantity: 1
//     },

        //index1
//     {
//         productId: 2,
//         productName: 'Product 2',
//         productPrice: 200.00,
//         quantity: 1
//     }    
// ===================================



const order = [];


function addToOrder(product) {
    const existingProductIndex = order.findIndex(item => item.productId === product.productId);

    if (existingProductIndex > -1) {
        if (order[existingProductIndex].quantity < order[existingProductIndex].maxQuantity) {
            order[existingProductIndex].quantity += product.quantity;
            updateProductQuantity(order[existingProductIndex]);
        }
    } else {
        order.push(product);
        renderProductToRightbar(product, order.length - 1);
    }

    updateTotalPrice();
}   

function updateProductQuantity(product) {
    // find the product block in the rightbar body and update quantity
    const productBlock = $(`.rightbar-body-item[data-product-id="${product.productId}"]`);
    productBlock.find('.num-product-input').val(product.quantity);
}


function renderProductToRightbar(product, index) {
    const productBlock = `
            <div class="rightbar-body-item" data-product-id="${product.productId}">
                <div class="quantity-product">
                    <i class="bi bi-chevron-up increase-quantity"></i>
                    <input type="number" min="1" max="${product.maxQuantity}" value="${product.quantity}" class="num-product-input" name="order[${index}][quantity]">
                    <i class="bi bi-chevron-down decrease-quantity"></i>
                </div>
                <div class="product-name">
                    <input type="text" readonly value="${product.productName}" name="order[${index}][productName]">
                </div>
                <div class="product-price">
                    <input type="text" name="product_price" value="${product.productPrice}" readonly name="order[${index}][productPrice]">
                </div>
                <input type="hidden" name="order[${index}][productId]" value="${product.productId}">
                <div class="icon-remove remove-item">
                    <i class="bi bi-x-circle-fill"></i>
                </div>  
            </div>
        `;
    $('.rightbar-body').append(productBlock);
}



function removeProductFromOrder(productId) {
    const index = order.findIndex(item => item.productId === productId);
    if (index > -1) {
        order.splice(index, 1);
        $(`.rightbar-body-item[data-product-id="${productId}"]`).remove();
    }
    updateTotalPrice();
}

function updateTotalPrice() {
    let totalPrice = 0;
    order.forEach(item => {
        totalPrice += item.quantity * item.productPrice;
    });
    $('.value-total').val(`₱${totalPrice.toFixed(2)}`);
    
}



$(document).on('click', '.remove-item', function () {
    const productId = $(this).closest('.rightbar-body-item').data('product-id');
    removeProductFromOrder(productId);
});

//(increase and decrease)
$(document).on('click', '.increase-quantity', function () {
    const productBlock = $(this).closest('.rightbar-body-item');
    const productId = productBlock.data('product-id');
    const inputField = productBlock.find('.num-product-input');
    const currentQuantity = parseInt(inputField.val());
    const productIndex = order.findIndex(item => item.productId === productId);
    const maxQuantity = order[productIndex].maxQuantity;

    if (currentQuantity < maxQuantity) {
        const newQuantity = currentQuantity + 1;
        inputField.val(newQuantity);
        order[productIndex].quantity = newQuantity;
        updateTotalPrice();
    }
});

$(document).on('click', '.decrease-quantity', function () {
    const productBlock = $(this).closest('.rightbar-body-item');
    const productId = productBlock.data('product-id');
    const inputField = productBlock.find('.num-product-input');
    const currentQuantity = parseInt(inputField.val());
    if (currentQuantity > 1) {
        const newQuantity = currentQuantity - 1;

        inputField.val(newQuantity);
        const productIndex = order.findIndex(item => item.productId === productId);
        order[productIndex].quantity = newQuantity;
        updateTotalPrice();
    }
});



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
