        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Table</a></li>
              <li class="breadcrumb-item"><a href="#">Data</a></li>
			  <li class="breadcrumb-item"><a href="#">Wilayah</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
            </ol>
          </nav>
          <!-- DataTales Example -->
          
          <div class="card shadow mb-4">
					<div class="card-header py-3 add-table-header">
			  		<h6 class="m-0 font-weight-bold text-primary add-table-header--1">Tambah Data Wilayah</h6>
			 			<a class="btn btn-secondary add-table-header--2" href="javascript:window.history.go(-1);">Kembali</a>
            </div>
            <div class="card-body">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#info-dasar"
                    role="tab" aria-controls="nav-home" aria-selected="true">Info Dasar Wilayah</a>
                  <a onclick="showMap()" class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#info-koordinat"
                    role="tab" aria-controls="nav-profile" aria-selected="false">Info Koordinat Jalan</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#upload-gambar" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Upload Gambar</a>
                </div>
              </nav>
              <div class="tab-content add-form" id="nav-tabContent">
                <div class="tab-pane fade show active" id="info-dasar" role="tabpanel"
                  aria-labelledby="nav-home-tab">
				<form action="<?= base_url('wilayah/proses_tambah') ?>" method="POST">
					<input type="hidden" value="" name="id_jalan">

					<div class="form-group">
					  <label class="control-label col-xs-3">Kode Trotoar</label>
						<div class="col-xs-8">
						  <input name="kode_trotoar" class="form-control" type="text" required>
					  </div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-3" >Nama</label>
						<div class="col-xs-8">
							<input name="nama" class="form-control" type="text" required>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-3" >Alamat</label>
						<div class="col-xs-8">
							<select class="form-control" name="alamat" id="alamat" required>
								<option value="">Tidak Terpilih</option>
								<?php foreach($trotoar as $w) { ?>
									<option value="<?= $w->id_trotoar ?>"><?= $w->nama_jalan ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-success">Simpan</button>
			</form>
                </div>
				<div class="tab-pane fade map-wrapper" id="info-koordinat" role="tabpanel"
                  aria-labelledby="nav-profile-tab">
                  <div class="card">
                    <div class="card-header py-3 add-table-header" style="justify-content: flex-start !important">
                      <h6 class="m-0 font-weight-bold text-primary add-table-header--1">Form Manajemen Data Distrik /
                        Kecamatan</h6>
                      <button  id="revise" class="btn btn-circle btn-info add-table-header--2"
                        data-toggle="tooltip" data-placement="" title="Revisi Data">
                        <i class="fa fa-sync"></i>
                      </button>
                      <button  id="deleteAll" class=" btn btn-circle btn-danger"
                        data-toggle="tooltip" data-placement="" title="Hapus Data">
                        <i class="fa fa-trash"></i>
                      </button>
                    </div>
                    <div class="card-body">
                      <div id="map" class="map-content"></div>
                    </div>
                  </div>
                </div>
			</div>
		</div>
	</div>
</div>
          <!-- /.container-fluid -->

