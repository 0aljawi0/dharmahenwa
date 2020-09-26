<div class="form-group">
    <label>{{ucfirst(str_replace('_', ' ', $name))}}</label>

    <div id="{{$name}}" class="my-2">
        {{$preview ?? ''}}
    </div>

    <input type="file" id="image-input" class="form-control-file" accept="image/*" name="{{$name}}" {{$required ?? ''}} onchange="handle_image(event, '{{$name}}', '{{$width ?? '50%'}}')">
</div>
