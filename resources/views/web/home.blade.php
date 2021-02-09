@extends('layouts.web')

@php
    $website = json_decode($website->value);
    $home_section = json_decode($home_section->value);
@endphp

@section('favicon', asset('storage/'.$website->favicon))
@section('title', $website->title)
@section('description', $website->description)
@section('keyword', $website->keyword)
@section('author', $website->author)
@section('sitename', $website->sitename)

@section('content')
    @include('web.components.header')
    @include('web.components.hero')
    @include('web.components.service')
    @include('web.components.about')
    @include('web.components.annualreport')
    @include('web.components.pressrelease')
    @include('web.components.stockprice')
    @include('web.components.footer')

    <div class="popup-pdf">
        <div class="bg-layer"></div>
        <a href="#" class="close-pdf"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
        <div class="main-pdf">
            <object type="application/pdf" class="test-pdf" data="" width="100%" height="500" style="height: 100vh">No Support</object>
        </div>
    </div>
@endsection

@push('script')

<script type="text/javascript" src="{{asset('web/revolution/js/jquery.themepunch.tools.min.js?rev=5.0')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0')}}"></script>

<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script type="text/javascript" src="{{asset('web/js/slick.min.js')}}"></script>

<script type="text/javascript">
    $(function () {

        // Popup Video
        $('.popupVideo').hide();
        $('.untukMemulai').click(function(e){
            e.preventDefault();
            $('.popupVideo').fadeIn();
        });
        $('.popupVideo .close, .popupVideo .bgVideo').click(function(e){
            e.preventDefault();
            $('.popupVideo').fadeOut();
            $('iframe').attr('src', $('iframe').attr('src'));
        });

        // Slider
        $('.ar-3').slick({
            centerMode: true,
            centerPadding: '20px',
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        centerMode: false,
                        centerPadding: '0',
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        centerMode: false,
                        centerPadding: '0',
                        slidesToShow: 1
                    }
                }
            ]
        });

        // View PDF
        $('.view-pdf').click(function(e){
            e.preventDefault();
            var $ss = $(this).attr('data-pdf');
            $('.popup-pdf').addClass('open').fadeIn();
            $('.popup-pdf .main-pdf .test-pdf').attr({
            data: $ss
            });
        });

        // Close PDF
        $('.close-pdf, .bg-layer').click(function(e){
            e.preventDefault();
            $('.popup-pdf').removeClass('open').fadeOut();
            $('.popup-pdf .main-pdf .test-pdf').attr({
            data: ''
            });
        });

        // Slides
        $('.ar-1').slick({
            centerPadding: '20px',
            slidesToShow: 1,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        // Slider
        $("#slider1").revolution({
            sliderType:"standard",
            sliderLayout:"auto",
            delay:6000,
            disableProgressBar:"on",
            spinner:"off",
            navigation: {
                keyboardNavigation:"off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation:"off",
                onHoverStop:"off",
                arrows: {
                    style:"arrow",
                    enable:true,
                    hide_onmobile:true,
                    hide_onleave:false,
                    tmp:'',
                    left: {
                        h_align:"left",
                        v_align:"bottom",
                        h_offset:110,
                        v_offset:40
                    },
                    right: {
                        h_align:"left",
                        v_align:"bottom",
                        h_offset:150,
                        v_offset:40
                    }
                }
            },
            gridwidth:1230,
            gridheight:800 ,
        });
    });

    $(window).scroll(function() {
        $('.scroll-paragraph').each(function() {
            var media = $(this);
            var tolerancePixelTop = 100;
            var tolerancePixelBottom = 100;
            var scrollTop = $(window).scrollTop() + tolerancePixelBottom;
            var scrollBottom = $(window).scrollTop() + $(window).height() - tolerancePixelTop;

            var yTopMedia = media.offset().top;
            var yBottomMedia = media.height() + yTopMedia;
            if (scrollTop <= yBottomMedia && scrollBottom >= yTopMedia) {
                media.addClass('change');
            } else {
                // post.removeClass('change') + ps1;
            }
        });
    });


    var stockInfoDataRaw = [
        @foreach($stock_prices as $item)
        { "value":{{$item->value}},"y":{{$item->year}},"m":{{$item->month}},"d":{{$item->day}} },
        @endforeach
    ];

    var stockInfoData = [];

    for (var i = 0; i < stockInfoDataRaw.length; i++) {
        stockInfoData.push([Date.UTC(stockInfoDataRaw[i].y,stockInfoDataRaw[i].m,stockInfoDataRaw[i].d),stockInfoDataRaw[i].value]);
    }

    Highcharts.setOptions({
        lang:{
            rangeSelectorZoom: ''
        }
    });

    Highcharts.stockChart('chart-relation', {
        chart: {
            backgroundColor: null
        },
        rangeSelector: {
            buttonTheme: {
                fill: 'none',
                stroke: 'none',
                states: {
                    style: {
                            color: '#78b833'
                        },
                    hover: {
                        fill: 'none',
                        stroke: 'none',
                        style: {
                            color: '#fff'
                        }
                    },
                    select: {
                        fill: 'none',
                        stroke: '#78b833',
                        style: {
                            color: '#fff'
                        }
                    }
                }
            },
            buttons: [{
                type: 'day',
                count: 5,
                text: '5D',
            }, {
                type: 'month',
                count: 1,
                text: '1M',
            }, {
                type: 'month',
                count: 3,
                text: '3M',
            }, {
                type: 'ytd',
                text: 'YTD',
            }, {
                type: 'month',
                count: 6,
                text: '6M',
            }, {
                type: 'day',
                count: stockInfoData.length,
                text: '1Y',
            }],
            buttonPosition: {
                y: 0
            },
            inputEnabled: false, // it supports only days
            selected: 0 // all
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: false,
                    color: 'white',
                    style: {
                        textOutline: false,
                        fontSize: 14,
                        fontFamily: 'robotoblack,sans-serif'

                    },
                    y: -10,
                    shape: 'callout'
                }
            },
            series: {

                lineWidth: 3,
                lineColor: '#78b833',
                marker: {
                    fillColor: 'transparent',
                    lineWidth: 0,
                    lineColor: 'transparent' // inherit from series
                }
            }
        },
        navigator: {
            enabled: false,
            margin: 70
        },
        xAxis: {
            className: 'datacharts-color',
            type: 'datetime',
            ordinal: false,
            labels: {
                y: 35,
                formatter: function () {
                    return Highcharts.dateFormat('%e %b', this.value);
                },
                dateTimeLabelFormats: {
                    minute: '%H:%M',
                    hour: '%H:%M',
                    day: '%e. %b',
                    week: '%e. %b',
                    month: '%b \'%y',
                    year: '%Y'
                }
            },
            tickWidth: 0,
            offset: -4
        },
        yAxis: {
            className: 'rangecharts-color',
            labels: {
                align: 'left',
                x: 10,
                y: 0
            },
            offset: 0
        },
        tooltip: {
            formatter: function () {
                return Highcharts.dateFormat('%e %B, %Y', this.x) + '<br/>' +
                    Highcharts.numberFormat(this.y, 2);
            }
        },
        navigation: {
            buttonOptions: {
                enabled: false
            }
        },
        series: [{
            name: 'STOCK INFORMATION',
            data: (stockInfoData),
            marker: {
                enabled: true,
                radius: 3
            },
            shadow: false,
        }]
    });


</script>
@endpush
