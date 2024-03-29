<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1> <i class="fas fa-file-signature fa-fw"></i> Kelola Pejabat Berwenang</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url().''; ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().''; ?>">Kelola Pejabat Berwenang</a></li>
                <li class="breadcrumb-item active">Add Pejabat Berwenang</li>
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
            <div class="col-md-3">
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Data Pejabat Berwenang</h3>
                    </div>
                    <form class="form-horiontal" action="<?php echo base_url() ?>Manajemen_pimpinan/add_data_pejabat" method="POST">
                        <!--/.card-header -->
                        <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <?php echo $this->session->flashdata('message'); ?>
                                        <!-- FORM TAMBAH DATA KELOLA ATASAN -->
                                            <div class="form-group">
                                                <label for="id_unit_kerja">Nama Pejabat Berwenang</label>
                                                <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Masukan Nama Pejabat">
                                                <?php echo form_error('user_id_pejabat', '<small class="text-danger pl-1"><i class="fas fa-exclamation-circle fa-fw"></i> ', '</small>'); ?>
                                                <input type="hidden" name="user_id_pejabat" class="form-control" id="user_id_pejabat" placeholder="id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                <a href="<?php echo base_url() . 'manajemen_pimpinan/kelola_pejabat_berwenang'; ?>" class="btn btn-default"><i class="fas fa-times fa-fw"></i>Cancel</a>
                                <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure you want to save it');"><i class="fas fa-save fa-fw"></i> Save</button>
                                </form>
                            </div>
                            </div>
                            
                        </div>    
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
<script type="text/javascript">
        $(document).ready(function(){
            $( "#nama_user" ).autocomplete({
              source: "<?php echo base_url('Manajemen_pimpinan/get_autocomplete/');?>",
              focus: function( event, ui ) {
                    $( "#nama_user" ).val( ui.item.nama_lengkap );
                    return false;
                },
              select: function (event, ui) {
                $( "#nama_user" ).val( ui.item.nama_lengkap );
                $( "#user_id_pejabat" ).val( ui.item.id_user );
                return false;
                }
            })
            .autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append( "<div>" + item.nama_lengkap + "</div>" )
                .appendTo( ul );
            };
        });
    </script>