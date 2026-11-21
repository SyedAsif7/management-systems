{{--Manage Settings--}}
<li class="nav-item">
    <a href="{{ route('settings') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['settings',]) ? 'active' : '' }}"><i class="icon-gear"></i> <span>Settings</span></a>
</li>

{{--Public Certificate Verification--}}
<li class="nav-item">
    <a href="{{ route('storefront.verify_cert') }}" target="_blank" class="nav-link"><i class="icon-certificate"></i> <span>Verify Certificate</span></a>
</li>