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
    <li class="{{set_active('admin/dashboard')}}">
        <a href="{{url('admin/dashboard')}}">
            <i class="fa fa-dashboard fa-fw"></i>
            <span class="hidden-sm text"> Dashboard</span>
        </a>
    </li>
{{-- Show metisMenu Customer--}}
    <li class="{{set_active(['admin/customers','admin/cid*', 'admin/excustomer*'])}}">
        <a href="#">
            <i class="glyphicon glyphicon-camera"></i> Customer
            <span class="fa arrow"></span>
        </a>
        <ul class="nav collapse">
            <li class="{{set_active('admin/customers*')}}">
                <a href="{{url('admin/customers')}}">
                    <i class="glyphicon glyphicon-list"></i>
                    <span class="hidden-sm text"> Customer List</span>
                </a>
            </li>
            <li class="{{set_active('admin/cid*')}}">
                <a href="{{url('admin/cid')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text"> CID</span>
                </a>
            </li>
             <li class="{{set_active('admin/excustomer*')}}">
                <a href="{{url('admin/excustomer')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text"> Ex-Customer</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- Show metisMenu Administrasi DC--}}
    <li class="{{set_active(['admin/customerssegment','admin/location','admin/servicetype',])}}">
        <a href="#">
            <i class="glyphicon glyphicon-paperclip"></i> Administrasi DC
            <span class="fa arrow"></span>
        </a>
        <ul class="nav collapse">
            <li class="{{set_active('admin/customerssegment')}}">
                <a href="{{url('admin/customerssegment')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text"> Segmentation</span>
                </a>
            </li>
            <li class="{{set_active('admin/location')}}">
                <a href="{{url('admin/location')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text"> Datacenter Location</span>
                </a>
            </li>
            <li class="{{set_active('admin/servicetype')}}">
                <a href="{{url('admin/servicetype')}}">
                    <i class="glyphicon glyphicon-pushpin"></i>
                    <span class="hidden-sm text">  Service Type</span>
                </a>
            </li>
        </ul>
    </li>

    {{-- Show metisMenu Alarm Log--}}
    <li class="{{set_active('admin/alarm')}}">
        <a href="{{url('admin/alarm')}}">
        <i class="fa fa-bell"></i>
        <span class="hidden-sm text"> Alarm Logs</span>
        </a>
    </li>
    
    {{-- Show metisMenu Users--}}
    <li class="{{set_active('admin/users*')}}">
        <a href="{{url('admin/users')}}">
            <i class="glyphicon glyphicon-user"></i>
            <span class="hidden-sm text"> Users</span>
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