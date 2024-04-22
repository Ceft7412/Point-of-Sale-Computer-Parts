{{--  ADD MODAL --}}

<div class="modal-wrapper" id="modal">
    <div class="modal-card-wrapper" id="modal-card">
        <div class="modal-flex">
            <div class="modal-header">
                <div class="item-1">
                    <span class="new-title">New Product</span>
                    <span class="material-symbols-outlined" id="close-modal">
                        close
                    </span>
                </div>
            </div>
            <form novalidate method="POST" enctype="multipart/form-data" class="form-wrapper">
                <div class="modal-body">
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Category:</label>
                            <select name="subcategory_id" id="" class="input">
                                <option value="">
                                    
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="input-wrapper flex-row">
                        <div class="flex-column">
                            <label for="">Picture (Optional):</label>
                            <input type="file" name="product_picture" class="">
                        </div>
                        <span clas="picture-wrapper"></span>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Product Name:</label>
                            <input type="text" name="product_name" class="input">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Price:</label>
                            <input type="number" min="1" name="product_price" class="input">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Quantity:</label>
                            <input type="number" min="1" name="product_quantity" class="input">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-flex-footer">
                        <button type="button" class="cancel" id="cancel-modal">Cancel</button>
                        <button type="submit" name="insert" class="save">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
