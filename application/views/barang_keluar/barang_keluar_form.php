<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=ucfirst($page)?>
                <small>Barang Keluar</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('barang_keluar')?>" class="btn btn-warning btn-flat">
                    <i class="fas fa-undo"></i> Kembali
                </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="box"><div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                <form action="<?=site_url('barang_keluar/process')?>" method="post">
                                        <div class="form-group">
                                            <input type="text" name="user_id" value="<?=$this->fungsi->user_login()->nama?>" class="form-control" readonly>
                                            <label for="kode_barang">Kode Barang *</label>
                                            <input type="hidden" name="user_id" value="<?=$this->fungsi->user_login()->user_id?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="id_barang" id="id_barang">
                                            <input type="text" name="kode_barang" id="kode_barang" class="form-control" required autofocus readonly>
                                            <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>S(28) [Untuk Tas/Topi/Handuk/Mug Isi ini Saja]</label>
                                                    <input type="number" name="s_k" value="<?=$row->s_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>S</label>
                                                    <input type="text" name="s" id="s" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>M(29)</label>
                                                    <input type="number" name="m_k" value="<?=$row->m_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>M</label>
                                                    <input type="text" name="m" id="m" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>L(30)</label>
                                                    <input type="number" name="l_k" value="<?=$row->l_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>L</label>
                                                    <input type="text" name="l" id="l" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>XL(31)</label>
                                                    <input type="number" name="xl_k" value="<?=$row->xl_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>XL</label>
                                                    <input type="text" name="xl" id="xl" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>XXL(32)</label>
                                                    <input type="number" name="xxl_k" value="<?=$row->xxl_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>XXL</label>
                                                    <input type="text" name="xxl" id="xxl" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>3L(33)</label>
                                                    <input type="number" name="xxxl_k" value="<?=$row->xxxl_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>3L</label>
                                                    <input type="text" name="xxxl" id="xxxl" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>4L(34)</label>
                                                    <input type="number" name="xxxxl_k" value="<?=$row->xxxxl_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>4L</label>
                                                    <input type="text" name="xxxxl" id="xxxxl" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>5L(35)</label>
                                                    <input type="number" name="xxxxxl_k" value="<?=$row->xxxxxl_k?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>5L</label>
                                                    <input type="text" name="xxxxxl" id="xxxxxl" value="-" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan *</label>
                                            <select class="form-control" name="ket">
            									<option value="">- Pilih Kategori</option>
            									<option value="Umum">Umum</option>
            									<option value="Sy Suprapto">Sy Suprapto</option>
            									<option value="Sy Teweh">Sy Teweh</option>
            									<option value="Sy PBUN">Sy PBUN</option>
            									<?php if($this->fungsi->user_login()->level == 1) {?>
            									<option value="Revisi">Revisi</option>
            									<?php
														}
														?>
            								</select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal keluar</label>
                                            <input type="datetime" name="tanggal_keluar" value="<?=date('Y-m-d H-i-s')?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                                <i class="fas fa-paper-plane"></i> Simpan</button>
                                            <button type="reset" class="btn btn-secondary btn-flat">
                                                <i class="fas fa-sync-alt"></i> Ulang</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="modal fade" id="modal-barang">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Harga</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($barang as $i => $data) {?>
                                <tr>
                                    <td><?=$data->kode_barang?></td>
                                    <td><?=$data->nama_barang?></td>
                                    <td><?=$data->jenis?></td>
                                    <td><?='Rp '.number_format ($data->harga)?></td>

                                    <td>
                                        <button class="btn btn-xs btn-info" id="select"
                                            data-id="<?=$data->id_barang?>"
                                            data-kode_barang="<?=$data->kode_barang?>"
                                            data-s="<?=$data->s?>"
                                            data-m="<?=$data->m?>"
                                            data-l="<?=$data->l?>"
                                            data-xl="<?=$data->xl?>"
                                            data-xxl="<?=$data->xxl?>"
                                            data-xxxl="<?=$data->xxxl?>"
                                            data-xxxxl="<?=$data->xxxxl?>"
                                            data-xxxxxl="<?=$data->xxxxxl?>">
                                            <i class="fas fa-check"></i> Pilih
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_barang = $(this).data('id');
            var kode_barang = $(this).data('kode_barang');
            var s = $(this).data('s');
            var m = $(this).data('m');
            var l = $(this).data('l');
            var xl = $(this).data('xl');
            var xxl = $(this).data('xxl');
            var xxxl = $(this).data('xxxl');
            var xxxxl = $(this).data('xxxxl');
            var xxxxxl = $(this).data('xxxxxl');
            $('#id_barang').val(id_barang);
            $('#kode_barang').val(kode_barang);
            $('#s').val(s);
            $('#m').val(m);
            $('#l').val(l);
            $('#xl').val(xl);
            $('#xxl').val(xxl);
            $('#xxxl').val(xxxl);
            $('#xxxxl').val(xxxxl);
            $('#xxxxxl').val(xxxxxl);
            $('#modal-barang').modal('hide');
        })
    })
    </script>