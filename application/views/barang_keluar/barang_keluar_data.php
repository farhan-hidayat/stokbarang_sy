<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data
                <small>Barang Keluar</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('barang_keluar/add')?>" class="btn btn-primary btn-flat">
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
                                        <th>Tanggal keluar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1;
                                    foreach($row->result() as $key =>$data) {?>
                                    <tr>
                                        <td style="width:5%;"><?=$no++?></td>
                                        <td><?=$data->kode_barang?></td>
                                        <td><?=$data->s_k?></td>
                                        <td><?=$data->m_k?></td>
                                        <td><?=$data->l_k?></td>
                                        <td><?=$data->xl_k?></td>
                                        <td><?=$data->xxl_k?></td>
                                        <td><?=$data->xxxl_k?></td>
                                        <td><?=$data->xxxxl_k?></td>
                                        <td><?=$data->xxxxxl_k?></td>
                                        <td><?=$data->s_k+$data->m_k+$data->l_k+$data->xl_k+$data->xxl_k+$data->xxxl_k+$data->xxxxl_k+$data->xxxxxl_k?></td>
                                        <td><?=$data->tanggal_keluar?></td>
                                        <td class="text-center" width="160px">
                                            <a id="detail" class="btn btn-default btn-xs"
                                                data-toggle="modal" data-target="#modal-detail"
                                                data-kode_barang="<?=$data->kode_barang?>"
                                                data-nama_barang="<?=$data->nama_barang?>"
                                                data-nama="<?=$data->nama?>"
                                                data-ket="<?=$data->ket?>">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <?php if($this->fungsi->user_login()->level == 1) {?>
                                            <a href="<?=site_url('barang_keluar/del/' .$data->id_barang_keluar)?>" onclick="return confirm('Haspus Data?')" class="btn btn-danger btn-xs">
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
                                        <th>Tanggal keluar</th>
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
                            <tr>
                                <th style="">Keterangan</th>
                                <td><span id="ket"></span></td>
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
            var ket = $(this).data('ket');
            $('#kode_barang').text(kode_barang);
            $('#nama_barang').text(nama_barang);
            $('#nama').text(nama);
            $('#ket').text(ket);
            $('#modal-detail').modal('hide');
        })
    })
    </script>