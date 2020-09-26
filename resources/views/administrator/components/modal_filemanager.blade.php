<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="file-manager" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Manager</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" >
                    <div class="row">
                        <div class="col-12">
                            <form id="form">
                                @component('administrator.components.input_text')
                                    @slot('name') name @endslot
                                    @slot('value') {{old('name')}} @endslot
                                    @slot('required') required @endslot
                                @endcomponent

                                <input type="hidden" name="type">

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

                        <hr>

                        <div class="col-12" id="wrapper-images">
                            <h5>Images</h5>
                            <div class="row" id="images">

                            </div>
                        </div>

                        <div class="col-12" id="wrapper-documents">
                            <h5>Documents</h5>
                            <div class="row" id="documents">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    $(function () {
        $('.progress').hide();
        getAllFiles();

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
                url : window.location.origin+'/files',
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
                            getAllFiles();
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

    function openModal(filetype, name) {

        $('#file-manager').modal('show');
        $('#file').empty();
        $('[name="type"]').val(filetype);

        if (filetype == 'image') {
            $('#wrapper-documents').hide();
            $('#wrapper-images').show();

            $('#image').show();
            $('#image-input').attr('required', 'required').removeAttr('disabled');
            $('#pdf').hide();
            $('#pdf-input').removeAttr('required').attr('disabled', 'disabled');
        } else {
            $('#wrapper-documents').show();
            $('#wrapper-images').hide();

            $('#image').hide();
            $('#image-input').removeAttr('required').attr('disabled', 'disabled');
            $('#pdf').show();
            $('#pdf-input').attr('required', 'required').removeAttr('disabled');
        }
    }

    function getAllFiles() {
        $.get(window.location.origin+'/files_all', function (data, textStatus, jqXHR) {

            $('#images').empty();
            $('#documents').empty();

            $.each(data.images, function (i, item) {
                 $('#images').append(`
                    <div class="col-lg-4 mb-2">
                        <div class="card p-2 file-manager" onclick="choose('${item.type}', '${item.path}')">
                            <img class="card-img-top" src="${window.location.origin}/storage/${item.path}" alt="Images">
                        </div>
                    </div>
                 `);
            });

            $.each(data.document, function (i, item) {
                 $('#documents').append(`
                    <div class="col-lg-4 mb-2">
                        <div class="card p-2 text-center file-manager" onclick="choose('${item.type}', '${item.path}')">
                            <p class="mb-0"><i class="fas fa-file-alt fa-sm fa-fw"></i> ${item.name}</p>
                        </div>
                    </div>
                 `);
            });

        });
    }

    function choose(type, path) {
        if (type == 'image') {

            $('#file-input').val(path);
            $('#image-preview').empty().append(`<img src="${window.location.origin}/storage/${path}" alt="preview" width="50%">`);

            Swal.fire({
                icon: 'success',
                title: 'Image terpilih',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false,
            }).then((result) => {
                $('#file-manager').modal('hide');
            });
        } else {

            $('#file-input').val(path);

            Swal.fire({
                icon: 'success',
                title: 'Document terpilih',
                timer: 1000,
                timerProgressBar: true,
                showConfirmButton: false,
            }).then((result) => {
                $('#file-manager').modal('hide');
            });
        }
    }
</script>
@endpush
