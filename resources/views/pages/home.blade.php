@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<div class="row">
    <div class="page-header">
        <h2>Home Page</h2>
    </div></div>
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
                @if(Auth::check())
                @if(Auth::user()->admin==1)
                <a href="{{URL::to('admin/customers')}}">
                @elseif(Auth::user()->admin==0)
                <a href="{{URL::to('operator/customers')}}">
                @endif
                @endif
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
                @if(Auth::check())
                @if(Auth::user()->admin==1)
                <a href="{{URL::to('admin/cid')}}">
                @elseif(Auth::user()->admin==0)
                <a href="{{URL::to('operator/cid')}}">
                @endif
                @endif
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans("admin/admin.view_detail") }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
    <script>
        $('#myCarousel').carousel({
            interval: 4000
        });
    </script>
@endsection
@stop
