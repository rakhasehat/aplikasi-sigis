        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Table</a></li>
              <li class="breadcrumb-item"><a href="#">Data</a></li>
              <li class="breadcrumb-item active" aria-current="page">Wilayah</li>
            </ol>
          </nav>
          <!-- DataTales Example -->
          <!--  TABLEEEEESSSSS -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 add-table-header">
              <h6 class="m-0 font-weight-bold text-primary add-table-header--1">Tabel Data Wilayah</h6>
              <a class="btn btn-success btn-icon-split add-table-header--2" role="button" href="<?= base_url('wilayah/tambah_data') ?>" title="Tambah Data">
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
                      <th class="text-center">Kode Trotoar</th>
                      <th class="text-center">Nama</th>
					  					<th class="text-center">Alamat</th>
					  					<th width="15%" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
											<?php $no = 1;
											foreach($wilayah as $w){ ?>
											<td><?= $no++; ?></td>
											<td><?= $w->kode_trotoar; ?></td>
											<td><?= $w->nama_trotoar; ?></td>
											<td><?= $w->nama_jalan; ?></td>
							<td><a class="btn btn-warning btn-circle" href="<?= base_url('wilayah/edit/'.$w->id_trotoar); ?>"><i class="fas fa-pen"></i></a>
							<a class="btn btn-danger btn-circle" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('wilayah/hapus/'.$w->id_trotoar); ?>"><i class="fas fa-trash"></i></a></td>
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
