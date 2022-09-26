<div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
    @if (auth()->user()->role == "1")
        <li class="nav-label">Home</li>
        <li>
            <a href="{{ url('home')}}" aria-expanded="false">
                <i class="icon-home menu-icon"></i><span class="nav-text">Home</span>
            </a>
        </li>
        <li class="nav-label">Master Data</li>
        <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon-layers menu-icon"></i><span class="nav-text">Data Pasien</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ url('dataset') }}" aria-expanded="false">Dataset</a></li>
                <li><a href="{{ url('data-latih') }}" aria-expanded="false">Data Latih</a></li>
                <li><a href="{{ url('data-model') }}" aria-expanded="false">Data Model</a></li>
                <li><a href="{{ url('data-uji') }}" aria-expanded="false">Data Uji</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ url('diagnosa') }}" aria-expanded="false">
                <i class="icon-layers menu-icon"></i><span class="nav-text">Diagnosa</span>
            </a>
        </li>
        <li class="nav-label">Proses Pelatihan & Pengujian</li>
        <li><a href="{{ url('pelatihan') }}" aria-expanded="false"><i class="icon-refresh menu-icon"></i><span class="nav-text">Pelatihan</span></a></li>
        <li><a href="{{ url('pengujian') }}" aria-expanded="false"><i class="icon-refresh menu-icon"></i><span class="nav-text">Pengujian</span></a></li>
        <li class="nav-label">Management User</li>
            <li>
                <a href="{{ url('user')}}" aria-expanded="false">
                    <i class="icon-people menu-icon"></i><span class="nav-text">User</span>
                </a>
            </li>
        </li>
    @endif
    @if (auth()->user()->role == "0")
        <li class="nav-label">Klasifikasi Demam</li>
        <li>
            <a href="{{ url('klasifikasi-demam')}}" aria-expanded="false">
                <i class="icon-people menu-icon"></i><span class="nav-text">Klasifikasi</span>
            </a>
        </li>
    </li>
    @endif
    </ul>
</div>