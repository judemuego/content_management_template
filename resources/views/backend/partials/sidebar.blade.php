<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="index.html">
    <img src="{{ asset('img/logo.png')}}" alt="Company Logo" class="company-logo">
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="{{ asset('backend/img/avatars/avatar.jpg')}}" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
            <div class="font-weight-bold">User 01</div>
            <small>Super Admin</small>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Maintenance
            </li>
            <li class="sidebar-item">
                <a href="#maintenance" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 far fa-folder-open"></i> <span class="align-middle">Masterfile</span>
                </a>
                <ul id="maintenance" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="/inventory/customer">Customers</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard-e-commerce.html">Products</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/inventory/color">Colors</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/inventory/bag">Class of Bags</a></li>
                </ul>
            </li>
            <li class="sidebar-header">
                Transaction
            </li>
            <li class="sidebar-item">
                <a href="#transaction" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle mr-2 fas fa-shopping-basket"></i> <span class="align-middle">Orders</span>
                </a>
                <ul id="transaction" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard-default.html">Purchase Order</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="dashboard-e-commerce.html">Factory Order</a></li>
             
                </ul>
            </li>
        </ul>
    </div>
</nav>