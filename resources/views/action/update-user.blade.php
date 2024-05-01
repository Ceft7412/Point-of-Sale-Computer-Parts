<div class="update-modal-wrapper" >
    <div class="modal-card-wrapper" id="modal-card">
        <div class="modal-flex-employee">
            <div class="modal-header">
                <div class="item-1">
                    <span class="new-title">Update Employee</span>
                    <span class="material-symbols-outlined" id="close-update-modal">
                        close
                    </span>
                </div>  
            </div>
            <form action="" class="form-wrapper" id="updateForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                  
                    <div class="input-user-type input-wrapper">
                        <input type="hidden" name="type">
                    </div>
                    <div class="input-name input-wrapper">
                        <div class="flex-column">
                            <label for="">Name:</label>
                            <input type="text" name="update-name"class="input" required>

                        </div>
                        <div class="flex-column">
                            <label for="">Username:</label>
                            <input type="text" name="update-username" class="input" required>
                            @error('username')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="input-email input-wrapper">
                        <div class="flex-column">
                            <label for="">Email:</label>
                            <input type="email" name="update-email" class="input" required>
                            <div class="error"></div>
                        </div>
                        <div class="flex-column">
                            <label for="">Contact No: (Optional)</label>
                            <input type="tel" name="update-contact" class="input">
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

        </div>
    </div>
</div>