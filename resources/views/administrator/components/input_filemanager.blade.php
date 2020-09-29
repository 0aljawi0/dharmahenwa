<div class="form-group">
    <label>{{ucfirst(str_replace('_', ' ', $name))}}</label>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button type="button" class="btn btn-primary btn-sm" onclick="openModal('{{$filetype}}', '{{$name}}')">
                File Manager
            </button>
        </div>
        <input type="text" name="{{$name}}" class="form-control readonly" {{$required ?? ''}} value="{{$value ?? ''}}">
    </div>

    <div id="image-preview-{{$name}}">
        {{$image ?? ''}}
    </div>
</div>
