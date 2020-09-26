function handle_image(event, selector, width) {
    event.preventDefault();
    let preview = document.getElementById(selector);
    preview.innerHTML = '';

    let file = event.target.files[0];
    if (file) {
        if (file.size > 1000000) {
            alert('Ukuran gambar Max 1Mb');
        } else {
            if (file != undefined) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    var image = document.createElement('img');
                    image.setAttribute('src', e.target.result);
                    image.setAttribute('width', width);
                    image.setAttribute('alt', 'slider');
                    preview.appendChild(image);
                }
                reader.readAsDataURL(file);
            }
        }
    }
}

function sendFile (files, summernote, token) {
    let data = new FormData();
    data.append('image', files[0], files[0].name);

    var url = window.location.origin+'/admin/summernote';

    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: url,
        data: data,
        dataType: "JSON",
        cache: false,
        contentType: false,
        processData: false,
        mimeType:"multipart/form-data",
        success: function (res) {
            // $img = $('<img>').attr({ src: res.image});
            $(summernote).summernote('editor.insertImage', res.image);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus+" "+errorThrown);
        }
    })
}
