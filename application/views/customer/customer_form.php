<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=ucfirst($page)?>
                <small>Customer</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
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
                                    <form action="<?=site_url('customer/process')?>" method="post">
                                        <div class="form-group">
                                            <label>Nama Customer *</label>
                                            <input type="hidden" name="id" value="<?=$row->id_customer?>">
                                            <input type="text" name="nama_customer" value="<?=$row->nama_customer?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender *</label>
                                            <select name="gender" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <option>Laki-laki</option>
                                                <option>Perempuan</option>
                                                <option>Cabang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>No Kontak</label>
                                            <input type="number" name="no_kontak" value="<?=$row->no_kontak?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" value="<?=$row->alamat?>" class="form-control">
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