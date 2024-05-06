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




    let selectedProducts = [];
    function updateSubtotalPrice() {
    let subtotalPrice = 0;

    // Iterate through each product in selectedProducts
    selectedProducts.forEach(product => {
        // Convert product_price to a float to ensure it's numeric
        const productPrice = parseFloat(product.product_price);
        
        // Check if productPrice is a valid number
        if (isNaN(productPrice)) {
            console.error(`Invalid product price: ${product.product_price}`);
            return; // Skip this product if the price is invalid
        }
        
        // Add the product price to the subtotal
        subtotalPrice += productPrice;
    });

    // Log subtotalPrice for debugging
    console.log(`Subtotal Price: ${subtotalPrice}`);

    // Update the subtotal value in the DOM
    $('.value-subtotal').val(`₱${subtotalPrice.toFixed(2)}`);
}
    function calculateTotal() {
        let total = 0;
        selectedProducts.forEach(product => {
            // Use item_quantity instead of product_quantity to calculate the total
            total += product.item_quantity * product.product_price;
        });

        // Update the total in the DOM
        $('input[name="order_total"]').val(`₱${total.toFixed(2)}`);
    }



   
    $('.product-item').on('click', function(e) {
        const form = $(this);

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                const existingProductIndex = selectedProducts.findIndex(product => product.product_id === response.product_id);
                console.log(response);
                if (existingProductIndex === -1) {
                    // Product is not already in the selectedProducts array, so add it
                    response.item_quantity = 1;  // Initialize the item_quantity to 1
                    selectedProducts.push(response);
                    
                    // Create the new product item in the DOM
                    const productItem = `
                        <div class="rightbar-body-item" data-product-id="${response.product_id}">
                            <div class="quantity-product">
                                <i class="bi bi-chevron-up increase-quantity"></i>
                                <input type="number" min="1" max="${response.product_quantity}" value="1" class="num-product-input" name="order[${selectedProducts.length - 1}][item_quantity]">
                                <i class="bi bi-chevron-down decrease-quantity"></i>
                            </div>
                            <div class="product-name">
                                <input type="text" readonly value="${response.product_name}" name="order[${selectedProducts.length - 1}][product_name]">
                            </div>
                            <div class="product-price">
                                <input type="text" value="${response.product_price}" readonly name="order[${selectedProducts.length - 1}][product_price]">
                            </div>
                            <input type="hidden" name="order[${selectedProducts.length - 1}][product_id]" value="${response.product_id}">
                            <div class="icon-remove remove-item">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                        </div>
                    `;
                    $('.rightbar-body').append(productItem);
                } else {
                    // Product is already in selectedProducts, increase the quantity
                    const product = selectedProducts[existingProductIndex];
                    const quantityInput = $(`.rightbar-body-item[data-product-id="${response.product_id}"] .num-product-input`);
                    const currentQuantity = parseInt(quantityInput.val());
                    
                    // Only increase the quantity if it doesn't exceed the stock limit
                    if (currentQuantity < response.product_quantity) {
                        product.item_quantity++;
                        quantityInput.val(product.item_quantity);
                    } else {
                        alert(`Maximum quantity for product ${response.product_name} has been reached`);
                    }
                }
                // Recalculate the total price
                updateSubtotalPrice();
                calculateTotal();
            }
        });
    });



    $('.rightbar-body').on('click', '.increase-quantity', function() {
        const productItem = $(this).closest('.rightbar-body-item');
        const productId = productItem.data('product-id');
        
        // Find the product in selectedProducts array
        const product = selectedProducts.find(product => product.product_id === productId);
        
        // Get the quantity input field
        const quantityInput = productItem.find('.num-product-input');
        const currentQuantity = parseInt(quantityInput.val());
        
        // Check if increasing the quantity doesn't exceed the stock limit
        if (currentQuantity < product.product_quantity) {
            const newQuantity = currentQuantity + 1;
            quantityInput.val(newQuantity);
            
            // Update the item_quantity in the selectedProducts array
            product.item_quantity = newQuantity;
            
            // Recalculate the total price
            updateSubtotalPrice();
            calculateTotal();
        } else {
            alert(`Maximum quantity for product ${product.product_name} has been reached.`);
        }
    });



    $('.rightbar-body').on('click', '.decrease-quantity', function() {
        const productItem = $(this).closest('.rightbar-body-item');
        const productId = productItem.data('product-id');
        
        // Find the product in the selectedProducts array
        const product = selectedProducts.find(product => product.product_id === productId);
        
        // Get the quantity input field
        const quantityInput = productItem.find('.num-product-input');
        const currentQuantity = parseInt(quantityInput.val());
        
        // Check if decreasing the quantity doesn't go below the minimum limit
        if (currentQuantity > 1) {
            const newQuantity = currentQuantity - 1;
            quantityInput.val(newQuantity);
            
            // Update the item_quantity in the selectedProducts array
            product.item_quantity = newQuantity;
            
            // Recalculate the total price
            calculateTotal();
        } else {
            alert('Quantity cannot be less than 1.');
        }
    });
    $('.rightbar-body').on('input', '.num-product-input', function () {
        const max = parseInt($(this).attr('max'));
        const min = parseInt($(this).attr('min'));
        if ($(this).val() > max) {
            $(this).val(max);
        } else if ($(this).val() < min) {
            $(this).val(min);
        }
    });

    $('.rightbar-body').on('click', '.remove-item', function () {
        // Get the product ID from the parent .rightbar-body-item element
        const productId = $(this).parent().data('product-id');

        // Remove the product from the selectedProducts array
        selectedProducts = selectedProducts.filter(product => product.product_id !== productId);

        // Remove the product item from the DOM
        $(this).parent().remove();
    });



    //=========================================================
    // this product item is the card that is clicked in the content body
    //=========================================================

    // $(document).on('click', '.product-item', function () {
    //     const product = {
    //         productId: $(this).data('product-id'),
    //         productName: $(this).find('#product_name').text(),
    //         productPrice: parseFloat($(this).find('#price_product').text().replace('₱', '')),
    //         quantity: 1,
    //         maxQuantity: $(this).data('max-quantity') 
    //     };


    //     // to call the product
    //     addToOrder(product);
    // });

    // // ===================================
    // // this order array will be the one to hold the object that is the product item that is clicked
    // // the object (product) will contain properties such as productId, productName, productPrice, and quantity
    // // it will look like this:
    // // order = [
    //         //index0
    // //     {
    // //         productId: 1,
    // //         productName: 'Product 1',
    // //         productPrice: 100.00,
    // //         quantity: 1
    // //     },

    //         //index1
    // //     {
    // //         productId: 2,
    // //         productName: 'Product 2',
    // //         productPrice: 200.00,
    // //         quantity: 1
    // //     }    
    // // ===================================



    // const order = [];


    // function addToOrder(product) {
    //     const existingProductIndex = order.findIndex(item => item.productId === product.productId);

    //     if (existingProductIndex > -1) {
    //         if (order[existingProductIndex].quantity < order[existingProductIndex].maxQuantity) {
    //             order[existingProductIndex].quantity += product.quantity;
    //             updateProductQuantity(order[existingProductIndex]);
    //         }
    //     } else {
    //         order.push(product);
    //         renderProductToRightbar(product, order.length - 1);
    //     }

    //     updateTotalPrice();
    //     updateSubtotalPrice();

    // }   

    // function updateProductQuantity(product) {
    //     // find the product block in the rightbar body and update quantity
    //     const productBlock = $(`.rightbar-body-item[data-product-id="${product.productId}"]`);
    //     productBlock.find('.num-product-input').val(product.quantity);
    // }


    // function renderProductToRightbar(product, index) {
    //     const productBlock = `
    //             <div class="rightbar-body-item" data-product-id="${product.productId}">
    //                 <div class="quantity-product">
    //                     <i class="bi bi-chevron-up increase-quantity"></i>
    //                     <input type="number" min="1" max="${product.maxQuantity}" value="${product.quantity}" class="num-product-input" name="order[${index}][quantity]">
    //                     <i class="bi bi-chevron-down decrease-quantity"></i>
    //                 </div>
    //                 <div class="product-name">
    //                     <input type="text" readonly value="${product.productName}" name="order[${index}][productName]">
    //                 </div>
    //                 <div class="product-price">
    //                     <input type="text" value="${product.productPrice}" readonly name="order[${index}][productPrice]">
    //                 </div>
    //                 <input type="hidden" name="order[${index}][productId]" value="${product.productId}">
    //                 <div class="icon-remove remove-item">
    //                     <i class="bi bi-x-circle-fill"></i>
    //                 </div>  
    //             </div>
    //         `;
    //     $('.rightbar-body').append(productBlock);
    // }



    // function removeProductFromOrder(productId) {
    //     const index = order.findIndex(item => item.productId === productId);
    //     if (index > -1) {
    //         order.splice(index, 1);
    //         $(`.rightbar-body-item[data-product-id="${productId}"]`).remove();
    //     }
    //     updateTotalPrice();
    //     updateSubtotalPrice();
    // }



    // function updateTotalPrice() {
    //     let totalPrice = 0;
    //     order.forEach(item => {
    //         totalPrice += item.quantity * item.productPrice;
    //     });
    //     $('.value-total').val(`₱${totalPrice.toFixed(2)}`);

    // }

    // function updateSubtotalPrice() {
    //     let subtotalPrice = 0;
    //     order.forEach(item => {
    //         subtotalPrice += item.productPrice;
    //     });
    //     $('.value-subtotal').val(`₱${subtotalPrice.toFixed(2)}`);
    // }



    // $(document).on('click', '.remove-item', function () {
    //     const productId = $(this).closest('.rightbar-body-item').data('product-id');
    //     removeProductFromOrder(productId);
    // });

    // //(increase and decrease)
    // $(document).on('click', '.increase-quantity', function () {
    //     const productBlock = $(this).closest('.rightbar-body-item');
    //     const productId = productBlock.data('product-id');
    //     const inputField = productBlock.find('.num-product-input');
    //     const currentQuantity = parseInt(inputField.val());
    //     const productIndex = order.findIndex(item => item.productId === productId);
    //     const maxQuantity = order[productIndex].maxQuantity;

    //     if (currentQuantity < maxQuantity) {
    //         const newQuantity = currentQuantity + 1;
    //         inputField.val(newQuantity);
    //         order[productIndex].quantity = newQuantity;
    //         updateTotalPrice();
    //     }
    // });

    // $(document).on('click', '.decrease-quantity', function () {
    //     const productBlock = $(this).closest('.rightbar-body-item');
    //     const productId = productBlock.data('product-id');
    //     const inputField = productBlock.find('.num-product-input');
    //     const currentQuantity = parseInt(inputField.val());
    //     if (currentQuantity > 1) {
    //         const newQuantity = currentQuantity - 1;

    //         inputField.val(newQuantity);
    //         const productIndex = order.findIndex(item => item.productId === productId);
    //         order[productIndex].quantity = newQuantity;
    //         updateTotalPrice();
    //     }
    // });



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
