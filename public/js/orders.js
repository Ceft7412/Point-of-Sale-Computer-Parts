    $('.item-all').on('click', function () {
        $('.product-item').show();
        // $.get('/order/all-products', function (data) {
        //     const oFlexBody = $('.o-flex-body');
        //     oFlexBody.empty();

        //     data.forEach(product => {
        //         const productItem = `
        //             <div class="product-item">
        //                 <div class="header-product">
        //                     <span class="price-product">₱${product.product_price}</span>
        //                 </div>
        //                 <div class="body-product">
        //                     <img src="${product.product_image}" alt="${product.product_name}" class="">
        //                 </div>
        //                 <div class="footer-product">
        //                     <span class="prod">${product.product_name}</span>
        //                 </div>
        //             </div>
        //         `;

        //         oFlexBody.append(productItem);
        //     });
        // });
    });


    //Hide category and show subcategory
    $('.item-category').on('click', function () {
        $('.category-group, .item-all').hide();

        const categoryId = $(this).data('category-id');

        $(`#subcategory-order-${categoryId}`).css('display', 'flex');

        $('.product-item').hide(); // Hide all products
        $('.product-item[data-category-id="' + categoryId + '"]').show();
    }); // Show products for clicked category


    //the data parameter is an array containing objects(my products)
    //to get the data, first we should set the route in order to get the json data and passing it into the parameter to hold
    //since the data array contains many objects(products) we must perform for loop
    //to show all the products specfied by our category_id in the column of product
    // to visualize the loop, in Laravel, it will look like this: foreach (data as product)
    // as to why the foreach looks like this in jquery, because why not? to make it complicated.
    // developers like complicated things haha!

    // $.get(('/order/products/' + categoryId), function (data) {
    //     const oFlexBody = $('.o-flex-body');
    //     oFlexBody.empty();

    //     data.forEach(product => {
    //         const productImageUrl = '/storage/product_images/' + product.product_image;
    //         const productItem = `
    //             <div class="product-item">
    //                 <div class="header-product">
    //                     <span class="price-product">₱${product.product_price}</span>
    //                 </div>
    //                 <div class="body-product">
    //                     <img src="${productImageUrl}" alt="${product.product_name}" class="">
    //                 </div>
    //                 <div class="footer-product">
    //                     <span class="prod">${product.product_name}</span>
    //                 </div>
    //             </div>
    //         `;

    //         oFlexBody.append(productItem);
    //     });
    // });



    $('.single-item').on('click', function () {

        const subcategoryId = $(this).data('subcategory-id');
        $('.product-item').hide(); // Hide all products
        $('.product-item[data-subcategory-id="' + subcategoryId + '"]').show();
        // const productId = $(this).data('subcategory-id');
        // $.get(('/order/subcategory/products/' + productId), function (data) {
        //     const oFlexBody = $('.o-flex-body');
        //     oFlexBody.empty();

        //     data.forEach(product => {
        //         const productImageUrl = '/storage/app/public/product_images/' + product.product_image;
        //         const productItem = `
        //             <div class="product-item">
        //                 <div class="header-product">
        //                     <span class="price-product">₱${product.product_price}</span>
        //                 </div>
        //                 <div class="body-product">
        //                     <img src="${productImageUrl}" alt="${product.product_name}" class="">
        //                 </div>
        //                 <div class="footer-product">
        //                     <span class="prod">${product.product_name}</span>
        //                 </div>
        //             </div>
        //         `;

        //         oFlexBody.append(productItem);
        //     });
        // });

    });

    $('.back').on('click', function () {
        $('.subcategory-group').hide();
        $('.category-group, .item-all').css('display', 'flex');
    });








    $(".num .item ").click(function () {
        var num = $(this).children().first().text();
        var inputVal = $("#input_numbers").val();
        $("#input_numbers").val(inputVal + num);
    });



    $(".del").click(function () {
        var inputVal = $("#input_numbers").val();
        $("#input_numbers").val(inputVal.slice(0, -1));
    });




    let selectedProducts = [];
    $('.proceed-button').on('click', function () {
        if (selectedProducts.length === 0) {
            $('.error-modal-wrapper').slideDown(50);
            $('#error-message').text(`Error notification: No order item available.`);
            setTimeout(function () {
                $('.error-modal-wrapper').slideUp(70);
            }, 5000);
        } else {
            $('.o-modal-wrapper').show();
        }


    });

    $('#av-mem-card').on('click', function () {
        $('.membership-modal-wrapper').css('display', 'flex');
    })

    $('.cancel-button-membership').on('click', function () {
        $('.membership-modal-wrapper').hide();
    });



    $('.rightbar-body').on('submit', function (e) {
        var inputNumbers = $('#input_numbers').val();
        var total = calculateTotal();
        if (!inputNumbers) {
            e.preventDefault();
            $('.er-val-red').show();
        }

        if (inputNumbers < total) {
            e.preventDefault();
            $('.er-val-red').text('Insufficient money.');
            $('.er-val-red').show();
        }
    });

    function updateSubtotalPrice() {
        let subtotalPrice = 0;
        selectedProducts.forEach(product => {
            const productPrice = parseFloat(product.product_price);
            if (isNaN(productPrice)) {
                console.error(`Invalid product price: ${product.product_price}`);
                return;
            }
            subtotalPrice += productPrice;
        });

        console.log(`Subtotal Price: ${subtotalPrice}`);
        $('.value-subtotal').val(`₱${subtotalPrice.toFixed(2)}`);
    }

    function calculateTotal() {
        let total = 0;
        selectedProducts.forEach(product => {
            total += product.item_quantity * product.product_price;
        });
        $('input[name="order_total"]').val(`₱${total.toFixed(2)}`);
        return total;
    }
    $('.confirm-money').on('click', function () {
        calculateChange();
    });

    // Event listener for the input field
    $('#input_numbers').on('input', function (event) {
        // Get the current input value
        let inputVal = $(this).val();

        // Ensure the input is valid: allows only numbers and one dot (.)
        inputVal = inputVal.replace(/[^0-9.]/g, '');

        // Remove any extra dots, allowing only one dot
        if (inputVal.indexOf('.') !== -1) {
            inputVal = inputVal.replace(/(\..*)\./g, '$1'); // Allow only one dot
        }

        // Set the sanitized value back to the input field
        $(this).val(inputVal);
    });

    function calculateChange() {
        // Calculate the total amount
        const total = calculateTotal();

        // Get the cash paid by the customer from the input field
        const cashPaid = parseFloat($('#input_numbers').val());

        // Calculate the change
        const change = cashPaid - total;

        // Format the change and display it
        if (change >= 0) {
            const formattedChange = change.toLocaleString('en-PH', {
                style: 'currency',
                currency: 'PHP'
            });
            $('.change-value').val(formattedChange);
            $('#change_value').val(change);
        } else {
            const formattedNeededMoney = Math.abs(change).toLocaleString('en-PH', {
                style: 'currency',
                currency: 'PHP'
            });
            $('.change-value').val(`Insufficient`);
            $('#change_value').val(Math.abs(change));
        }

    }

    $('.product-item').on('click', function (e) {
        const form = $(this);

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                const existingProductIndex = selectedProducts.findIndex(product => product.product_id === response.product_id);
                console.log(response);
                if (existingProductIndex === -1) {
                    response.item_quantity = 1;
                    selectedProducts.push(response);
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
                            <input type="hidden" name="order[${selectedProducts.length - 1}][id]" value="${response.id}">
                            <div class="icon-remove remove-item">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                        </div>
                    `;
                    $('.rightbar-body').append(productItem);
                } else {
                    const product = selectedProducts[existingProductIndex];
                    const quantityInput = $(`.rightbar-body-item[data-product-id="${response.product_id}"] .num-product-input`);
                    const currentQuantity = parseInt(quantityInput.val());
                    if (currentQuantity < response.product_quantity) {
                        product.item_quantity++;
                        quantityInput.val(product.item_quantity);
                    } else {
                        $('.error-modal-wrapper').slideDown(50); // Show the error modal
                        $('#error-message').text(`Error notification: Maximum quantity for product ${response.product_name} has been reached.`); // Set the error message
                        setTimeout(function () {
                            $('.error-modal-wrapper').slideUp(70);
                        }, 5000);


                    }
                }
                updateSubtotalPrice();
                calculateTotal();
            }
        });
    });
    $('.cancel').click(function () {

        $('.error-modal-wrapper').hide(); // Hide the error modal

    });

    $('.cancel-button').click(function () {
        $('.o-modal-wrapper').hide();
    });
    $('.ok').click(function () {
        $('.success-modal').hide();
    });


    $('.rightbar-body').on('click', '.increase-quantity', function () {
        const productItem = $(this).closest('.rightbar-body-item');
        const productId = productItem.data('product-id');
        const product = selectedProducts.find(product => product.product_id === productId);
        const quantityInput = productItem.find('.num-product-input');
        const currentQuantity = parseInt(quantityInput.val());
        if (currentQuantity < product.product_quantity) {
            const newQuantity = currentQuantity + 1;
            quantityInput.val(newQuantity);
            product.item_quantity = newQuantity;
            updateSubtotalPrice();
            calculateTotal();
        } else {
            alert(`Maximum quantity for product ${product.product_name} has been reached.`);
        }
    });



    $('.rightbar-body').on('click', '.decrease-quantity', function () {
        const productItem = $(this).closest('.rightbar-body-item');
        const productId = productItem.data('product-id');
        const product = selectedProducts.find(product => product.product_id === productId);
        const quantityInput = productItem.find('.num-product-input');
        const currentQuantity = parseInt(quantityInput.val());
        if (currentQuantity > 1) {
            const newQuantity = currentQuantity - 1;
            quantityInput.val(newQuantity);
            product.item_quantity = newQuantity;
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
        const productId = $(this).parent().data('product-id');
        selectedProducts = selectedProducts.filter(product => product.product_id !== productId);
        $(this).parent().remove();
        updateSubtotalPrice();
        calculateTotal();
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




    // =====membership page========

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
