<div class="col-md-12">
    <div class="col-md-12 top-heading">
        <div class="row">
            <div class="col-md-10 padding-left-none">
                <h4>{{ $moduleTitle }}</h4>
            </div>
            <div class="col-md-2">
                <div class="row top-right-btn">
                    <div class="col-md-12">
                        <a href="{!! route('userAccesses.index') !!}" class="btn btn-default pull-left">Discard</a>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach($userinfos as $user)
        <table class="table table-responsive list-table" id="corporations-table" style="width: 70%;margin-left: auto;margin-right: auto;">
            {!! Form::hidden('user_id', $user['user_id']) !!}
            <div class="col-sm-10 col-xs-10" style="margin-left: 10%; margin-right: 10%;margin-top: 30px;">
                <thead>
                    <th colspan=2 class="text-center">User Information</label></th>
                </thead>
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td>{!! $user['user_name'] !!}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{!! $user['first_name'].' '. $user['last_name'] !!}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{!! $user['user_email'] !!}</td>
                    </tr>
                </tbody>
                <br><br><br><br>
            </div>
        </table>
    @endforeach   

</div>

<div class="clearfix"></div>
<hr>

<div class="clearfix"></div>

<label class="center-text">Select Location Access</label>
<div class="clearfix"></div>

<div class="user-access-row row">
    <div class="col-sm-3 col-xs-3">
        {{-- <label>Check All/Uncheck All</label> --}}
        <h5>Check All/Uncheck All</h5>
    </div>
    <div class="col-sm-3 col-xs-3">
        <h5>Check All/Uncheck All</h5>
    </div>
    <div class="col-sm-3 col-xs-3">
        <h5>Check All/Uncheck All</h5>
    </div>
</div>

<div class="user-access-row row">
    <div class="col-sm-3 col-xs-3 link-to-checkboxes-bg">
    <div class="row link-to-checkboxes custom-scrollbar">
        @foreach($corps_list as $corp)
            <div class="col-md-12 checkbox checkbox-warning">
            {!! Form::checkbox('corps_list', $corp->id, null, ['id' => '', 'class' => 'checkbox-inline']) !!}
            <label>{!! $corp->corporation_name !!}</label><br/>
            </div>
        @endforeach
    </div>
    </div>

    <div class="col-sm-3 col-xs-3 link-to-checkboxes-bg">
        <div class="row link-to-checkboxes custom-scrollbar">
            @foreach($casino_list as $casino)
                <div class="col-md-12 checkbox checkbox-warning">
                {!! Form::checkbox('casino_list', $casino->id, null, ['id' => '', 'class' => 'checkbox-inline']) !!}
                <label>{!! $casino->casino_trade_name !!}</label><br/>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-sm-3 col-xs-3 link-to-checkboxes-bg">
    <div class="row link-to-checkboxes custom-scrollbar">
         @foreach($restaurant_list as $restaurant)
        <div class="col-md-12 checkbox checkbox-warning">
            {!! Form::checkbox('restaurant_list', $restaurant->id, null, ['id' => 'is-active', 'class' => 'checkbox-inline']) !!}
            <label>{!! $restaurant->restaurant_name !!}</label><br/>
        </div>
        @endforeach
    </div>
    </div>
</div>

<div class="clearfix"></div>
<hr>

<div class="user-access-row row">
    <div class="col-sm-4 col-xs-4">
        {{-- <label>Check All/Uncheck All</label> --}}
        <h5>Select Module Access</h5>
    </div>
    <div class="col-sm-4 col-xs-4">
        <h5>Select Mobile Menu Access</h5>
    </div>
</div>

<div class="user-access-row row">
    <div class="col-sm-4 col-xs-4 link-to-checkboxes-bg">
    <div class="row link-to-checkboxes custom-scrollbar">
        @foreach($module_access as $module_id => $module_name)
            <div class="col-md-12 checkbox checkbox-warning">
            {!! Form::checkbox('corps_list', $module_id, null, ['id' => '', 'class' => 'checkbox-inline']) !!}
            <label>{!! $module_name !!}</label><br/>
            </div>
        @endforeach
    </div>
    </div>

    <div class="col-sm-4 col-xs-4 link-to-checkboxes-bg">
    <div class="row link-to-checkboxes custom-scrollbar">
        @foreach($mobile_menu_access as $mobile_menu_id => $mobile_menu_name)
            <div class="col-md-12 checkbox checkbox-warning">
            {!! Form::checkbox('corps_list', $mobile_menu_id, null, ['id' => '', 'class' => 'checkbox-inline']) !!}
            <label>{!! $mobile_menu_name !!}</label><br/>
            </div>
        @endforeach
    </div>
    </div>
</div>
