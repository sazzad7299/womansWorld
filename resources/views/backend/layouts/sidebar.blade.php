<div class="sidebar-body">
    <ul class="nav">
        <li class="nav-item nav-category">{{ __('Main') }}</li>
        <li class="nav-item @if (request()->is('admin/dashboard')) {{ 'active' }} @endif">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">{{ __('Dashboard') }}</span>
            </a>
        </li>
        <li class="nav-item nav-category">{{ __('User Part') }}</li>
        <li class="nav-item @if (request()->is('admin/admins') || request()->is('admin/admins/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-toggle="collapse" href="#adminnav" role="button" aria-expanded="false"
                aria-controls="adminnav">
                <i class="link-icon" data-feather="user-check"></i>
                <span class="link-title">{{ __('Admin') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/admins') || request()->is('admin/admins/*')) {{ 'show' }} @endif" id="adminnav" >
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.admins.create') }}"
                            class="nav-link @if (request()->is('admin/admins/create')) {{ 'active' }} @endif">{{ __('New Admin') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.admins.index') }}"
                            class="nav-link @if (request()->is('admin/admins')) {{ 'active' }} @endif">{{ __('All Admin') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-toggle="collapse" href="#userControl" role="button" aria-expanded="false"
                aria-controls="userControl">
                <i class="link-icon" data-feather="user-plus"></i>
                <span class="link-title">{{ __('User') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'show' }} @endif" id="userControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.users.create') }}"
                            class="nav-link @if (request()->is('admin/users/create')) {{ 'active' }} @endif">{{ __('New User') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link @if (request()->is('admin/users')) {{ 'active' }} @endif">{{ __('All User') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">{{ __('Product Part') }}</li>
        <li class="nav-item @if (request()->is('admin/products') || request()->is('admin/products/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-toggle="collapse" href="#productControl" role="button" aria-expanded="false"
                aria-controls="productControl">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="link-title">{{ __('Products') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/products') || request()->is('admin/products/*')) {{ 'show' }} @endif" id="productControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.products.create') }}"
                            class="nav-link @if (request()->is('admin/products/create')) {{ 'active' }} @endif">{{ __('New Product') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}"
                            class="nav-link @if (request()->is('admin/products')) {{ 'active' }} @endif">{{ __('All Products') }}</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item @if (request()->is('admin/brands')) {{ 'active' }} @endif">
            <a href="{{ route('admin.brands.index') }}" class="nav-link">
                <i class="link-icon" data-feather="codepen"></i>
                <span class="link-title">{{ __('Brand') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/categories')) {{ 'active' }} @endif">
            <a href="{{ route('admin.categories.index') }}" class="nav-link">
                <i class="link-icon" data-feather="disc"></i>
                <span class="link-title">{{ __('Categories') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/product-stock')) {{ 'active' }} @endif">
            <a href="{{ route('admin.product.stock') }}" class="nav-link">
                <i class="link-icon" data-feather="layers"></i>
                <span class="link-title">{{ __('Stock') }}</span>
            </a>
        </li>
        {{-- <li class="nav-item @if (request()->is('admin/sizes')) {{ 'active' }} @endif">
            <a href="{{ route('admin.sizes.index') }}" class="nav-link">
                <i class="link-icon" data-feather="disc"></i>
                <span class="link-title">{{ __('Size') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/colors')) {{ 'active' }} @endif">
            <a href="{{ route('admin.colors.index') }}" class="nav-link">
                <i class="link-icon" data-feather="aperture"></i>
                <span class="link-title">{{ __('Color') }}</span>
            </a>
        </li> --}}
        <li class="nav-item nav-category">{{ __('Service Part') }}</li>
        <li class="nav-item @if (request()->is('admin/orders')) {{ 'active' }} @endif">
            <a href="{{ route('admin.orders.index') }}" class="nav-link">
                <i class="link-icon" data-feather="codepen"></i>
                @if( neworder() >0 )
                <span class="notification">{{ neworder() }}</span>
                @endif
                <span class="link-title">{{ __('Orders') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/product-request')) {{ 'active' }} @endif">
            <a href="{{ route('admin.requestproduct.index') }}" class="nav-link">
                <i class="link-icon" data-feather="codepen"></i>
                @if( newrequest() > 0 )
                <span class="notification">{{ newrequest() }}</span>
                @endif

                <span class="link-title">{{ __('Requested') }} </span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/sale-report')) {{ 'active' }} @endif">
            <a href="{{ route('admin.report.salesearch') }}" class="nav-link">
                <i class="link-icon" data-feather="file"></i>

                <span class="link-title">{{ __('Sale Report') }} </span>
            </a>
        </li>

        <li class="nav-item nav-category">{{ __('Marketing Part') }}</li>
        <li class="nav-item @if (request()->is('admin/coupons')) {{ 'active' }} @endif">
            <a href="{{ route('admin.coupons.index') }}" class="nav-link">
                <i class="link-icon" data-feather="aperture"></i>
                <span class="link-title">{{ __('Coupons') }}</span>
            </a>
        </li>
        <li class="nav-item nav-category">{{ __('General Part') }}</li>

        <li class="nav-item @if (request()->is('admin/generals')) {{ 'active' }} @endif">
            <a href="{{ route('admin.generals.index') }}" class="nav-link">
                <i class="link-icon" data-feather="info"></i>
                <span class="link-title">{{ __('General') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/faqs')) {{ 'active' }} @endif">
            <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                <i class="link-icon" data-feather="help-circle"></i>
                <span class="link-title">{{ __('FAQ') }}</span>
            </a>
        </li>
        <li class="nav-item @if (request()->is('admin/sliders')) {{ 'active' }} @endif">
            <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                <i class="link-icon" data-feather="image"></i>
                <span class="link-title">{{ __('Slider') }}</span>
            </a>
        </li>

        <li class="nav-item @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'active' }} @endif">
            <a class="nav-link" data-toggle="collapse" href="#pageControl" role="button" aria-expanded="false"
                aria-controls="pageControl">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="link-title">{{ __('Pages') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'show' }} @endif" id="pageControl">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.pages.create') }}"
                            class="nav-link {{ Request::is('admin/pages/create') ? 'active' : '' }}">{{ __('New Page') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pages.index') }}"
                            class="nav-link {{ Request::is('admin/pages') ? 'active' : '' }}">{{ __('All Page') }}</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
