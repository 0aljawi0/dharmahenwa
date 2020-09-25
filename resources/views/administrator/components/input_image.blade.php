<div class="form-group">
    <label>{{ucfirst($name)}}</label>
    <div id="{{$name}}" class="my-2">
        {{$preview ?? ''}}
    </div>

    <input type="file" class="form-control-file" name="{{$name}}" {{$required ?? 'required'}} onchange="handle_image(event, '{{$name}}', '{{$width ?? '50%'}}')">
</div>
