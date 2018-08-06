@if(Sentinel::inRole('root') || Sentinel::hasAnyAccess(['user.show', 'role.show']))

    <li class="{{(request()->is('auth/users*') || request()->is('auth/roles*')) == true  ? 'active' : '' }}">
        <a class="accordion-toggle {{(request()->is('auth/users*') || request()->is('auth/roles*')) == true  ? 'menu-open' : '' }}" href="#">
            <span class="fa fa-key"></span>
            <span class="sidebar-title">@lang('auth.index_acl')</span>
            <span class="caret"></span>
        </a>

        <ul class="nav sub-nav">
            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['user.show']))
                <li class="{{request()->is('auth/users*') == true  ? 'active' : '' }}">
                    <a href="{{route('user.index')}}"><i class="fa fa-dot-circle-o"></i> @lang('auth.index_users')</a>
                </li>
            @endif

            @if(Sentinel::inRole('root') || Sentinel::hasAccess(['role.show']))
                <li class="{{request()->is('auth/roles*') == true  ? 'active' : '' }}">
                    <a href="{{route('role.index')}}"><i class="fa fa-dot-circle-o"></i> @lang('auth.index_roles')</a>
                </li>
            @endif
        </ul>
    </li>
@endif