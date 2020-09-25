@if (Session::has('message'))
    <div class="alert alert-{{Session::get('type')}} animate__animated animate__fadeInDown" role="alert">
        {{Session::get('message')}}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

