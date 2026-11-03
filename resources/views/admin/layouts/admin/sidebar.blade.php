<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark min-vh-100" style="width: 250px;">
    <a href="{{ url('/admin/dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fas fa-fire fa-2x me-2 text-warning"></i>
        <span class="fs-4 fw-bold">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link text-white {{ request()->is('admin/dashboard') ? 'active bg-primary' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('/user') }}" class="nav-link text-white {{ request()->is('user*') ? 'active bg-primary' : '' }}">
                <i class="fas fa-users me-2"></i> Data User
            </a>
        </li>
        <li>
            <a href="{{ url('/pelanggan') }}" class="nav-link text-white {{ request()->is('pelanggan*') ? 'active bg-primary' : '' }}">
                <i class="fas fa-address-book me-2"></i> Data Pelanggan
            </a>
        </li>
    </ul>
    <hr>
</div>