<div class="form-group">
    <label>{{ucfirst($name)}}</label>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">{{$icon ?? ''}}</span>
        </div>
        <input type="{{$type ?? 'text'}}" class="form-control" name="{{$name}}" value="{{$value ?? ''}}" {{$required ?? 'required'}}>
    </div>
</div>
