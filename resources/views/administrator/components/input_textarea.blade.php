<div class="form-group">
    <label>{{ucfirst(str_replace('_', ' ', $name))}}</label>
    <textarea class="form-control" name="{{$name}}" {{$required ?? ''}}>{{$value ?? ''}}</textarea>
</div>
