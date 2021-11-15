<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit
                <small>Pengguna</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
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
                                    <form action="" method="post">
                                        <div class="form-group <?=form_error('nama') ? 'has-danger': null ?>">
                                            <label>Nama *</label>
                                            <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                                            <input type="text" name="nama" value="<?=$this->input->post('nama') ?? $row->nama ?>" class="form-control">
                                            <?=form_error('nama')?>
                                        </div>
                                        <div class="form-group <?=form_error('username') ? 'has-danger': null ?>">
                                            <label>Username *</label>
                                            <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username ?>" class="form-control">
                                            <?=form_error('username')?>
                                        </div>
                                        <div class="form-group <?=form_error('password') ? 'has-danger': null ?>">
                                            <label>Password</label><small>(Biarkan Kososng Jika tidak Ingin diganti)</small>
                                            <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                                            <?=form_error('password')?>
                                        </div>
                                        <div class="form-group <?=form_error('passconf') ? 'has-danger': null ?>">
                                            <label>Ulangi Password</label>
                                            <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                                            <?=form_error('passconf')?>
                                        </div>
                                        <div class="form-group <?=form_error('level') ? 'has-danger': null ?>">
                                            <label>Level</label>
                                            <select name="level" class="form-control">
                                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                                <option value="1">Admin</option>
                                                <option value="2" <?=$level == 2 ? 'selected' : null?>>Kasir</option>
                                                <option value="3" <?=$level == 3 ? 'selected' : null?>>Gudang</option>
                                                <option value="4" <?=$level == 4 ? 'selected' : null?>>Cabang</option>
                                            </select>
                                            <?=form_error('level')?>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-flat">
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