<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <i class="fas fa-user-shield fa-fw"></i> Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Administrator</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="row">
                    <div class="col-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-signature"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cuti Tahunan</span>
                                <span class="info-box-number">
                                    <?php
                                    $nip = $this->session->userdata('nip');
                                    $query = $this->db->select('jenis_cuti_id');
                                    $query = $this->db->from('tbl_cuti_tahunan');
                                    $query = $this->db->where('tbl_cuti_tahunan.nip',$nip);
                                    $query = $this->db->get();
                                    echo $query->num_rows();
                                    ?>
                                    <small>Hari</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-clock"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cuti Besar</span>
                                <span class="info-box-number">
                                <?php
                                    $nip = $this->session->userdata('nip');
                                    $query = $this->db->select('jenis_cuti_id');
                                    $query = $this->db->from('tbl_cuti_umum');
                                    $query = $this->db->where('tbl_cuti_umum.nip',$nip);
                                    $query = $this->db->where('tbl_cuti_umum.jenis_cuti_id',2);
                                    $query = $this->db->get();
                                    echo $query->num_rows();
                                    ?>
                                    <small>Hari</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-injured"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cuti Sakit</span>
                                <span class="info-box-number">
                                    0
                                    <small>Hari</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    
                </div>
                <div class="row">
                <div class="col-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hospital-user"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cuti Melahirkan</span>
                                <span class="info-box-number">
                                    0
                                    <small>Hari</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-calendar-week"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cuti Alasan Penting</span>
                                <span class="info-box-number">
                                    0
                                    <small>Hari</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-flag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cuti Luar Tanggungan</span>
                                <span class="info-box-number">
                                    0
                                    <small>Hari</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.card -->
                <!--  -->
                <div class="row">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="col-12 col-sm-6 col-md-7">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Cuti Terakhir</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Lama</th>
                                                <th>Jenis Cuti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-12 col-sm-6 col-md-5">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Pengajuan Terakhir</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Lama</th>
                                                <th>Jenis Cuti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
            </section>
            <!-- /.content -->
            </div>
  </div>