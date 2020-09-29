@extends('layouts.web')

@php
    $website = json_decode($website->value)
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
        {"value":118,"y":2019,"m":6,"d":8},
        {"value":119,"y":2019,"m":6,"d":9},
        {"value":119,"y":2019,"m":6,"d":10},
        {"value":118,"y":2019,"m":6,"d":11},
        {"value":118,"y":2019,"m":6,"d":12},
        {"value":117,"y":2019,"m":6,"d":15},
        {"value":117,"y":2019,"m":6,"d":16},
        {"value":115,"y":2019,"m":6,"d":17},
        {"value":117,"y":2019,"m":6,"d":18},
        {"value":116,"y":2019,"m":6,"d":19},
        {"value":116,"y":2019,"m":6,"d":22},
        {"value":116,"y":2019,"m":6,"d":23},
        {"value":115,"y":2019,"m":6,"d":24},
        {"value":114,"y":2019,"m":6,"d":25},
        {"value":111,"y":2019,"m":6,"d":26},
        {"value":109,"y":2019,"m":6,"d":29},
        {"value":109,"y":2019,"m":6,"d":30},
        {"value":108,"y":2019,"m":6,"d":31},
        {"value":114,"y":2019,"m":7,"d":1},
        {"value":111,"y":2019,"m":7,"d":2},
        {"value":106,"y":2019,"m":7,"d":5},
        {"value":103,"y":2019,"m":7,"d":6},
        {"value":104,"y":2019,"m":7,"d":7},
        {"value":103,"y":2019,"m":7,"d":8},
        {"value":103,"y":2019,"m":7,"d":9},
        {"value":103,"y":2019,"m":7,"d":12},
        {"value":100,"y":2019,"m":7,"d":13},
        {"value":100,"y":2019,"m":7,"d":14},
        {"value":99,"y":2019,"m":7,"d":15},
        {"value":95,"y":2019,"m":7,"d":16},
        {"value":94,"y":2019,"m":7,"d":19},
        {"value":95,"y":2019,"m":7,"d":20},
        {"value":94,"y":2019,"m":7,"d":21},
        {"value":92,"y":2019,"m":7,"d":22},
        {"value":92,"y":2019,"m":7,"d":23},
        {"value":89,"y":2019,"m":7,"d":26},
        {"value":91,"y":2019,"m":7,"d":27},
        {"value":90,"y":2019,"m":7,"d":28},
        {"value":95,"y":2019,"m":7,"d":29},
        {"value":94,"y":2019,"m":7,"d":30},
        {"value":92,"y":2019,"m":8,"d":2},
        {"value":91,"y":2019,"m":8,"d":3},
        {"value":91,"y":2019,"m":8,"d":4},
        {"value":91,"y":2019,"m":8,"d":5},
        {"value":93,"y":2019,"m":8,"d":6},
        {"value":95,"y":2019,"m":8,"d":9},
        {"value":94,"y":2019,"m":8,"d":10},
        {"value":102,"y":2019,"m":8,"d":11},
        {"value":97,"y":2019,"m":8,"d":12},
        {"value":96,"y":2019,"m":8,"d":13},
        {"value":98,"y":2019,"m":8,"d":16},
        {"value":98,"y":2019,"m":8,"d":17},
        {"value":96,"y":2019,"m":8,"d":18},
        {"value":94,"y":2019,"m":8,"d":19},
        {"value":94,"y":2019,"m":8,"d":20},
        {"value":93,"y":2019,"m":8,"d":23},
        {"value":91,"y":2019,"m":8,"d":24},
        {"value":91,"y":2019,"m":8,"d":25},
        {"value":92,"y":2019,"m":8,"d":26},
        {"value":91,"y":2019,"m":8,"d":27},
        {"value":90,"y":2019,"m":8,"d":30},
        {"value":90,"y":2019,"m":9,"d":1},
        {"value":87,"y":2019,"m":9,"d":2},
        {"value":86,"y":2019,"m":9,"d":3},
        {"value":85,"y":2019,"m":9,"d":4},
        {"value":79,"y":2019,"m":9,"d":7},
        {"value":81,"y":2019,"m":9,"d":8},
        {"value":83,"y":2019,"m":9,"d":9},
        {"value":81,"y":2019,"m":9,"d":10},
        {"value":84,"y":2019,"m":9,"d":11},
        {"value":82,"y":2019,"m":9,"d":14},
        {"value":83,"y":2019,"m":9,"d":15},
        {"value":84,"y":2019,"m":9,"d":16},
        {"value":84,"y":2019,"m":9,"d":17},
        {"value":85,"y":2019,"m":9,"d":18},
        {"value":84,"y":2019,"m":9,"d":21},
        {"value":83,"y":2019,"m":9,"d":22},
        {"value":83,"y":2019,"m":9,"d":23},
        {"value":85,"y":2019,"m":9,"d":24},
        {"value":86,"y":2019,"m":9,"d":25},
        {"value":99,"y":2019,"m":9,"d":28},
        {"value":94,"y":2019,"m":9,"d":29},
        {"value":88,"y":2019,"m":9,"d":30},
        {"value":85,"y":2019,"m":9,"d":31},
        {"value":83,"y":2019,"m":10,"d":1},
        {"value":82,"y":2019,"m":10,"d":4},
        {"value":84,"y":2019,"m":10,"d":5},
        {"value":84,"y":2019,"m":10,"d":6},
        {"value":79,"y":2019,"m":10,"d":7},
        {"value":81,"y":2019,"m":10,"d":8},
        {"value":80,"y":2019,"m":10,"d":11},
        {"value":80,"y":2019,"m":10,"d":12},
        {"value":78,"y":2019,"m":10,"d":13},
        {"value":77,"y":2019,"m":10,"d":14},
        {"value":77,"y":2019,"m":10,"d":15},
        {"value":78,"y":2019,"m":10,"d":18},
        {"value":77,"y":2019,"m":10,"d":19},
        {"value":76,"y":2019,"m":10,"d":20},
        {"value":75,"y":2019,"m":10,"d":21},
        {"value":74,"y":2019,"m":10,"d":22},
        {"value":73,"y":2019,"m":10,"d":25},
        {"value":70,"y":2019,"m":10,"d":26},
        {"value":66,"y":2019,"m":10,"d":27},
        {"value":63,"y":2019,"m":10,"d":28},
        {"value":65,"y":2019,"m":10,"d":29},
        {"value":72,"y":2019,"m":11,"d":2},
        {"value":67,"y":2019,"m":11,"d":3},
        {"value":67,"y":2019,"m":11,"d":4},
        {"value":68,"y":2019,"m":11,"d":5},
        {"value":67,"y":2019,"m":11,"d":6},
        {"value":66,"y":2019,"m":11,"d":9},
        {"value":68,"y":2019,"m":11,"d":10},
        {"value":72,"y":2019,"m":11,"d":11},
        {"value":67,"y":2019,"m":11,"d":12},
        {"value":67,"y":2019,"m":11,"d":13},
        {"value":69,"y":2019,"m":11,"d":16},
        {"value":69,"y":2019,"m":11,"d":17},
        {"value":68,"y":2019,"m":11,"d":18},
        {"value":67,"y":2019,"m":11,"d":19},
        {"value":65,"y":2019,"m":11,"d":20},
        {"value":66,"y":2019,"m":11,"d":23},
        {"value":68,"y":2019,"m":11,"d":26},
        {"value":66,"y":2019,"m":11,"d":27},
        {"value":66,"y":2019,"m":11,"d":30},
        {"value":66,"y":2020,"m":0,"d":2},
        {"value":73,"y":2020,"m":0,"d":3},
        {"value":69,"y":2020,"m":0,"d":6},
        {"value":69,"y":2020,"m":0,"d":7},
        {"value":68,"y":2020,"m":0,"d":8},
        {"value":68,"y":2020,"m":0,"d":9},
        {"value":71,"y":2020,"m":0,"d":10},
        {"value":72,"y":2020,"m":0,"d":13},
        {"value":71,"y":2020,"m":0,"d":14},
        {"value":67,"y":2020,"m":0,"d":15},
        {"value":68,"y":2020,"m":0,"d":16},
        {"value":66,"y":2020,"m":0,"d":17},
        {"value":65,"y":2020,"m":0,"d":20},
        {"value":65,"y":2020,"m":0,"d":21},
        {"value":63,"y":2020,"m":0,"d":22},
        {"value":61,"y":2020,"m":0,"d":23},
        {"value":56,"y":2020,"m":0,"d":24},
        {"value":51,"y":2020,"m":0,"d":27},
        {"value":56,"y":2020,"m":0,"d":28},
        {"value":57,"y":2020,"m":0,"d":29},
        {"value":54,"y":2020,"m":0,"d":30},
        {"value":53,"y":2020,"m":0,"d":31},
        {"value":53,"y":2020,"m":1,"d":3},
        {"value":53,"y":2020,"m":1,"d":4},
        {"value":51,"y":2020,"m":1,"d":5},
        {"value":53,"y":2020,"m":1,"d":6},
        {"value":53,"y":2020,"m":1,"d":7},
        {"value":52,"y":2020,"m":1,"d":10},
        {"value":52,"y":2020,"m":1,"d":11},
        {"value":52,"y":2020,"m":1,"d":12},
        {"value":52,"y":2020,"m":1,"d":13},
        {"value":51,"y":2020,"m":1,"d":14},
        {"value":51,"y":2020,"m":1,"d":17},
        {"value":52,"y":2020,"m":1,"d":18},
        {"value":51,"y":2020,"m":1,"d":19},
        {"value":50,"y":2020,"m":1,"d":20},
        {"value":50,"y":2020,"m":1,"d":21},
        {"value":50,"y":2020,"m":1,"d":24},
        {"value":50,"y":2020,"m":1,"d":25},
        {"value":50,"y":2020,"m":1,"d":26},
        {"value":50,"y":2020,"m":1,"d":27},
        {"value":50,"y":2020,"m":1,"d":28},
        {"value":50,"y":2020,"m":2,"d":2},
        {"value":50,"y":2020,"m":2,"d":3},
        {"value":50,"y":2020,"m":2,"d":4},
        {"value":50,"y":2020,"m":2,"d":5},
        {"value":50,"y":2020,"m":2,"d":6},
        {"value":50,"y":2020,"m":2,"d":9},
        {"value":50,"y":2020,"m":2,"d":10},
        {"value":50,"y":2020,"m":2,"d":11},
        {"value":50,"y":2020,"m":2,"d":12},
        {"value":50,"y":2020,"m":2,"d":13},
        {"value":50,"y":2020,"m":2,"d":16},
        {"value":50,"y":2020,"m":2,"d":17},
        {"value":50,"y":2020,"m":2,"d":18},
        {"value":50,"y":2020,"m":2,"d":19},
        {"value":50,"y":2020,"m":2,"d":20},
        {"value":50,"y":2020,"m":2,"d":23},
        {"value":50,"y":2020,"m":2,"d":24},
        {"value":50,"y":2020,"m":2,"d":26},
        {"value":50,"y":2020,"m":2,"d":27},
        {"value":50,"y":2020,"m":2,"d":30},
        {"value":50,"y":2020,"m":2,"d":31},
        {"value":50,"y":2020,"m":3,"d":1},
        {"value":50,"y":2020,"m":3,"d":2},
        {"value":50,"y":2020,"m":3,"d":3},
        {"value":50,"y":2020,"m":3,"d":6},
        {"value":50,"y":2020,"m":3,"d":7},
        {"value":50,"y":2020,"m":3,"d":8},
        {"value":50,"y":2020,"m":3,"d":9},
        {"value":50,"y":2020,"m":3,"d":13},
        {"value":50,"y":2020,"m":3,"d":14},
        {"value":50,"y":2020,"m":3,"d":15},
        {"value":50,"y":2020,"m":3,"d":16},
        {"value":50,"y":2020,"m":3,"d":17},
        {"value":50,"y":2020,"m":3,"d":20},
        {"value":50,"y":2020,"m":3,"d":21},
        {"value":50,"y":2020,"m":3,"d":22},
        {"value":50,"y":2020,"m":3,"d":23},
        {"value":50,"y":2020,"m":3,"d":24},
        {"value":50,"y":2020,"m":3,"d":27},
        {"value":50,"y":2020,"m":3,"d":28},
        {"value":50,"y":2020,"m":3,"d":29},
        {"value":50,"y":2020,"m":3,"d":30},
        {"value":50,"y":2020,"m":4,"d":4},
        {"value":50,"y":2020,"m":4,"d":5},
        {"value":50,"y":2020,"m":4,"d":6},
        {"value":50,"y":2020,"m":4,"d":8},
        {"value":50,"y":2020,"m":4,"d":11},
        {"value":50,"y":2020,"m":4,"d":12},
        {"value":50,"y":2020,"m":4,"d":13},
        {"value":50,"y":2020,"m":4,"d":14},
        {"value":50,"y":2020,"m":4,"d":15},
        {"value":50,"y":2020,"m":4,"d":18},
        {"value":50,"y":2020,"m":4,"d":19},
        {"value":50,"y":2020,"m":4,"d":20},
        {"value":50,"y":2020,"m":4,"d":26},
        {"value":50,"y":2020,"m":4,"d":27},
        {"value":50,"y":2020,"m":4,"d":28},
        {"value":50,"y":2020,"m":4,"d":29},
        {"value":50,"y":2020,"m":5,"d":2},
        {"value":50,"y":2020,"m":5,"d":3},
        {"value":50,"y":2020,"m":5,"d":4},
        {"value":50,"y":2020,"m":5,"d":5},
        {"value":50,"y":2020,"m":5,"d":8},
        {"value":50,"y":2020,"m":5,"d":9},
        {"value":50,"y":2020,"m":5,"d":10},
        {"value":50,"y":2020,"m":5,"d":11},
        {"value":50,"y":2020,"m":5,"d":12},
        {"value":50,"y":2020,"m":5,"d":15},
        {"value":50,"y":2020,"m":5,"d":16},
        {"value":50,"y":2020,"m":5,"d":17},
        {"value":50,"y":2020,"m":5,"d":18},
        {"value":50,"y":2020,"m":5,"d":19},
        {"value":50,"y":2020,"m":5,"d":22},
        {"value":50,"y":2020,"m":5,"d":23},
        {"value":50,"y":2020,"m":5,"d":24},
        {"value":50,"y":2020,"m":5,"d":25},
        {"value":50,"y":2020,"m":5,"d":26},
        {"value":50,"y":2020,"m":5,"d":29},
        {"value":50,"y":2020,"m":5,"d":30},
        {"value":50,"y":2020,"m":6,"d":1},
        {"value":50,"y":2020,"m":6,"d":2},
        {"value":50,"y":2020,"m":6,"d":3}];

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
