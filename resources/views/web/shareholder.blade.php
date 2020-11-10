@extends('layouts.web')

@php
    $website = json_decode($website->value);
@endphp

@section('favicon', asset('storage/'.$website->favicon))
@section('title', $website->title)
@section('description', $website->description)
@section('keyword', $website->keyword)
@section('author', $website->author)
@section('sitename', $website->sitename)

@section('content')
    @include('web.components.header')

    @component('web.components.page_title')
        @slot('image') {{asset('storage/'.$website->page_title_image)}} @endslot
        @slot('title') {{Session::get('locale') == 'id' ? 'Informasi Pemegang Saham' : 'Shareholders Information'}} @endslot
    @endcomponent

    <section class="single-post pt-0">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12">
                    <div class="content-breadcrumb pb-sm">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{route('profile')}}">Corporate Secretary</a>
                            </li>
                            <li class="active">
                                {{Session::get('locale') == 'id' ? 'Informasi Pemegang Saham' : 'Shareholders Information'}}
                            </li>
                        </ol>
                    </div>
                    <div class="row">

                        <!-- Entry Article #1 -->
                        <div class="col-xs-12 col-sm-12 col-md-12 entry">
                            <h2>
                                {{Session::get('locale') == 'id' ? 'Informasi Pemegang Saham' : 'Shareholders Information'}}
                            </h2>

                            <div class="dash-doughnut">
                                <div id="legend-chart" class="legend-chart"></div>
                                <canvas id="percentage-chart" width="500" height="500"></canvas>
                            </div>

                            <div class="entry-content">
                                <table>
                                    <thead>
                                        <tr class="no-b">
                                            <th width="35%">Name</th>
                                            <th width="33%">Number of Shares</th>
                                            <th width="32%">(%)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($shareholders as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->share}}</td>
                                                <td>{{$item->percent}}</td>
                                            </tr>
                                        @endforeach

                                        <tr class="bg-theme">
                                            <td>Total</td>
                                            <td>{{number_format(array_sum($share), 0, ',', '.') }}</td>
                                            <td>{{array_sum($percent)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.components.footer')
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script>
    var ctx = document.getElementById("percentage-chart");
	var myChart = new Chart(ctx, {
	  	type: 'pie',
	  	data: {
	    	labels: [
                @foreach($name as $item)
                    '{{$item}}',
                @endforeach
            ],
	    	datasets: [{
		      	data: [
                    @foreach($percent as $item)
                        {{round($item)}},
                    @endforeach
                ],
                backgroundColor: [
                    @foreach($percent as $item)
                        'hsl(97, {{rand(30, 60)}}%, {{rand(30, 60)}}%)',
                    @endforeach
		      	],
		      	borderWidth: 0
	    	}]
	  	},
	  	options: {
		   	cutoutPercentage: 40,
		    responsive: false,
		    legend: {
		    	display: false,
		    	position: 'right',
		    	responsive: true,
    	        scaleBeginAtZero: true,
    	        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
		        onClick: function (e) {
		            e.stopPropagation();
		        }
		    },
		    tooltips: {
		       	callbacks: {
		            label: function(tooltipItem, data) {
						var dataset = data.datasets[tooltipItem.datasetIndex];
						var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
							return previousValue + currentValue;
						});
						var currentValue = dataset.data[tooltipItem.index];
						var percentage = Math.floor(((currentValue/total) * 100)+0.5);
						return percentage + "%";
		            }
		        }
		    }
	  	}
	});
    $("#legend-chart").html(myChart.generateLegend());
</script>
@endpush
