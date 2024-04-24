<div class="update-modal-wrapper">
    <div class="modal-card-wrapper" id="modal-card">
        <div class="modal-flex-employee">
            <div class="modal-header">
                <div class="item-1">
                    <span class="new-title">Update Category</span>
                    <span class="material-symbols-outlined" id="close-update-modal">
                        close
                    </span>
                </div>
            </div>
            <form action="" class="form-wrapper" enctype="multipart/form-data" id="updateForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="input-wrapper flex-row space-between margin-bottom col-530">
                        <div class="col-pic">
                            <div class="flex-column">
                                <label for="">Picture (Optional):</label>
                                <input type="file" name='category_image' accept=".jpg, .jpeg, .png"
                                    class="">
                            </div>
                            <span class="divider">Or</span>
                            <div class="pictures-group">
                                <span class="t-ps">Choose existing images</span>
                                <input type="hidden" id="selected_image" name="selected_image">
                            </div>
                        </div>
                        <div class="picture-wrapper">
                            <img id="update_category_image" class="image-place" alt="Category Image">
                        </div>

                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Category Name:</label>
                            <input type="text" name='category_name' class="input">
                        </div>
                    </div>
                    <div class="input-wrapper">
                        <div class="flex-column">
                            <label for="">Description (Optional):</label>
                            <input type="text" name='category_description' class="input">
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
            
            @include ('action.images')
        </div>
    </div>
</div>
