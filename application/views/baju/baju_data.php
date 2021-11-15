<section class="content">
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3><?=$this->fungsi->count_baju()?></h3>

            <p>Baju</p>
            </div>
            <div class="icon">
            <i class="fas flaticon-tshirt"></i>
            </div>
            <a href="<?=site_url('baju')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3><?=$this->fungsi->count_celana()?></h3>

            <p>Celana</p>
            </div>
            <div class="icon">
            <i class="fas flaticon-garment"></i>
            </div>
            <a href="<?=site_url('celana')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3><?=$this->fungsi->count_tas()?></h3>

            <p>Tas & Handuk</p>
            </div>
            <div class="icon">
            <i class="fas flaticon-backpack"><i class="fas flaticon-towel"></i></i>
            </div>
            <a href="<?=site_url('tas')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3><?=$this->fungsi->count_topi()?></h3>

            <p>Topi & Mug</p>
            </div>
            <div class="icon">
            <i class="fas flaticon-pamela-hat"><i class="fas flaticon-food"></i></i>
            </div>
            <a href="<?=site_url('topi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
    </div>
</section>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data
                <small>Baju</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('baju/add')?>" class="btn btn-primary btn-flat">
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
                                        <th>Kode Baju</th>
                                        <th>Nama Baju</th>
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
                                            <?=$data->kode_baju?><br>
                                            <a href="<?=site_url('baju/barcode_qrcode/' .$data->id_baju)?>" class="btn btn-default btn-xs">
                                                Lihat <i class="fas fa-barcode"></i>
                                            </a>
                                        </td>
                                        <td><?=$data->nama_baju?></td>
                                        <td><?=$data->nama_suplier?></td>
                                        <td><?='Rp '.number_format ($data->harga)?></td>
                                        <td><?=$data->jenis == 1 ? "Lengan Panjang" : ($data->jenis == 2 ?"Lengan Pendek" : "Reglan (3/4)")?></td>
                                        <td>
                                            <?php if($data->foto != null) { ?>
                                                <img src="<?=base_url('uploads/barang/'.$data->foto)?>" style="width:100px">
                                            <?php } ?>
                                        </td>
                                        <td class="text-center" width="160px">
                                            <a href="<?=site_url('baju/edit/' .$data->id_baju)?>" class="btn btn-warning btn-xs">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="<?=site_url('baju/del/' .$data->id_baju)?>" onclick="return confirm('Haspus Data?')" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?> -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Baju</th>
                                        <th>Nama Baju</th>
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
                "url": "<?=site_url('baju/get_ajax')?>",
                "type": "POST"
            }
        });
        
        
    });
    </script>