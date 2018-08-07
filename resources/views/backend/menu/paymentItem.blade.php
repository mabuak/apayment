@if(Sentinel::inRole('root') || Sentinel::hasAnyAccess(['payment_item.show']))
    <li class="{{(request()->is('auth/payment-items*')) == true  ? 'active' : '' }}">
        <a href="{{route('payment_item.index')}}">
            <span class="fa fa-money-bill-alt"></span>
            <span class="sidebar-title">@lang('paymentItem.title_plural')</span>
        </a>
    </li>
@endif