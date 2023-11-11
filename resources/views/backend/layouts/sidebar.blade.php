<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">WomansWorld</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">{{ __('Dashboard') }}</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.categories.index')}}">
                <div class="parent-icon"><i class="bi-grid-fill"></i>
                </div>
                <div class="menu-title">{{ __('Category') }}</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket-fill"></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li class="@if (request()->is('admin/products/create')) {{ 'mm-active' }} @endif"> <a href="{{ route('admin.products.create') }}"><i class="bi bi-circle"></i>Add Product</a>
                </li>
                <li  class="@if (request()->is('admin/products/index')) {{ 'mm-active' }} @endif"> <a href="{{ route('admin.products.index') }}"><i class="bi bi-circle"></i>Product List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Services</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.services.create')}}"><i class="bi bi-circle"></i>Add Service</a>
                </li>
                <li > <a href="{{route('admin.services.index')}}"><i class="bi bi-circle"></i>Service List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-file-earmark-break-fill"></i>
                </div>
                <div class="menu-title">Orders</div>
            </a>
            <ul>
                <li class=" @if (request()->is('admin/orders')) {{ 'mm-active' }} @endif"> <a href="{{ route('admin.orders.index') }}"><i class="bi bi-circle"></i>Order List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-star-fill"></i>
                </div>
                <div class="menu-title">Reviews</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.reviews.list')}}"><i class="bi bi-circle"></i>Review List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-award-fill"></i>
                </div>
                <div class="menu-title">Coupons</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.coupons.index')}}"><i class="bi bi-circle"></i>Add Coupon</a>
                </li>
                <li> <a href="{{route('admin.coupons.index')}}"><i class="bi bi-circle"></i>Coupon List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-collection-play-fill"></i>
                </div>
                <div class="menu-title">Sliders</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.sliders.index')}}"><i class="bi bi-circle"></i>Add Slider</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bi bi-circle"></i>Slider List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-collection-play-fill"></i>
                </div>
                <div class="menu-title">Trends</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.blog.create')}}"><i class="bi bi-circle"></i>Add Trends</a>
                </li>
                <li> <a href="{{route('admin.blog.index')}}"><i class="bi bi-circle"></i>Trends List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-lock-fill"></i>
                </div>
                <div class="menu-title">Admins</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.admins.create') }}"><i class="bi bi-circle"></i>Add Admin</a>
                </li>
                <li> <a href="{{ route('admin.admins.index') }}"><i class="bi bi-circle"></i>Admin List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-people-fill"></i>
                </div>
                <div class="menu-title">Customers</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.users.create') }}"><i class="bi bi-circle"></i>Add
                        Customer</a>
                </li>
                <li> <a href="{{ route('admin.users.index') }}"><i class="bi bi-circle"></i>Customer
                        List</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-bar-chart-line-fill"></i>
                </div>
                <div class="menu-title">Reports</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bi bi-circle"></i>Customers</a>
                </li>
                <li> <a href="#"><i class="bi bi-circle"></i>Orders</a>
                </li>
                <li> <a href="#"><i class="bi bi-circle"></i>Stcoks</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-music-note-list"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class="bi bi-circle"></i>Payment Methods</a>
                    <ul>
                        <li> <a href="charts-chartjs.html"><i class="bi bi-circle"></i>Add Method</a>
                        </li>
                        <li> <a href="charts-chartjs.html"><i class="bi bi-circle"></i>Method List</a>
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="javascript:;"><i class="bi bi-circle"></i>Branches</a>
                    <ul>
                        <li> <a href="{{route('admin.branchs.create')}}"><i class="bi bi-circle"></i>Add Branch</a>
                        </li>
                        <li> <a href="{{route('admin.branchs.index')}}"><i class="bi bi-circle"></i>Banch List</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</aside>
