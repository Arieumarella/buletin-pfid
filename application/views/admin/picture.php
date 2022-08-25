<br>
<style>
  img{
    max-width: 30%;
    max-height: 10%;
    
  }

</style>
<section class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header ">
            <h3 class="card-title">
              <i class="fas fa-globe-asia"></i>
              Pictures
            </h3>
            <button class="float-sm-right btn btn-sm btn-light" onclick="showModal();"><i class="fa fa-plus"></i> TAMBAH DATA</button>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <?= $this->session->flashdata('psn'); ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover">
                  <thead style="background-color: #dee2e6;">
                    <tr>
                      <th>No</th>
                      <th>Picture</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($dataPicture as $key ) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td>

                          <img src="<?= base_url(); ?>assets/list_picture/<?= $key->name_pict; ?>">

                        </td>
                        <td>

                          <a href="javascript:void(0)" onclick="hapusData('<?= $key->id; ?>')" data-toggle="tooltip" data-placement="bottom" title="Delete Data" style="margin-left: 10px;"><i class="far fa-trash-alt"  style="color: #c00;"></i></a>

                        </td>
                      </tr>
                      <?php $no++;} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title">TAMBAH DATA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bg-light">
          <form id='formPict' action="<?= base_url(); ?>Admin/Picture/save" method="post" enctype='multipart/form-data'>
            <input type="hidden" id='inputCsrf' >
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group">
              <label for="name">Picture</label>
              <div class="custom-file">
                <div id="err"></div>
                <input type="file" class="custom-file-input kraje" name="pictX" id="pictX">
                <p style="color: #dd2c00; font-size: 13px;">*Gambar Harus Berukuran 1120x520 pixels.</p>
                
              </div>
            </div>

          </div>
          <div class="modal-footer  bg-light">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
          </form>
        </div>
      </div>

    </div>

  </div>


  <script type="text/javascript">
    $( document ).ready(function() {

      $("#pictX").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#err',
        allowedFileExtensions: ["jpg","JPG", "png", "PNG", "jpeg", "JPEG"]
      });

      showModal = async function () {
        $('#modal-tambah').modal('show');
        await getCsrf();
        $('#inputCsrf').attr('name', csrf.name);
        $('#inputCsrf').val(csrf.token);
      }

      $('#formPict').submit(async function() {
        await getCsrf();
        $('#inputCsrf').attr('name', csrf.name);
        $('#inputCsrf').val(csrf.token);

        if(await document.getElementById("pictX").files.length == 0 ){
          error('Gagal', 'Silakan Upload Picture terlebih dahulu.!')
          return false;
        }

        return true;

      });

      hapusData = async function (id) {

        var choice = confirm('Data yang terhapus tidak akan bisa dikembalikan.');
        if(choice === true) {

          await getCsrf();

          $.ajax({
            url: base_url()+'admin/Picture/hapus',
            type: "post",
            data: {[csrf.name]: csrf.token, id},
            dataType: 'json',
            success: function (res) {
              if (res.code == 200) {
                location.reload();
                return;
              }
              error('Gagal', res.msg)
            },
            error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
             // location.reload();
           }
         });

        }

      }

    })
  </script>

  <script type="text/javascript">

    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        bAutoWidth: false, 
        aoColumns : [
        { sWidth: '5%',"className": "text-center" },
        { sWidth: '80%', "className": "text-center"},
        { sWidth: '15%' },
        ]
      });
    });

  </script>