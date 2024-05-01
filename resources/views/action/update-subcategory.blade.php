<div class="subcategoryUpdate-modal-wrapper">
    <div class="modal-card-wrapper" id="modal-card">
        <div class="modal-flex-employee">
            <div class="modal-header">
                <div class="item-1">
                    <span class="new-title">Update Subcategory</span>
                    <span class="material-symbols-outlined" id="close-update-modal">
                        close
                    </span>
                </div>
            </div>
            <form action="" class="form-wrapper" enctype="multipart/form-data" id="updateFormSubcategory"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Category:</label>
                            <select name="category_id" id="" class="input">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="input-wrapper flex-row space-between margin-bottom col-530">
                        <div class="col-pic">
                            <div class="flex-column">
                                <label for="">Picture (Optional):</label>
                                <input type="file" name='subcategory_image' accept=".jpg, .jpeg, .png"
                                    class="">
                            </div>
                            <span class="divider">Or</span>
                            <div class="pictures-group">
                                <span class="t-ps">Choose existing images</span>
                                <input type="hidden" id="selected_subcategory_image" name="selected_image">
                            </div>
                        </div>
                        <div class="picture-wrapper">
                            <img id="update_subcategory_image" class="image-place" alt="Subcategory Image">
                        </div>

                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Subcategory Name:</label>
                            <input type="text" name='subcategory_name' class="input" required>
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Description (Optional):</label>
                            <input type="text" name='subcategory_description' class="input">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-flex-footer">
                        <button type="button" class="cancel-modal">Cancel</button>
                        <button type="submit" class="save">Submit</button>
                    </div>
                </div>
            </form>
            <div class="image-modal-wrapper">

                <div class="image-modal">
                    <div class="header">
                        <span class="b-title">Choose a picture...</span>
                        <span class="s-title"><i class="bi bi-info-circle"></i>Selecting an image will instantly update
                            the form.</span>
                    </div>

                    <div class="image-modal-flex">
                        @foreach ($subcategoryImages as $subcategoryImage)
                            <div class="img-sub-con" id="image-select">
                                <img src="{{ asset($subcategoryImage) }}" alt="" id="image-preview">
                            </div>
                        @endforeach
                    </div>
                    <div class="footer">
                        <span class="cancel-image-modal">Cancel</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
