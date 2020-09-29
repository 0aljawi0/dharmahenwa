<div class="form-group">
    <label>{{ucfirst(str_replace('_', ' ', $name))}}</label>
    <select name="{{$name}}" class="form-control select-2" {{$required ?? ''}}>
        {{$slot}}
    </select>
</div>

@push('script')
    <script>
        $(function () {
            $('.select-2').select2();
        });
    </script>
@endpush
