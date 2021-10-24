  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Home</li>
        <li>
          <a href="{{ url('/home') }}">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Data</li>
        <li>
          <a href="{{ url('/ow') }}">
            <i class="fa fa-map-pin"></i> <span>Data Objek Wisata</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="{{ url('/pengunjung') }}">
            <i class="fa fa-child"></i> <span>Data Pengunjung</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="{{ url('/pemasukan') }}">
            <i class="fa fa-credit-card"></i> <span>Data Pemasukkan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="{{ url('/fasilitas') }}">
            <i class="fa  fa-coffee"></i> <span>Data Fasilitas</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="{{ url('/kecamatan') }}">
            <i class="fa  fa-map-o"></i> <span>Data Kecamatan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>