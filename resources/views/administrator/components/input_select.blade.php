<div class="form-group">
    @php
        $explode = explode('_', $name);
        array_pop($explode);
        $title = implode(' ', $explode);
    @endphp
    <label>{{ucfirst($title)}}</label>
    <select name="{{$name}}" class="form-control" {{$required ?? 'required'}}>
        {{$slot}}
    </select>
</div>
