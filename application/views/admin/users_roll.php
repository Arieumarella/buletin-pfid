<br>
<section class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header ">
            <h3 class="card-title">
              <i class="fas fa-globe-asia"></i>
              User Roll
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
                      <th>Id</th>
                      <th>Roll Name</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($dataRoll as $key ) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key->id; ?></td>
                        <td><?= $key->name; ?></td>
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
        <div class="modal-body bg-light">
          <div class="form-group">
            <label for="roll-name">Roll Name</label>
            <input type="text" class="form-control" id="roll-name" placeholder="Enter Name.">
          </div>
        </div>
        <div class="modal-footer  bg-light">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" onclick="save()"><i class="fas fa-save"></i> Save</button>
        </div>
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
        <div class="modal-body bg-light">
          <div class="form-group">
            <label for="roll-name-edit">Roll Name</label>
            <input type="text" class="form-control" id="roll-name-edit" placeholder="Enter Name.">
            <input type="hidden" id='id-edit'>
          </div>
        </div>
        <div class="modal-footer  bg-light">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" onclick="saveEdit()"><i class="fas fa-save"></i> Save</button>
        </div>
      </div>

    </div>

  </div>

  <script type="text/javascript">
    $( document ).ready(function() {
     showModal = function () {
      $('#modal-tambah').modal('show');
    }

    hapusData = async function (id) {

      var choice = confirm('Data yang terhapus tidak akan bisa dikembalikan.');
      if(choice === true) {

        await getCsrf();

        $.ajax({
          url: base_url()+'admin/User_roll/hapus',
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

    saveEdit = async function () {

      let rollName = $('#roll-name-edit').val(),
      id = $('#id-edit').val();

      if (rollName == '') {
        error('Gagal', 'Silakan isikan kolom Roll Name terlebih dahulu.!')
        return;
      }

      if (id == '') {
        error('Gagal', 'Id Kosong.!')
        return;
      }



      await getCsrf();

      $.ajax({
        url: base_url()+'admin/User_roll/saveEdit',
        type: "post",
        data: {[csrf.name]: csrf.token, id,rollName},
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

    getEdit = async function (id) {
      await getCsrf();

      $.ajax({
        url: base_url()+'admin/User_roll/getById',
        type: "post",
        data: {[csrf.name]: csrf.token, id},
        dataType: 'json',
        success: function (res) {
          $('#roll-name-edit').val(res.name);
          $('#id-edit').val(res.id);
          $('#modal-edit').modal('show')
        },
        error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
         // location.reload();
       }
     });
    }

    save = async function () {
     let rollName = $('#roll-name').val();

     if (rollName == '') {
      error('Gagal', 'Silakan isikan kolom Roll Name terlebih dahulu.!')
      return;
    }

    await getCsrf();

    $.ajax({
      url: base_url()+'admin/User_roll/save',
      type: "post",
      data: {[csrf.name]: csrf.token, rollName},
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
      { sWidth: '5%',"className": "text-center" },
      { sWidth: '5%',"className": "text-center" },
      { sWidth: '30%' },
      { sWidth: '15%', "className": "text-center" },
      ]
    });
  });

</script>