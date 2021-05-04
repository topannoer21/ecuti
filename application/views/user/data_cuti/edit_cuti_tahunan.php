<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> <i class="fas fa-file-signature fa-fw"></i> Edit Data Pengajuan Cuti</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() . ''; ?>">Home</a></li>
                            <li class="breadcrumb-item active">Edit Data Pengajuan Cuti</li>
                        </ol>
                    </div>
                </div>
            </div>
         </section>
        <!-- /.content-header -->

<!--Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Pengajuan Cuti</h3>
                        <div class="card-tools">
                            <a href="<?php echo base_url() ?>data_mahasiswa" class="btn btn-tool"><i class="fas fa-times"></i></a></div>
                    </div>
                    <form class="" action="<?php echo base_url() ?>data_cuti/edit_cuti_tahunan" method="POST">
                        <!--/.card-header -->
                        <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 offset-1">
                                            <!-- Form Edit -->
                                            <label for="alasan">Alasan</label>
                                            <br>
                                            <input type="hidden" name="id_cuti" value="<?php echo $data_cuti['id_cuti']; ?>">
                                            <?php echo form_error('alasan', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                            <input class="form-control mb-4" type="text" name="alasan" value="<?php echo $data_cuti['alasan']; ?>">
                                            <label for="tgl_pengajuan">Tanggal Pengajuan</label>
                                            <br>
                                            <?php echo form_error('tgl_pengajuan', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                            <input class="form-control mb-4" type="date" name="tgl_pengajuan" placeholder="" value="<?php echo $data_cuti['tgl_pengajuan']; ?>">

                                            <label for="">Priode Cuti</label><br>
                                            <div class="form-row">
                                                <div class="col-6">
                                                <small>Mulai</small>
                                                <?php echo form_error('tgl_mulai', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                                    <input class="form-control mb-4" type="date" name="tgl_mulai" value="<?php echo $data_cuti['tgl_mulai']; ?>">
                                                </div>

                                                <div class="col-6">
                                                <small>Selesai</small>
                                                    <?php echo form_error('tgl_selesai', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                                    <input class="form-control mb-4" type="date" name="tgl_selesai" value="<?php echo $data_cuti['tgl_selesai']; ?>">

                                                </div>
                                            </div>
                                                <label for="jml_hari">Jumlah Hari</label><br>
                                                <?php echo form_error('jml_hari', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                                <input class="form-control mb-4" type="text" name="jml_hari" value="<?php echo $data_cuti['jml_hari']; ?>">
                                        </div>
                                        <div class="col-5">
                                            <label for="alamat">Alamat</label><br>
                                            <?php echo form_error('alamat', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                            <textarea name="alamat" value="" id="" cols="10" rows="6" class="form-control mb-2"><?php echo $data_cuti['alamat']; ?></textarea>
                                            
                                            <label for="no_tlp">No Telp</label>
                                            <?php echo form_error('no_telp', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                            <input type="text" value="<?php echo $data_cuti['no_telp']; ?>" name="no_telp" class="form-control mb-4 mt-4">
                                            
                                            <label for="id_atasan">Atasan Langsung</label><br>
                                            <?php echo form_error('id_atasan', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                            <select value="" name="id_atasan" id="" class="form-control mb-3">
                                            <option value="<?php echo $data_cuti['id_atasan']; ?>"><?php echo $data_cuti['nama_lengkap']; ?></option>
                                            <?php foreach ($option2 as $row): ?>
                                                    <option value="<?= $row->id_atasan; ?>"><?= $row->nama_lengkap; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                              <a href="<?php echo base_url() . 'Data_cuti'; ?>" class="btn btn-default"><i class="fas fa-arrow-left fa-fw"></i> Back</a>
                              <input type="submit" value="Proses" onclick="return confirm('Are you sure you want to save it');" class="btn btn-primary float-right">
                          </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--/.card -->
            </div>
        </div>
        <!--/.row -->
    </div>
    <!--/.container-fluid -->
</div>
<!--/.content -->
  </div>
<!-- /.content-wrapper -->
