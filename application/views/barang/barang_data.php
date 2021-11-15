<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data
                <small>Barang</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('barang/add')?>" class="btn btn-primary btn-flat">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php $this->view('messages') ?>
        <div class="box">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>  
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Supplier</th>
                                        <th>Harga</th>
                                        <th>Jenis</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- <?php $no = 1;
                                    foreach($row->result() as $key =>$data) {?>
                                    <tr>
                                        <td style="width:5%;"><?=$no++?></td>
                                        <td>
                                            <?=$data->kode_barang?><br>
                                            <a href="<?=site_url('barang/barcode_qrcode/' .$data->id_barang)?>" class="btn btn-default btn-xs">
                                                Lihat <i class="fas fa-barcode"></i>
                                            </a>
                                        </td>
                                        <td><?=$data->nama_barang?></td>
                                        <td><?=$data->nama_suplier?></td>
                                        <td><?='Rp '.number_format ($data->harga)?></td>
                                        <td><?=$data->jenis == 1 ? "Lengan Panjang" : ($data->jenis == 2 ?"Lengan Pendek" : "Reglan (3/4)")?></td>
                                        <td>
                                            <?php if($data->foto != null) { ?>
                                                <img src="<?=base_url('uploads/barang/'.$data->foto)?>" style="width:100px">
                                            <?php } ?>
                                        </td>
                                        <td class="text-center" width="160px">
                                            <a href="<?=site_url('barang/edit/' .$data->id_barang)?>" class="btn btn-warning btn-xs">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="<?=site_url('barang/del/' .$data->id_barang)?>" onclick="return confirm('Haspus Data?')" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?> -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Supplier</th>
                                        <th>Harga</th>
                                        <th>Jenis</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    $(function () {
        $("#example1").DataTable({
            "processing" : true,
            "serverSide" : true,
            "ajax": {
                "url": "<?=site_url('barang/get_ajax')?>",
                "type": "POST"
            }
        });
        
        
    });
    </script>