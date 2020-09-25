<div class="form-group">
    <label>{{ucfirst($name)}}</label>
    <textarea class="form-control" id="{{$summernote}}" name="{{$name}}" {{$required ?? 'required'}}>{{$value}}</textarea>
</div>
