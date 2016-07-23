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
    <a href="{!! route('fryerTMPSs.index') !!}"><i class="fa fa-angle-right pull-right i-sidebar-chevron" aria-hidden="true"></i>TMPS</a>
</li>

<li class="{{ Request::is('machines*') ? 'active' : '' }}">
    <a href="{!! route('machines.index') !!}">Machines</a>
</li>

<li class="{{ Request::is('machinereadings*') ? 'active' : '' }}">
    <a href="{!! route('machinereadings.index') !!}">Machine Readings</a>
</li>

<li>
   <a href="{!! url('/logout') !!}">Logout</a>
</li>
