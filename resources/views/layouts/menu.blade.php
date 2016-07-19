<li style="display:none;" class="{{ Request::is('home*') ? 'active' : '' }}">
   <a href="{!! url('/home') !!}">Home</a>
</li>

<li class="{{ Request::is('corporations*') ? 'active' : '' }}">
    <a href="{!! route('corporations.index') !!}">Corporations</a>
</li>

<li class="{{ Request::is('casinos*') ? 'active' : '' }}">
    <a href="{!! route('casinos.index') !!}">Casinos</a>
</li>

<li class="{{ Request::is('restaurants*') ? 'active' : '' }}">
    <a href="{!! route('restaurants.index') !!}">Restaurants</a>
</li>

<li class="{{ Request::is('machines*') ? 'active' : '' }}">
    <a href="{!! route('machines.index') !!}">Machines</a>
</li>

<li>
   <a href="{!! url('/logout') !!}">Logout</a>
</li>
