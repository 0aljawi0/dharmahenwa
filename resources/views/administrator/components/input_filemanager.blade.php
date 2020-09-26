<div class="form-group">
    <label>File Manager</label>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button type="button" class="btn btn-primary btn-sm" onclick="openModal('{{$filetype}}')">
                File Manager
            </button>
        </div>
        <input type="text" id="file-input" name="{{$name}}" class="form-control readonly" {{$required ?? ''}} value="{{$value ?? ''}}">
    </div>

    <div id="image-preview">
        {{$image ?? ''}}
    </div>
</div>
