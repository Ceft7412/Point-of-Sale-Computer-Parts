<div class="unarchive-modal-wrapper">
    <div class="modal-card-wrapper" id="modal-card">
        <div class="heading">

            <div class="text-left">
                <span class="big">Set to Active</span>
                <span class="small"><i class="bi bi-info-circle"></i>By default, the category of the data is selected. </span>
            </div>

            <span class="cancel-archive">
                <i class="bi bi-x-lg"></i>
            </span>
        </div>
        {{-- ACTION: /category/unarchive/{id} --}}
        <form method="POST" action="" id="unarchiveFormSubcategory" class="unarchiveForm"> 
            @csrf
            @method('PUT')
            <div class="body">
                <div class="text">

                    <select name="category_id"  id="categorySelect" class="category-select">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="footer">
                <button type="button" class="cancel-archive">No, keep this inactive</button>
                <button type="submit" class="confirm-archive">Yes, make this active</button>
            </div>
        </form>
    </div>
</div>