<div class="custom_container" >
    <aside>
        <div class="top">
            <img src="{{asset("logo.png")}}" alt="" class="logo">
            <h2>SYS <span class="danger">CRM</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>

        <div class="side">
            <a href="#">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Dashboard</h3>
            </a>
            <a href="{{route("Duty.MyDutys")}}" class="{{ request()->routeIs('Duty.MyDutys') ? 'active' : '' }}">
                <span class="material-icons-sharp">person_outline</span>
                <h3>Görevlerim</h3>
            </a>
            <a href="{{route("Duty.create")}}" class="{{ request()->routeIs('Duty.create') ? 'active' : '' }}">
                <span class="material-icons-sharp">receipt_long</span>
                <h3>Yeni Görev</h3>
            </a>
            <a href="{{route("customers.index")}}" class="{{ request()->routeIs('customers.index') ? 'active' : '' }}">
                <span class="material-icons-sharp">insights</span>
                <h3>Müşteriler</h3>
            </a>
            <a href="{{route("customers.store")}}" class="{{ request()->routeIs('customers.store') ? 'active' : '' }}">
                <span class="material-icons-sharp">mail_outline</span>
                <h3>Müşteri Ekle</h3>
                <span class="message-count">26</span>
            </a>
            <a href="{{route("customers.store")}}">
                <span class="material-icons-sharp">inventory</span>
                <h3>Hesaplar</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">report</span>
                <h3>Reports</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">settings</span>
                <h3>Settings</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">add</span>
                <h3>Add Product</h3>
            </a>
            <a href="#">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <!-----------------END OF ASİDE---------------->
    <main>
        <!--<h1>Dashboard</h1>



        <div class="insights">
            <div class="sales">
                <span class="material-icons-sharp">analytics</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Sales</h3>
                        <h1>$25,024</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>%81</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Last 24 Hours</small>
            </div>
        </div>-->
    </main>
</div>
