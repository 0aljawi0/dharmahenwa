<div class="form-group">
    <label>{{ucfirst(str_replace('_', ' ', $name))}}</label>
    <input type="{{$type ?? 'text'}}" class="form-control" name="{{$name}}" value="{{$value ?? ''}}" {{$required ?? ''}}>
</div>


