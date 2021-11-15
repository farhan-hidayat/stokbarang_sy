<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=ucfirst($page)?>
                <small>Celana</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('celana')?>" class="btn btn-warning btn-flat">
                    <i class="fas fa-undo"></i> Kembali
                </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php $this->view('messages') ?>
         <div class="box"><div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <?php echo form_open_multipart('celana/process') ?>
                                        <div class="form-group">
                                            <label>Kode Barang *</label>
                                            <input type="hidden" name="id" value="<?=$row->id_barang?>">
                                            <input type="text" name="kode_barang" value="<?=$row->kode_barang?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" name="kategori" value="Celana" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang *</label>
                                            <input type="text" name="nama_barang" value="<?=$row->nama_barang?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier</label>
                                                <?php echo form_dropdown('supplier', $supplier, $selectedsupplier,
                                                    ['class' => 'form-control', 'required' => 'required']) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" name="harga" value="<?=$row->harga?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select name="jenis2" class="form-control">
                                                <?php $jenis2 = $this->input->post('jenis2') ? $this->input->post('jenis2') : $row->jenis ?>
                                                <option>Dewasa</option>
                                                <option <?=$jenis2 == "Anak" ? 'selected' : null?>>Anak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select name="jenis" class="form-control">
                                                <?php $jenis = $this->input->post('jenis') ? $this->input->post('jenis') : $row->jenis ?>
                                                <option>Panjang</option>
                                                <option <?=$jenis == "Lengan Pendek" ? 'selected' : null?>>Pendek</option>
                                                <option <?=$jenis == "3/4" ? 'selected' : null?>>3/4</option>
                                                <option <?=$jenis == "7/8" ? 'selected' : null?>>7/8</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <?php if($page == 'edit') {
                                                if($row->foto != null) { ?>
                                                <div style="margin-bottm:5px">
                                                    <img src="<?=base_url('uploads/barang/'.$row->foto)?>" style="width:80%">
                                                </div>
                                                <?php
                                                }
                                            } ?>
                                            <input type="file" name="foto" value="<?=$row->foto?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                                <i class="fas fa-paper-plane"></i> Simpan</button>
                                            <button type="reset" class="btn btn-secondary btn-flat">
                                                <i class="fas fa-sync-alt"></i> Ulang</button>
                                        </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>