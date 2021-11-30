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
            <a href="<?=site_url('stok_baju')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="<?=site_url('stok_celana')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="<?=site_url('stok_tas')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="<?=site_url('stok_topi')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                <small>Stok Baju</small>
            </h1>
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
                                        <th>Status</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Suplier</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>XXL</th>
                                        <th>3L</th>
                                        <th>4L</th>
                                        <th>5L</th>
                                        <th>Jumlah</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- <?php $no = 1;
                                    foreach($row->result() as $key =>$data) {?>
                                    <tr>
                                        <td style="width:5%;"><?=$no++?></td>
                                        <td><?=$data->kode_baju?></td>
                                        <td><?=$data->nama_baju?></td>
                                        <td><?=$data->s?></td>
                                        <td><?=$data->m?></td>
                                        <td><?=$data->l?></td>
                                        <td><?=$data->xl?></td>
                                        <td><?=$data->xxl?></td>
                                        <td><?=$data->xxxl?></td>
                                        <td><?=$data->xxxxl?></td>
                                        <td><?=$data->s+$data->m+$data->l+$data->xl+$data->xxl+$data->xxxl+$data->xxxxl?></td>
                                        <td>
                                            <?php if($data->foto != null) { ?>
                                                <img src="<?=base_url('uploads/barang/'.$data->foto)?>" style="width:100px">
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?> -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Barang</th>
                                        <th>Status</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Suplier</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>XXL</th>
                                        <th>3L</th>
                                        <th>4L</th>
                                        <th>5L</th>
                                        <th>Jumlah</th>
                                        <th>Foto</th>
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
            "url": "<?=site_url('stok_baju/get_ajax')?>",
            "type": "POST"
        }
    });


    });
    </script>