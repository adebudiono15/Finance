<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{-- {{ Auth::user()->name }} --}} Nama
                            <span class="user-level">
                                Role User
                                {{-- {{ Auth::user()->nip }} --}}
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('bank', 'jenis-pengeluaran','jenis-pendapatan','divisi','supplier','customer','barang') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#master">
                        <i class="fas fa-layer-group"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('bank' , 'jenis-pengeluaran','jenis-pendapatan', 'divisi','customer','supplier','barang') ? 'show' : '' }}" id="master">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('barang') ? 'active' : '' }}">
                                <a href="{{ url('barang') }}">
                                    <span class="sub-item">Barang</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('bank') ? 'active' : '' }}">
                                <a href="{{ url('bank') }}">
                                    <span class="sub-item">Bank</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('divisi') ? 'active' : '' }}">
                                <a href="{{ url('divisi') }}">
                                    <span class="sub-item">Divisi</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('customer') ? 'active' : '' }}">
                                <a href="{{ url('customer') }}">
                                    <span class="sub-item">Customer</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('supplier') ? 'active' : '' }}">
                                <a href="{{ url('supplier') }}">
                                    <span class="sub-item">Supplier</span>
                                </a>
                            </li>
                           
                            <li class="{{ Request::is('jenis-pendapatan') ? 'active' : '' }}">
                                <a href="{{ url('jenis-pendapatan') }}">
                                    <span class="sub-item">Jenis Pendapatan</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('jenis-pengeluaran') ? 'active' : '' }}">
                                <a href="{{ url('jenis-pengeluaran') }}">
                                    <span class="sub-item">Jenis Pengeluaran</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ Request::is('pendapatan-bank','pendapatan-tunai','piutang') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pendapatan">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Pendapatan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('pendapatan-bank','pendapatan-tunai','piutang') ? 'show' : '' }}" id="pendapatan">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('pendapatan-bank') ? 'active' : '' }}">
                                <a href="{{ url('pendapatan-bank') }}">
                                    <span class="sub-item">Bank</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('pendapatan-tunai') ? 'active' : '' }}">
                                <a href="{{ url('pendapatan-tunai') }}">
                                    <span class="sub-item">Tunai</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('piutang') ? 'active' : '' }}">
                                <a href="{{ url('piutang') }}">
                                    <span class="sub-item">Piutang</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ Request::is('pengeluaran-bank','pengeluaran-tunai','hutang') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pengeluaran">
                        <i class="far fa-newspaper"></i>
                        <p>Pengeluaran</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('pengeluaran-bank','pengeluaran-tunai','hutang') ? 'show' : '' }}" id="pengeluaran">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('pengeluaran-bank') ? 'active' : '' }}">
                                <a href="{{ url('pengeluaran-bank') }}">
                                    <span class="sub-item">Bank</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('pengeluaran-tunai') ? 'active' : '' }}">
                                <a href="{{ url('pengeluaran-tunai') }}">
                                    <span class="sub-item">Tunai</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('hutang') ? 'active' : '' }}">
                                <a href="{{ url('hutang') }}">
                                    <span class="sub-item">Hutang</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
             
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->