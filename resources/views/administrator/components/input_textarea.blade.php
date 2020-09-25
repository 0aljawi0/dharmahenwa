<div class="form-group">
    <label>{{ucfirst($name)}}</label>
    <textarea class="form-control" name="{{$name}}" {{$required ?? 'required'}}>{{$value}}</textarea>
</div>
