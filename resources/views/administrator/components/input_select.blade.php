<div class="form-group">
    <label>{{ucfirst(str_replace('_', ' ', $name))}}</label>
    <select name="{{$name}}" class="form-control" {{$required ?? ''}}>
        {{$slot}}
    </select>
</div>
