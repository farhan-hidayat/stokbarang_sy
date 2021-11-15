<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stok Barang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="<?=base_url()?>assets/icon/flaticon.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <div class="info">
      <a href="#" class="d-block"><?=ucfirst($this->fungsi->user_login()->nama)?></a>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=site_url('dashboard')?>" class="brand-link">
      <img src="<?=base_url()?>LS.svg"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Syailendra</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=ucfirst
          ($this->fungsi->user_login()->level == 1 ? "Admin" :
          ($this->fungsi->user_login()->level == 2 ? "Kasir" : 
          ($this->fungsi->user_login()->level == 3 ? "Gudang" : "Cabang")))?></a>
        </div>
        <div class="info">
          <a href="<?=site_url('auth/logout')?>" class="d-block">Keluar</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=site_url('dashboard')?>" class="nav-link <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Grafik Barang
              </p>
            </a>
          </li>
          <?php if($this->fungsi->user_login()->level == 1) {?>
          <li class="nav-item">
            <a href="<?=site_url('supplier')?>" class="nav-link <?=$this->uri->segment(1) == 'supplier' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Suppliers
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2) {?>
          <li class="nav-item">
            <a href="<?=site_url('customer')?>" class="nav-link <?=$this->uri->segment(1) == 'customer' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer/Cabang
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) {?>
          <li class="nav-item has-treeview">
            <a href="<?=site_url('baju')?>" class="nav-link <?=$this->uri->segment(1) == 'baju' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data Barang
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3) {?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?=$this->uri->segment(1) == 'barang_keluar' || $this->uri->segment(1) == 'barang_masuk' || $this->uri->segment(1) == 'selisih' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?=site_url('barang_keluar')?>" class="nav-link <?=$this->uri->segment(1) == 'barang_keluar' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan/Barang Keluar</p>
                </a>
              </li>
              
              <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3) {?>
              <li class="nav-item">
                <a href="<?=site_url('barang_masuk')?>" class="nav-link <?=$this->uri->segment(1) == 'barang_masuk' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <?php } ?>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link <?=$this->uri->segment(1) == 'selisih' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Selisih</p>
                </a>
              </li> -->
            </ul>
          </li>
          <?php } ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?=$this->uri->segment(1) == 'penjualan' || $this->uri->segment(1) == 'stok_baju' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Stok & Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="#" class="nav-link <?=$this->uri->segment(1) == 'penjualan' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li> -->
              <li class="nav-item has-treeview">
                <a href="<?=site_url('stok_baju')?>" class="nav-link <?=$this->uri->segment(1) == 'stok_baju' || $this->uri->segment(1) == 'stok_celana' || $this->uri->segment(1) == 'stok_topi' || $this->uri->segment(1) == 'stok_tas' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Stok Barang
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          
          <?php if($this->fungsi->user_login()->level == 1) {?>
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="<?=site_url('user')?>" class="nav-link <?=$this->uri->segment(1) == 'user' ? 'active' : '' ?>">
              <i class="fas fa-user"></i>
              <p>Users</p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $contents ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong><center><a href="http://syailendrashop.co.id">Syailendra</a>.</center></strong>
    
    <div>
    <strong><center>TP = Tangan Panjang | LDS = Baju Cewe/Body | AK = Kerah Anak-anak | K = Oblong Anak-anak | Tanpa TP = Lengan Pendek</center></strong>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->


<!-- Bootstrap -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>
<!-- jquery-validation -->
<script src="<?=base_url()?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url()?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url()?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery/jquery.price_format.min.js"></script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    $('.harga').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
    });

    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ],
      datasets: [
        {
          label               : 'Penjualan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?= json_encode($row); ?>
        },
        {
          label               : 'Pembelian',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : true,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : <?= json_encode($row); ?>
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })
  
    
});
</script>
</body>
</html>
