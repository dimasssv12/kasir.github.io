<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/{{auth()->user()->level}}/dashboard"><i class="fas fa-store"></i> Toko Toko an</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard"><i class="fas fa-check-circle"></i> ok</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/dashboard" class="nav-link"><i class="fas fa-chart-line fa-lg"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            @if(auth()->user()->level=='admin')
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/satuan" class="nav-link"><i class="fas fa-balance-scale fa-lg"></i><span>Satuan</span></a>
            </li>
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/kategori" class="nav-link"><i class="fas fa-book fa-lg"></i><span>Kategori</span></a>
            </li>
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/barang" class="nav-link"><i class="fas fa-box-open fa-lg"></i><span>Barang</span></a>
            </li>
            @endif
            @if(auth()->user()->level == 'kasir')
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/penjualan" class="nav-link"><i class="fas fa-money-check-alt fa-lg"></i><span>Transaksi</span></a>
            </li>

        @endif

            @if(auth()->user()->level == 'admin')
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/laporan" class="nav-link"><i class="fas fa-file-alt fa-lg"></i><span>Laporan</span></a>
            </li>
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/user" class="nav-link"><i class="fas fa-users-cog fa-lg"></i><span>User</span></a>
            </li>
            @endif
        </ul>

        <div style="background: #f1f1f1; padding: 10px; text-align: center;">
            <i class="fas fa-gem" style="font-size: 32px; color: #ffcc00;"></i>
            <i class="fas fa-gem" style="font-size: 32px; color: #ffcc00;"></i>
            <i class="fas fa-gem" style="font-size: 32px; color: #ffcc00;"></i>
            <p style="margin-top: 5px;">ini Sidebar</p>
        </div>
    </aside>
</div>
