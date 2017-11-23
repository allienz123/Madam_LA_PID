@extends('operator.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop

{{-- Content --}}
@section('main')

    <div class="page-header">
        <h3>
            {{$title}}
        </h3>
    </div>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-list fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$customers}}</div>
                            <div>{{ trans("admin/admin.customer_total") }}</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('operator/customers')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans("admin/admin.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-list fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$cids}}</div>
                            <div>{{ trans("admin/admin.cid_total") }}</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('operator/cid')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans("admin/admin.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
       
    </div>

  <div id="containerGraph" class="panel panel-footer"></div>

@stop

{{-- Scripts --}}
@section('scripts')
    @parent
   <script type="text/javascript">
$(function () {
    $(document).ready(function () {
    // Highcharts.setOptions({
    //     global: {
    //     useUTC: false
    //     }
    // });

      $('#containerGraph').highcharts({
        chart: {
          type: 'pie',
          //animation: Highcharts.svg, // don't animate in old IE
          marginLeft: 50,
          // events: {
          //   load: function () {
          //     // set up the updating of the chart each second
          //     var series = this.series[0];
          //     setInterval(function () {
          //       var x = (new Date()).getTime(), // current time
          //           y = Math.random();
          //       series.addPoint([x, y], true, true);
          //     }, 1000);
          //   }
          // }
        },
        title: {
          text: 'DC Customer Segmentation',
          style : {
            fontWeight: 'bold'
          }

        },
        // tooltip: {
        //   // formatter: function () {
        //   //   return '<b>' + this.series.name + '</b><br/>' +
        //   //     Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
        //   //     Highcharts.numberFormat(this.y);
        //   }
        // },
        legend: {
            enabled: true
        },
        exporting: {
            enabled: true
        },
        credits: {
            enabled: false
        },
        series: [{
          name: 'Total Customer',
          allowPointSelect: true,
          cursor: 'pointer',
          colorByPoint: 'true',
          data:  {!! json_encode($countSegment) !!},
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            color: '(Highcharts.theme && Highcharts.theme.contrastTextColor)' || 'black'
          },
          events:{
            click: function(){
               // var x = getVa
                //alert('Customer :' + this.y +', value:'+ this.name);
                 //window.location.href = '{{ URL::to('admin/customers') }}';
                //var chart = $('#containerGraph').highcharts(),
               // series = chart.getSelectedPoints();
               //var x = {!! json_encode($countSegment) !!};
               //location.href = this.options.url;

            }
          },
          showInLegend: true
        }],
        legend: {
            title: {
                text: 'Segmentation :',

            },
            layout: 'vertical',
            verticalAlign: 'middle',
            align: 'right'
        },
        });
        });
    });
</script>
@stop
