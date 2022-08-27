<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @admin
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench"></i>
                        <span key="t-ecommerce">Site Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('setting.index') }}" key="t-products">Setting</a></li>
                        <li><a href="{{ route('user.index') }}" key="t-products">Users</a></li>
                        <li><a href="{{ route('teams.index') }}" key="t-products">Team</a></li>
                        <li><a href="{{ route('pioneer.index') }}" key="t-products">Pioneer</a></li>
                        <li><a href="{{ route('task.index') }}" key="t-products">Task</a></li>
                        <li><a href="{{ route('event.index') }}" key="t-products">Event</a></li>
                    </ul>
                </li>
                @endadmin
                @agent
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home"></i>
                        <span key="t-ecommerce">Housing</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('property.create') }}" key="t-add-product">Add Property</a></li>
                        <li><a href="{{ route('property.index') }}" key="t-products">Properties</a></li>
                        <li><a href="{{ route('booking.index') }}" key="t-checkout">Bookings</a></li>
                    </ul>
                </li>
                @endagent
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store-alt"></i>
                        <span key="t-ecommerce">Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.create') }}" key="t-add-product">Add Product</a></li>
                        <li><a href="{{ route('product.index') }}" key="t-products">Products</a></li>
                        <li><a href="{{ route('order.index') }}" key="t-orders">Orders</a></li>
                    </ul>
                </li>
                @manager
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-ecommerce">Event Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('contest.index') }}" key="t-products">Contests</a></li>
                        <li><a href="{{ route('contestant.index') }}" key="t-products">Contestants</a></li>
                    </ul>
                </li>
                @endmanager
                @writer
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-ecommerce">The Domain</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('post.create') }}" key="t-add-product">Add Post</a></li>
                        <li><a href="{{ route('post.index') }}" key="t-products">Posts</a></li>
                    </ul>
                </li>
                @endwriter
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>