<section id="hero-2" class="hero-2">

	<div id="hero-slider" class="hero-slider">

        @foreach ($sliders as $item)

            @php
                $title = json_decode($item->title);
                $subtitle = json_decode($item->subtitle);
            @endphp

            <div class="item">
                <div class="item-bg bg-overlay">
                    <div class="bg-section">
                        <img src="{{asset('storage/'.$item->image)}}"  alt="{{Session::get('locale') == 'id' ? $title->id : $title->en}}"  width="1920" height="1280">
                    </div>
                </div>
                <div class="container sliderbg-caption">
                    <div class="hero-slide">
                        <div class="slide-title">
                            <h2>{{Session::get('locale') == 'id' ? $title->id : $title->en}}</h2>
                        </div>
                        <div class="slide-heading">
                            <p>{{Session::get('locale') == 'id' ? $subtitle->id : $subtitle->en}}</p>
                        </div>
                        <div class="slide-action">
                            <a class="btn btn-primary" href="{{$item->link}}">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

	</div>
</section>
