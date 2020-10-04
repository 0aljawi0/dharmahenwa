<section id="projects" class="projects-grid projects-3col hover-scale-project">
	<div class="container">
		<div class="heading">
			<div class="heading-bg heading-right">
				<h2>Press Release</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
            @foreach ($blogs as $item)

            @php
                $title = json_decode($item->title);
                $description = json_decode($item->description);

                if (Session::get('locale') == 'id') {
                    $description = strip_tags($description->id);
                    $description = substr($description, 0, 200).'[...]';
                } else {
                    $description = strip_tags($description->en);
                    $description = substr($description, 0, 200).'[...]';
                }

            @endphp


                <div class="col-xs-12 col-sm-6 col-md-4 entry">
                    <div class="entry-img o-hd br-50">
                        <a href="{{route('press_release_detail', ['id' => $item->id, 'title' => $title->en])}}">
                            <img src="{{asset('storage/'.$item->image)}}" alt="{{Session::get('locale') == 'id' ? $title->id : $title->en }}"/>
                        </a>
                    </div>
                    <div class="entry-title">
                        <br />
                        <h3>
                            <a href="{{route('press_release_detail', ['id' => $item->id, 'title' => $title->en])}}">
                                {{Session::get('locale') == 'id' ? $title->id : $title->en }}
                            </a>
                        </h3>
                    </div>
                    <div class="entry-content">
                        <p>{{$description}}</p>
                        <a class="entry-more" href="{{route('press_release_detail', ['id' => $item->id, 'title' => $title->en])}}"><i class="fa fa-plus"></i>
                            <span>read more</span>
                        </a>
                    </div>

                </div>
            @endforeach


			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<a class="btn btn-secondary" href="{{route('press_release')}}">read more</a>
			</div>
		</div>
		<!-- .row end -->
	</div>
</section>
