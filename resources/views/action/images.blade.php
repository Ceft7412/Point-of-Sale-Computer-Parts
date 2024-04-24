<div class="image-modal-wrapper">

    <div class="image-modal">
        <div class="header">
            <span class="b-title">Choose a picture...</span>
            <span class="s-title"><i class="bi bi-info-circle"></i>Selecting an image will instantly update the form.</span>
        </div>
        
        <div class="image-modal-flex">
            @foreach ($imageFiles as $imageFile)
                <div class="img-con" id="image-select">
                    <img src="{{ asset($imageFile) }}" alt=""
                        id="image-preview">
                </div>
            @endforeach
        </div>
        <div class="footer">
            <span class="cancel-image-modal">Cancel</span>
        </div>
    </div>
</div>