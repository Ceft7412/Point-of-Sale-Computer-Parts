<div class="archiveSubcategory-modal-wrapper">
    <div class="modal-card-wrapper" id="modal-card">
        <div class="heading">

            <span class="text-left">
                Set to Inactive
            </span>
            <span class="cancel-archive">
                <i class="bi bi-x-lg"></i>
            </span>
        </div>

        <div class="body">
            <div class="text">
                Archiving this row will remove the subcategory from the active list and will remain inactive. Are you sure
                you
                want to
                proceed?
            </div>
        </div>
        <div class="footer">
            <form method="POST" action="" id="archiveSubcategoryForm" id="subcategory_archive">
                @csrf
                <button type="button" class="cancel-archive">No, keep this active</button>
                <button type="submit" class="confirm-archive">Yes, make this inactive</button>
            </form>
        </div>

    </div>
</div>
