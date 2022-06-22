<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('categories*') ? 'item-active' : '' }}" href="{{ route('categories.index') }}">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Категории</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link {{ Route::is('tags*') ? 'item-active' : '' }}" href="{{ route('tags.index') }}">--}}
{{--                        <i class="nav-icon fas fa-tags"></i>--}}
{{--                        <p>Тэги</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('brands*') ? 'item-active' : '' }}" href="{{ route('brands.index') }}">
                        <i class="nav-icon fab fa-adn"></i>
                        <p>Бренды</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('colors*') ? 'item-active' : '' }}" href="{{ route('colors.index') }}">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>Цвета</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tshirt"></i>
                        <p>Продукты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Заказы</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('users*') ? 'item-active' : '' }}" href="{{ route('users.index') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Пользователи</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

