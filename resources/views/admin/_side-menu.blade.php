<div id="navigation">

    <ul class="nav" id="side-menu">
        <li class="{{ Request::url() == route('admin.serial.index') ? 'active' : '' }}" >
            <a href="{{route('admin.serial.index')}}">
                <span class="nav-label">{{ trans('admin.dashboard.serials') }}</span>
            </a>
        </li>
    </ul>
</div>
