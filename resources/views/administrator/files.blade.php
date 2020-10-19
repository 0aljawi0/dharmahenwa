@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 animate__animated animate__fadeInDown">
        <h1 class="h3 mb-0 text-gray-800">Media</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Go To Dashboard</a>
    </div>

    @include('administrator.components.alert')

    <!-- Content Row -->
    <div class="row animate__animated animate__fadeInUp">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">
            <form id="form">

                @component('administrator.components.input_text')
                    @slot('name') name @endslot
                    @slot('value') {{old('name')}} @endslot
                    @slot('required') required @endslot
                @endcomponent

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="exampleRadios1" value="image" checked >
                        <label class="form-check-label" for="exampleRadios1">
                            Image
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="exampleRadios2" value="document">
                        <label class="form-check-label" for="exampleRadios2">
                            Document
                        </label>
                    </div>
                </div>

                <div id="image">
                    @component('administrator.components.input_image')
                        @slot('name') file @endslot
                    @endcomponent
                </div>

                <div id="pdf">
                    @component('administrator.components.input_file')
                        @slot('name') file @endslot
                    @endcomponent
                </div>

                <div class="progress mb-3">
                    <div id="progressBar" class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>

                <button type="submit" class="btn btn-primary shadow-sm">Upload</button>

            </form>
        </div>


    </div>

    <div class="row animate__animated animate__fadeInUp">
        <div class="col-lg-6">
            <h1>Images</h1>
            <div class="card-columns">
                @foreach ($files['images'] as $item)
                    <div class="card">
                        <img class="card-img-top" src="{{'storage/'.$item->path}}" alt="Images">
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <button type="button" class="btn btn-danger btn-sm shadow-sm" onclick="destroy({{$item->id}}, '{{$item->name}}')">Delete</button>
                            <form id="destroy_{{$item->id}}" action="{{route('files.destroy', ['id' => $item->id])}}" method="POST"> @csrf @method('DELETE') </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-6">
            <h1>Document</h1>
            <div class="card-columns">
                @foreach ($files['document'] as $item)
                    <div class="card">
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <a href="{{asset('storage/'.$item->path)}}" class="btn btn-info btn-sm shadow-sm"><i class="fas fa-file-alt fa-sm fa-fw"></i> {{$item->name}}</a>
                            <button type="button" class="btn btn-danger btn-sm shadow-sm" onclick="destroy({{$item->id}}, '{{$item->name}}')">Delete</button>
                            <form id="destroy_{{$item->id}}" action="{{route('files.destroy', ['id' => $item->id])}}" method="POST"> @csrf @method('DELETE') </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $(function () {
        $('.progress').hide();
        $('#image').show();
        $('#image-input').attr('required', 'required');
        $('#pdf').hide();
        $('#pdf-input').removeAttr('required').attr('disabled', 'disabled');

        $('input[name="type"]').on('change', function(event) {
            if (event.target.value == 'image') {
                $('#image').show();
                $('#image-input').attr('required', 'required').removeAttr('disabled');
                $('#pdf').hide();
                $('#pdf-input').removeAttr('required').attr('disabled', 'disabled');
            } else {
                $('#image').hide();
                $('#image-input').removeAttr('required').attr('disabled', 'disabled');
                $('#pdf').show();
                $('#pdf-input').attr('required', 'required').removeAttr('disabled');
            }
        })

        $('#form').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData($('#form')[0]);

            $('.progress').show();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                xhr : function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function(e){
                        if(e.lengthComputable){
                            console.log('Bytes Loaded : ' + e.loaded);
                            console.log('Total Size : ' + e.total);
                            console.log('Persen : ' + (e.loaded / e.total));

                            var percent = Math.round((e.loaded / e.total) * 100);

                            $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
                        }
                    });
                    return xhr;
                },
                type : 'POST',
                url : '{{route('files.store')}}',
                data : formData,
                processData : false,
                contentType : false,
                success : function(response){

                    if (response.status == 'ok') {
                        $('#form')[0].reset();
                        $('.progress').hide();
                        Swal.fire({
                            icon: 'success',
                            title: 'Upload Berhasil',
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        $('.progress').hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'Upload Gagal',
                            timer: 1000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                        });
                    }

                }
            });
        });
    });

    function destroy(id, title) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: title+" akan dihapus permanen.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus saja!',
            showClass: {
                popup: 'animate__animated animate__flipInX'
            },
            hideClass: {
                popup: 'animate__animated animate__flipOutX'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('destroy_'+id);
                form.submit();
                Swal.fire(
                    'Terhapus!',
                    'File sudah dihapus.',
                    'success'
                )
            }
        })
    }
</script>
@endpush
