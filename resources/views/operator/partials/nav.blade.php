{{-- TODO: --}}
{{--<div class="input-group">--}}
{{--<input type="text" class="form-control" placeholder="Search...">--}}
{{--<span class="input-group-btn">--}}
{{--<button class="btn btn-default" type="button">--}}
{{--<i class="fa fa-search"></i>--}}
{{--</button>--}}
{{--</span>--}}
{{--</div>--}}

{{-- Show metisMenu Dashboard--}}
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
    {{-- Show metisMenu Alarm Log--}}
    <li class="{{set_active('operator/alarm')}}">
        <a href="{{url('operator/alarm')}}">
        <i class="fa fa-bell"></i>
        <span class="hidden-sm text"> Alarm Logs</span>
        </a>
    </li>

    {{-- Show metisMenu Inventory --}}
    <li class="{{set_active(['operator/inventory*','operator/logging*'])}}">
        <a href="#">
        <i class="fa fa-barcode"></i>
        <span class="hidden-sm text"> Inventory DC</span>
        </a>
        <ul class="nav collapse">
            <li class="{{set_active('operator/inventory*')}}">
                <a href="{{ url('operator/inventory')}}">
                    <i class="glyphicon glyphicon-list"></i>
                    <span class="hidden-sm text"> Device List</span>
                </a>
            </li>
            <li class="{{set_active('operator/logging*')}}">
                <a href="{{ url('operator/logging')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text"> Logging</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- Show metisMenu Activity --}}
    <li class="{{set_active(['operator/activity*'])}}">
        <a href="{{ url('operator/activity')}}">
        <i class="fa fa-list-alt"></i>
        <span class="hidden-sm text"> Activity DC</span>
        </a>
    </li>
    {{-- Show metisMenu Open DCIM--}}
    <li>
        <!-- <a href="http://183.91.78.181/~dcim/opendcim/" target="_blank"> -->
        <!-- for security reason, opendcim address has changed to http://183.91.78.180:9090/~dcim/opendcim/ --> 
        <a href="http://183.91.78.180:9090/~dcim/opendcim/" target="_blank">
        <i class="fa fa-hand-o-right"></i>
        <span class="hidden-sm text"> Open DCIM</span>
        </a>
    </li>

</ul>
</div>