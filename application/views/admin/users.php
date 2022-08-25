<br>
<section class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header ">
            <h3 class="card-title">
              <i class="fas fa-globe-asia"></i>
              Users
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
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Telepon</th>
                      <th>Roll Access</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($dataUser as $key ) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key->name; ?></td>
                        <td><?= $key->username; ?></td>
                        <td><?= $key->tlp; ?></td>
                        <td><?= $key->rollNamae; ?></td>
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
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name.">
          </div>
          <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" id="username" placeholder="Enter Username.">
          </div>
          <div class="form-group">
            <label for="tlp">Telepon</label>
            <input type="text" class="form-control" id="tlp" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Enter Telepon.">
          </div>
          <div class="form-group">
            <label for="roll">Pilih Roll</label>
            <select class="form-control" id="roll">
             <option value="" selected disabled>-- Pilih Roll --</option>
             <?php foreach ($dataRoll as $key ) { ?>   
              <option value="<?= $key->id ?>"><?= $key->name; ?></option>
            <?php } ?> 
          </select>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter Password.">
        </div>
        <div class="form-group">
          <label for="RePassword">Repeat Password</label>
          <input type="password" class="form-control" id="RePassword" placeholder="Enter Password.">
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
          <label for="nameEdit">Name</label>
          <input type="text" class="form-control" id="nameEdit" placeholder="Enter Name.">
          <input type="hidden" id="id">
        </div>
        <div class="form-group">
          <label for="usernameEdit">User Name</label>
          <input type="text" class="form-control" id="usernameEdit" placeholder="Enter Username.">
        </div>
        <div class="form-group">
          <label for="tlpEdit">Telepon</label>
          <input type="text" class="form-control" id="tlpEdit" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Enter Telepon.">
        </div>
        <div class="form-group">
          <label for="roll">Pilih Roll</label>
          <select class="form-control" id="rollEdit">

          </select>
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

    var objGlobal = [];

    <?php foreach ($dataRoll as $key) { ?>

      objGlobal.push({"value":'<?= $key->id; ?>', "name":'<?= $key->name; ?>'})

    <?php } ?>


    showModal = function () {
      $('#modal-tambah').modal('show');
    }

    hapusData = async function (id) {

      var choice = confirm('Data yang terhapus tidak akan bisa dikembalikan.');
      if(choice === true) {

        await getCsrf();

        $.ajax({
          url: base_url()+'admin/Users/hapus',
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

      let nameEdit = $('#nameEdit').val(),
      id = $('#id').val(),
      usernameEdit = $('#usernameEdit').val(),
      tlpEdit = $('#tlpEdit').val(),
      rollEdit = $('#rollEdit option:selected').val();


      if (nameEdit == '') {
        error('Gagal', 'Silakan isikan kolom Roll Name terlebih dahulu.!')
        return;
      }

      if (id == '') {
        error('Gagal', 'Id Kosong.!')
        return;
      }

      if (usernameEdit == '') {
        error('Gagal', 'Silakan isikan kolom Username terlebih dahulu.!')
        return;
      }

      if (tlpEdit == '') {
        error('Gagal', 'Silakan isikan kolom Telepon terlebih dahulu.!')
        return;
      }

      if (rollEdit == '') {
        error('Gagal', 'Silakan Pilih Roll terlebih dahulu.!')
        return;
      }

      await getCsrf();

      $.ajax({
        url: base_url()+'admin/Users/saveEdit',
        type: "post",
        data: {[csrf.name]: csrf.token, nameEdit,usernameEdit,tlpEdit,rollEdit,id},
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
        url: base_url()+'admin/Users/getById',
        type: "post",
        data: {[csrf.name]: csrf.token, id},
        dataType: 'json',
        success: function (res) {

          $('#nameEdit').val(res.name);
          $('#usernameEdit').val(res.username);
          $('#tlpEdit').val(res.tlp);
          $('#id').val(res.id);
          setOpt(res.user_roll);
          $('#modal-edit').modal('show')
        },
        error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
         // location.reload();
       }
     });
    }

    save = async function () {
     let name = $('#name').val(),
     username = $('#username').val(),
     tlp = $('#tlp').val(),
     password = $('#password').val(),
     RePassword = $('#RePassword').val(),
     roll = $('#roll option:selected').val();

     if (name == '') {
      error('Gagal', 'Silakan isikan kolom Name terlebih dahulu.!')
      return;
    }

    if (username == '') {
      error('Gagal', 'Silakan isikan kolom Username terlebih dahulu.!')
      return;
    }

    if (tlp == '') {
      error('Gagal', 'Silakan isikan kolom Telepon terlebih dahulu.!')
      return;
    }

    if (password == '') {
      error('Gagal', 'Silakan isikan kolom Password terlebih dahulu.!')
      return;
    }

    if (RePassword == '') {
      error('Gagal', 'Silakan isikan kolom Repeat Password terlebih dahulu.!')
      return;
    }

    if (roll == '') {
      error('Gagal', 'Silakan Pilih Roll Access terlebih dahulu.!')
      return;
    }

    if (password != RePassword) {
      error('Gagal', 'Password tidak cocok silakan inputkan password yang cocok.!')
      return;
    }

    await getCsrf();

    $.ajax({
      url: base_url()+'admin/Users/save',
      type: "post",
      data: {[csrf.name]: csrf.token, name, username, tlp, password, RePassword, roll},
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

  async function setOpt(roll) {
   let  html = `<option value="" selected disabled>-- Pilih Roll --</option>`;

   const isLargeNumber = (element) => element.value == roll;
   var indexArr = await objGlobal.findIndex(isLargeNumber);

   for (var key in objGlobal) {
    var value = objGlobal[key];
    cek = value.value == objGlobal[indexArr].value ? 'selected' : '';
    html += `<option value="`+value.value+`" `+cek+`>`+value.name+`</option>`;
  }

  $('#rollEdit').html(html)
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
      { sWidth: '5%',},
      { sWidth: '30%' },
      { sWidth: '30%' },
      { sWidth: '30%' },
      { sWidth: '15%', "className": "text-center" },
      ]
    });
  });

</script>