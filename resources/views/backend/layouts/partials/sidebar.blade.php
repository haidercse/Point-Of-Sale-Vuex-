<!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('admin/assets/images/icon/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard Page</a></li>
                                    
                                </ul>
                            </li>
                            <li class="{{ Route::is('user.index') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>User Management
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('user.index') ? 'active' : '' }}"><a href="{{ route('user.index') }}">User</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('category.index') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Category Management
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('category.index') ? 'active' : '' }}"><a href="{{ route('category.index') }}">Category</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('brand.index') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Brand Management
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('brand.index') ? 'active' : '' }}"><a href="{{ route('brand.index') }}">Brand</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('size.index') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Size Management
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('size.index') ? 'active' : '' }}"><a href="{{ route('size.index') }}">Size</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('product.index') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Product Management
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('product.index') ? 'active' : '' }}"><a href="{{ route('product.index') }}">Product</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('product.stock.in') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Product Stock Management
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('product.stock.in') ? 'active' : '' }}"><a href="{{ route('product.stock.in') }}">Stock</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('product.stock.history') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Product Stock History
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('product.stock.history') ? 'active' : '' }}"><a href="{{ route('product.stock.history') }}">Stock History</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('return.product') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Return Product Management
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('return.product') ? 'active' : '' }}"><a href="{{ route('return.product') }}">Stock</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('return.product.history') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Return Product History
                                    </span></a>
                                <ul class="collapse">
                                    <li class="{{ Route::is('return.product.history') ? 'active' : '' }}"><a href="{{ route('return.product.history') }}">Return Product History</a></li>
                                </ul>
                            </li>
                            <li class="{{ Route::is('user.logout') ? 'active' : '' }}">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Logout User
                                    </span></a>
                                <ul class="collapse">
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
