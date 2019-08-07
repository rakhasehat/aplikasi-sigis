        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Table</a></li>
              <li class="breadcrumb-item"><a href="#">Data</a></li>
              <li class="breadcrumb-item active" aria-current="page">Jalan</li>
            </ol>
          </nav>
          <!-- DataTales Example -->
          <!--  TABLEEEEESSSSS -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 add-table-header">
              <h6 class="m-0 font-weight-bold text-primary add-table-header--1">Tabel Data Jalan</h6>
              <a class="btn btn-success btn-icon-split add-table-header--2" role="button" href="<?= base_url('jalan/tambah') ?>" title="Tambah Data">
                <span class="icon text-white-50">
									<i class="fa fa-plus"></i>
								</span>
								<span class="text">Tambah Data</span>
								</a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Kode Jalan</th>
                      <th class="text-center">Nama Jalan</th>
                      <th class="text-center">Kode Pos</th>
											<th class="text-center">Nama Kelurahan</th>
											<th width="15%" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
											<?php $no = 1; 
											 foreach ($jalan as $j) {?>
											<td><?=  $no++; ?></td>
											<td><?= $j->kode_jalan;?></td>
											<td><?= $j->nama_jalan; ?></td>
											<td><?= $j->kode_pos; ?></td>
											<td><?= $j->nama_kelurahan; ?></td>
											<td><a class="btn btn-warning btn-circle" href="<?= base_url('jalan/edit/'.$j->id_jalan); ?>"><i class="fas fa-pen"></i></a>
										<a class="btn btn-danger btn-circle remove" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('jalan/hapus/'.$j->id_jalan); ?>"><i class="fas fa-trash"></i></a></td>
										</tr>
										<?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
											 </div>

                </div>
          <!-- /.container-fluid -->

				</div>
        <!-- End of Main Content -->
