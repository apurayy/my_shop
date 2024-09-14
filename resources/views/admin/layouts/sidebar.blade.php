<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">

            <span style="text-transform: capitalize !important; font-size: 25px;" class="app-brand-text demo menu-text fw-bold ms-2">My Laravel Shop</span>
        </a>

        <a href="javascript:void(0);"
            class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- =================Category============= -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Category</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('add_category')}}" class="menu-link">
                        <div data-i18n="Without menu">Add Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('all_category') }}" class="menu-link">
                        <div data-i18n="Without navbar">All Category</div>
                    </a>
                </li>

            </ul>
        </li>
        <!-- =================Category end============= -->

        <!-- =================Sub-Category============= -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Sub Category</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('add_sub_category')}}" class="menu-link">
                        <div data-i18n="Without menu">Add Sub Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('all_sub_category')}}" class="menu-link">
                        <div data-i18n="Without navbar">All Sub Category</div>
                    </a>
                </li>

            </ul>
        </li>
        <!-- =================Sub Category end============= -->

        <!-- =================Product============= -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Product</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('add_product')}}" class="menu-link">
                        <div data-i18n="Without menu">Add Product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('all_product')}}" class="menu-link">
                        <div data-i18n="Without navbar">All Product</div>
                    </a>
                </li>

            </ul>
        </li>
        <!-- =================Product end============= -->

        <!-- =================Order============= -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Order</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('pending_order')}}" class="menu-link">
                        <div data-i18n="Without menu">Pendin Order</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Without navbar">Completed Order</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Without navbar">Cancle Order</div>
                    </a>
                </li>

            </ul>
        </li>
        <!-- =================Order end============= -->

        <!-- Cards -->
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Page</div>
            </a>
        </li>

    </ul>
</aside>
