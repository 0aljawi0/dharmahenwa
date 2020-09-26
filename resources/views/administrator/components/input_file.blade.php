<div class="form-group">
    <label>{{ucfirst(str_replace('_', ' ', $name))}}</label>

    <input type="file" id="pdf-input" class="form-control-file" accept="application/pdf" name="{{$name}}" {{$required ?? ''}}>
</div>
