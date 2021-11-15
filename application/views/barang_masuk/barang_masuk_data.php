<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data
                <small>Barang Masuk</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('barang_masuk/add')?>" class="btn btn-primary btn-flat">
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
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>2L</th>
                                        <th>3L</th>
                                        <th>4L</th>
                                        <th>5L</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1;
                                    foreach($row->result() as $key =>$data) {?>
                                    <tr>
                                        <td style="width:5%;"><?=$no++?></td>
                                        <td><?=$data->kode_barang?></td>
                                        <td><?=$data->s_m?></td>
                                        <td><?=$data->m_m?></td>
                                        <td><?=$data->l_m?></td>
                                        <td><?=$data->xl_m?></td>
                                        <td><?=$data->xxl_m?></td>
                                        <td><?=$data->xxxl_m?></td>
                                        <td><?=$data->xxxxl_m?></td>
                                        <td><?=$data->xxxxxl_m?></td>
                                        <td><?=$data->s_m+$data->m_m+$data->l_m+$data->xl_m+$data->xxl_m+$data->xxxl_m+$data->xxxxl_m+$data->xxxxxl_m?></td>
                                        <td><?=$data->tanggal_masuk?></td>
                                        <td class="text-center" width="160px">
                                            <a id="detail" class="btn btn-default btn-xs"
                                            data-toggle="modal" data-target="#modal-detail"
                                            data-kode_barang="<?=$data->kode_barang?>"
                                            data-nama_barang="<?=$data->nama_barang?>"
                                            data-nama="<?=$data->nama?>">
                                            <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <?php if($this->fungsi->user_login()->level == 1) {?>
                                            <a href="<?=site_url('barang_masuk/del/' .$data->id_barang_masuk)?>" onclick="return confirm('Haspus Data?')" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Barang</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>2L</th>
                                        <th>3L</th>
                                        <th>4L</th>
                                        <th>5L</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Masuk</th>
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

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Barang Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th style="">Kode Barang</th>
                                <td><span id="kode_barang"></span></td>
                            </tr>
                            <tr>
                                <th style="">Nama Barang</th>
                                <td><span id="nama_barang"></span></td>
                            </tr>
                            <tr>
                                <th style="">Oleh:</th>
                                <td><span id="nama"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var kode_barang = $(this).data('kode_barang');
            var nama_barang = $(this).data('nama_barang');
            var nama = $(this).data('nama');
            $('#kode_barang').text(kode_barang);
            $('#nama_barang').text(nama_barang);
            $('#nama').text(nama);
            $('#modal-detail').modal('hide');
        })
    })
    </script>