<div class="archive-modal-wrapper"  >
    <div class="modal-card-wrapper" id="modal-card">
        <div class="heading">

            <span class="text-left">
                Archive Row
            </span>
            <span class="cancel-archive">
                <i class="bi bi-x-lg"></i>
            </span>
        </div>

        <div class="body">
            <div class="text">
                Archiving this row will remove the user from the active list and will remain unactive. Are you sure you
                want to
                proceed?
            </div>
        </div>
        <div class="footer">
            <form method="POST" action="" id="archiveForm">
                @csrf
                <button type="button" class="cancel-archive">No, keep this row</button>
                <button type="submit" class="confirm-archive">Yes, archive this row</button>
            </form>
        </div>

    </div>
</div>
