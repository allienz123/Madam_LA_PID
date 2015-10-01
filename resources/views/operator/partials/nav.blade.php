{{-- TODO: --}}
{{--<div class="input-group">--}}
{{--<input type="text" class="form-control" placeholder="Search...">--}}
{{--<span class="input-group-btn">--}}
{{--<button class="btn btn-default" type="button">--}}
{{--<i class="fa fa-search"></i>--}}
{{--</button>--}}
{{--</span>--}}
{{--</div>--}}

<div class="metismenu">
<ul class="nav nav-pills nav-stacked">
    <li class="{{set_active('operator/dashboard')}}">
        <a href="{{url('operator/dashboard')}}">
            <i class="fa fa-dashboard fa-fw"></i>
            <span class="hidden-sm text"> Dashboard</span>
        </a>
    </li>
{{-- Show metisMenu Customer--}}
    <li class="{{set_active(['operator/customers*','operator/cid*', 'operator/excustomer*'])}}">
        <a href="#">
            <i class="glyphicon glyphicon-camera"></i> Customer
            <span class="fa arrow"></span>
        </a>
        <ul class="nav collapse">
            <li class="{{set_active('operator/customers*')}}">
                <a href="{{url('operator/customers')}}">
                    <i class="glyphicon glyphicon-list"></i>
                    <span class="hidden-sm text"> Customer List</span>
                </a>
            </li>
            <li class="{{set_active('operator/cid*')}}">
                <a href="{{url('operator/cid')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text"> CID</span>
                </a>
            </li>
             <li class="{{set_active('operator/excustomer*')}}">
                <a href="{{url('operator/excustomer')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text"> Ex-Customer</span>
                </a>
            </li>
        </ul>
    </li>

</ul>
</div>