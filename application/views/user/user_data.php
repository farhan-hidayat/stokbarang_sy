<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data
                <small>Pengguna</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fas fa-user-plus"></i> Tambah
                </a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>  
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</td>
                                        <th>Level</th>
                                        <th>Terakhir Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1;
                                    foreach($row->result() as $key =>$data) {?>
                                    <tr>
                                        <td style="width:5%;"><?=$no++?></td>
                                        <td><?=$data->nama?></td>
                                        <td><?=$data->username?></td>
                                        <td><?=$data->level == 1 ? "Admin" : 
                                        ($data->level == 2 ?"Kasir" : 
                                        ($data->level == 3 ?"Gudang" : "Cabang"))?></td>
                                        <td><?=$data->trakhir_login?></td>
                                        <td class="text-center" width="160px">
                                            <form action="<?=site_url('user/del')?>" method="post">
                                                <a href="<?=site_url('user/edit/' .$data->user_id)?>" class="btn btn-warning btn-xs">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                                                <button onclick="return confirm('Haspus Data?')" class="btn btn-danger btn-xs">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</td>
                                        <th>Level</th>
                                        <th>Terakhir Login</th>
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