<br>
<section class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header ">
            <h3 class="card-title">
              <i class="fas fa-globe-asia"></i>
              Data Article
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
                      <th>Tittle Article</th>
                      <th>Descript Article</th>
                      <th>Edisi</th>
                      <th>Photo</th>
                      <th>File</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($dataArticle as $key ) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key->tittle_artikel; ?></td>
                        <td><?= $key->descript_artikel; ?></td>
                        <td><?= $key->edisi; ?></td>
                        <td> <img src="<?=  base_url(); ?>assets/imgUpload/<?= $key->pict_artikel; ?>" width="100%" height="100%"></td>
                        <td><a href="<?=  base_url(); ?>assets/fileBuletin/<?= $key->file; ?>"><i class="far fa-file-pdf fa-2x" style="color:red;"></i></a></td>
                        <td>

                          <a href="javascript:void(0)" onclick="getEdit('<?= $key->id; ?>')" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i class="far fa-edit" style="color: #17a2b8;"></i></a>

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
        <form id="form-Tambah-Data" action="<?= base_url(); ?>admin/Article/save" method="POST" enctype='multipart/form-data'>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
          <div class="modal-body bg-light">
            <div class="form-group">
              <label for="name">Tittle Article</label>
              <input type="text" class="form-control" id="t_article" name="t_article" placeholder="Enter Tittle.">
            </div>
            <div class="form-group">
              <label for="username">Descript Article</label>
              <input type="text" class="form-control" id="d_article" name="d_article" placeholder="Enter Descript.">
            </div>
            <div class="form-group">
              <label for="username">Edisi</label>
              <input type="text" class="form-control" id="edisi" name="edisi" placeholder="Enter Edisi.">
            </div>
            <div class="form-group">
              <label for="username">Cover Articel</label>
              <div class="custom-file">
                <div id="err1"></div>
                <input type="file" class="custom-file-input kraje" name="coverArticel" id="coverArticel">
                <p style="color: #dd2c00; font-size: 13px;">*Gambar Harus Berukuran 480x720 pixels.</p>
              </div>
            </div>
            <div class="form-group">
              <label for="username">File Articel</label>
              <div class="custom-file">
                <div id="err2"></div>
                <input type="file" class="custom-file-input kraje" name="fileArticel" id="fileArticel">
                <p style="color: #dd2c00; font-size: 13px;">*Only File Pdf.</p>
              </div>
            </div>
          </div>
          <div class="modal-footer  bg-light">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
          </div>
        </form>
      </div>

    </div>

  </div>

  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title">EDIT DATA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-Tambah-Data2" action="<?= base_url(); ?>admin/Article/saveEdit" method="POST" enctype='multipart/form-data'>

          <div class="modal-body bg-light">
            <div class="form-group">
              <label for="name">Tittle Article</label>
              <input type="text" class="form-control" id="t_articleEdit" name="t_article" placeholder="Enter Tittle.">
              <input type="hidden" name="id" id="id" value="">
              <input type="hidden" id="csrfX" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
            </div>
            <div class="form-group">
              <label for="username">Descript Article</label>
              <input type="text" class="form-control" id="d_articleEdit" name="d_article" placeholder="Enter Descript.">
            </div>
            <div class="form-group">
              <label for="username">Edisi</label>
              <input type="text" class="form-control" id="edisiEdit" name="edisi" placeholder="Enter Edisi.">
            </div>
            <div class="form-group">
              <label for="username">Cover Articel</label>
              <div class="custom-file">
                <div id="err3"></div>
                <input type="file" class="custom-file-input kraje" name="coverArticel" id="coverArticel2">
                <p style="color: #dd2c00; font-size: 13px;">*Gambar Harus Berukuran 480x720 pixels.</p>
              </div>
            </div>
            <div class="form-group">
              <label for="username">File Articel</label>
              <div class="custom-file">
                <div id="err4"></div>
                <input type="file" class="custom-file-input kraje" name="fileArticel" id="fileArticel2">
                <p style="color: #dd2c00; font-size: 13px;">*Only File Pdf.</p>
              </div>
            </div>
          </div>
          <div class="modal-footer  bg-light">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
          </div>
        </form>
      </div>

    </div>

  </div>

  <script type="text/javascript">
    $( document ).ready(function() {


      getEdit = async function (id) {
        await getCsrf();

        $.ajax({
          url: base_url()+'admin/Article/getById',
          type: "post",
          data: {[csrf.name]: csrf.token, id},
          dataType: 'json',
          success: function (res) {

            $('#t_articleEdit').val(res.tittle_artikel);
            $('#d_articleEdit').val(res.descript_artikel);
            $('#edisiEdit').val(res.edisi);
            $('#id').val(res.id);
            renuwCsrf();
            $('#modal-edit').modal('show')
          },
          error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
           // location.reload();
         }
       });
      }

      $('#form-Tambah-Data2').submit(function() {

       let t_article = $('#t_articleEdit').val(),
       d_article = $('#d_articleEdit').val(),
       edisi = $('#edisiEdit').val();
       

       if (t_article == '') {
        error('Gagal', 'Silakan isikan kolom Tittle Article terlebih dahulu.!')
        return false;
      }

      if (d_article == '') {
        error('Gagal', 'Silakan isikan kolom Descript Article terlebih dahulu.!')
        return false;
      }

      if (edisi == '') {
        error('Gagal', 'Silakan isikan kolom Edisi terlebih dahulu.!')
        return false;
      }

      
      return true;

    });

      async function renuwCsrf() {
        await  getCsrf();
        await $('#csrfX').attr('name', csrf.name);
        await $('#csrfX').val(csrf.token);
      }

      $('#form-Tambah-Data').submit(function() {

       let t_article = $('#t_article').val(),
       d_article = $('#d_article').val(),
       edisi = $('#edisi').val();


       if (t_article == '') {
        error('Gagal', 'Silakan isikan kolom Tittle Article terlebih dahulu.!')
        return false;
      }

      if (d_article == '') {
        error('Gagal', 'Silakan isikan kolom Descript Article terlebih dahulu.!')
        return false;
      }

      if (edisi == '') {
        error('Gagal', 'Silakan isikan kolom Edisi terlebih dahulu.!')
        return false;
      }

      if( document.getElementById("coverArticel").files.length == 0 ){
        error('Gagal', 'Silakan Upload Cover Articel terlebih dahulu.!')
        return false;
      }

      if( document.getElementById("fileArticel").files.length == 0 ){
        error('Gagal', 'Silakan Upload File Articel terlebih dahulu.!')
        return false;
      }

    });

      $("#coverArticel").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#err1',
        allowedFileExtensions: ["jpg","JPG", "png", "PNG", "jpeg", "JPEG"]
      });

      $("#coverArticel2").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#err3',
        allowedFileExtensions: ["jpg","JPG", "png", "PNG", "jpeg", "JPEG"]
      });

      $("#fileArticel").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#err2',
        allowedFileExtensions: ['pdf','PDF']
      });

      $("#fileArticel2").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#err4',
        allowedFileExtensions: ['pdf','PDF']
      });

      showModal = function () {
        $('#modal-tambah').modal('show');
      }

      hapusData = async function (id) {

        var choice = confirm('Data yang terhapus tidak akan bisa dikembalikan.');
        if(choice === true) {

          await getCsrf();

          $.ajax({
            url: base_url()+'admin/Article/hapus',
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
    });
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
        { sWidth: '2%',"className": "text-center" },
        { sWidth: '20%',},
        { sWidth: '20%' },
        { sWidth: '10%' },
        { sWidth: '10%' },
        { sWidth: '20%' },
        { sWidth: '15%', "className": "text-center" },
        ]
      });
    });

  </script>