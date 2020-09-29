<section class="single-post pt-0">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <div class="content-breadcrumb pb-sm">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="active">
                            {{$title}}
                        </li>
                    </ol>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 entry p-0">
                    <div class="entry-content">
                        {{$slot}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
