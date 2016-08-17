<li style="display:none;" class="{{ Request::is('home*') ? 'active' : '' }}">
   <a href="{!! url('/home') !!}">Home</a>
</li>

<li class="{{ Request::is('corporations*') ? 'active' : '' }}">
    <a href="{!! route('corporations.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>Corporations</a>
</li>

<li class="{{ Request::is('casinos*') ? 'active' : '' }}">
    <a href="{!! route('casinos.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>Casinos</a>
</li>

<li class="{{ Request::is('restaurants*') ? 'active' : '' }}">
    <a href="{!! route('restaurants.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>Restaurants</a>
</li>

<li class="{{ Request::is('fryers*') ? 'active' : '' }}">
    <a href="{!! route('fryers.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>Fryers</a>
</li>

<li class="{{ Request::is('yellowGreasePickups*') ? 'active' : '' }}">
    <a href="{!! route('yellowGreasePickups.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>Yellow Grease Pickups</a>
</li>

<li class="{{ Request::is('fryerTMPSs*') ? 'active' : '' }}">
    <a href="{!! route('fryerTMPSs.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>TPMS</a>
</li>

<li class="{{ Request::is('machines*') ? 'active' : '' }}">
    <a href="{!! route('machines.index') !!}">Machines</a>
</li>

<li class="{{ Request::is('machinereadings*') ? 'active' : '' }}">
    <a href="{!! route('machinereadings.index') !!}">Machine Readings</a>
</li>

<li class="{{ Request::is('logoptions*') ? 'active' : '' }}">
    <a href="{!! route('logoptions.index') !!}">Log Options</a>
</li>

<li class="{{ Request::is('logrequests*') ? 'active' : '' }}">
    <a href="{!! route('logrequests.index') !!}">Log Requests</a>
</li>

<li class="{{ Request::is('trashBins*') ? 'active' : '' }}">
    <a href="{!! route('trashBins.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>Trash Bins</a>
</li>

<li class="{{ Request::is('historyUsages*') ? 'active' : '' }}">
    <a href="{!! route('historyUsages.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>History Usage</a>
</li>

<li class="{{ Request::is('clientLogins*') ? 'active' : '' }}">
    <a href="{!! route('clientLogins.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>Client Login</a>
</li>
<li>
   <a href="{!! url('/logout') !!}">Logout</a>
</li>



