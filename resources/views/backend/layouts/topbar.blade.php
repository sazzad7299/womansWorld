<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3">
            <i class="bi bi-list"></i>
        </div>
        {{-- <form class="searchbar">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
            <input class="form-control" type="text" placeholder="Type here to search">
            <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
        </form> --}}
        <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item search-toggle-icon">
                    <a class="nav-link" href="#">
                        <div class="">
                            <i class="bi bi-search"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        data-bs-toggle="dropdown">
                        <div class="user-setting d-flex align-items-center">
                            <img src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : '/backend/assets/images/avatars/avatar-1.png' }}"
                                class="user-img" alt="">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <img src="{{ auth()->user()->photo ? asset(auth()->user()->photo) : '/backend/assets/images/avatars/avatar-1.png' }}"
                                        alt="" class="rounded-circle" width="54" height="54">
                                    <div class="ms-3">
                                        <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->name }}</h6>
                                        <small class="mb-0 dropdown-user-designation text-secondary">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-person-fill"></i></div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                        </li>
                        {{-- <li>
                  <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-gear-fill"></i></div>
                       <div class="ms-3"><span>Setting</span></div>
                     </div>
                   </a>
                </li>
                <li>
                  <a class="dropdown-item" href="index2.html">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-speedometer"></i></div>
                       <div class="ms-3"><span>Dashboard</span></div>
                     </div>
                   </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-piggy-bank-fill"></i></div>
                       <div class="ms-3"><span>Earnings</span></div>
                     </div>
                   </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                       <div class=""><i class="bi bi-cloud-arrow-down-fill"></i></div>
                       <div class="ms-3"><span>Downloads</span></div>
                     </div>
                   </a>
                </li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript::" class="text-body ms-0"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-lock-fill"></i></div>
                                    <div class="ms-3"><span>{{ __('Log Out') }}</div>
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        data-bs-toggle="dropdown">
                        <div class="projects">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="row row-cols-3 gx-2">
                            <div class="col">
                                <a href="{{ route('admin.orders.index') }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-purple">
                                            <i class="bi bi-basket2-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Orders</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.users.index') }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-info">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Users</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.products.index') }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-success">
                                            <i class="bi bi-trophy-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Products</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.blog.index') }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-danger">
                                            <i class="bi bi-collection-play-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Trends</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.services.index') }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-desert">
                                            <i class="bi bi-calendar-check-fill"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Service</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.branchs.index') }}">
                                    <div class="apps p-2 radius-10 text-center">
                                        <div class="apps-icon-box mb-1 text-white bg-gradient-amour">
                                            <i class="bi bi-book-half"></i>
                                        </div>
                                        <p class="mb-0 apps-name">Branch</p>
                                    </div>
                                </a>
                            </div>
                        </div><!--end row-->
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        data-bs-toggle="dropdown">
                        <div class="notifications">
                            <span class="notify-badge">8</span>
                            <i class="bi bi-bell-fill"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-0">
                        <div class="p-2 border-bottom m-2">
                            <h5 class="h5 mb-0">Notifications</h5>
                        </div>
                        <div class="header-notifications-list p-2">
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="notification-box bg-light-primary text-primary"><i
                                            class="bi bi-basket2-fill"></i></div>
                                    <div class="ms-3 flex-grow-1">
                                        <h6 class="mb-0 dropdown-msg-user">New Orders <span
                                                class="msg-time float-end text-secondary">1 m</span></h6>
                                        <small
                                            class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You
                                            have recived new orders</small>
                                    </div>
                                </div>
                            </a>
                            <div class="p-2">
                                <div>
                                    <hr class="dropdown-divider">
                                </div>
                                <a class="dropdown-item" href="#">
                                    <div class="text-center">View All Notifications</div>
                                </a>
                            </div>
                        </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--end top header-->
