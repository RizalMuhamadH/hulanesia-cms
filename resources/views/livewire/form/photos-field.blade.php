<div class="form-group">
    <label class="col-form-label">Image</label>
    <div class="custom-file">
        <input type="file" name="images[]" wire:model="photos" class="custom-file-input" id="customFile" multiple>
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    
    @if ($photos)

        <div class="row gutters-sm m-2">
            @foreach ($photos as $photo)
                <div class="col-6 col-sm-4">
                    <label class="imagecheck mb-4">
                        <figure class="imagecheck-figure">
                            <img src="{{ $photo->temporaryUrl() }}" class="imagecheck-image">
                        </figure>
                    </label>
                </div>
            @endforeach


        </div>

    @endif

</div>
