<br>
<section class="content ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header ">
            <h3 class="card-title">
              <i class="fas fa-globe-asia"></i>
              Website Information
            </h3>
            <button class="float-sm-right btn btn-sm btn-light" onclick="showModal();"><i class="fa fa-edit" ></i> UBAH DATA</button>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <?= $this->session->flashdata('psn'); ?>
              </div>
            </div>
            <dl class="row">
              <dt class="col-sm-4">Header Tittle</dt>
              <dd class="col-sm-8"><?= $main_data->header_tittle; ?></dd>
              <dt class="col-sm-4">Header Descript</dt>
              <dd class="col-sm-8"><?= $main_data->header_descript; ?></dd>
              <dt class="col-sm-4">Content Tittle</dt>
              <dd class="col-sm-8"><?= $main_data->tittle_content; ?></dd>
              <dt class="col-sm-4">Content Descript</dt>
              <dd class="col-sm-8"><?= $main_data->decript_content; ?></dd>
              <dt class="col-sm-4">Address</dt>
              <dd class="col-sm-8"><?= $main_data->address; ?></dd>
              <dt class="col-sm-4">Email</dt>
              <dd class="col-sm-8"><?= $main_data->email; ?></dd>
              <dt class="col-sm-4">Telepon</dt>
              <dd class="col-sm-8"><?= $main_data->tlp; ?></dd>
            </dl>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>

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
          <label for="header-tittle">Header Tittle</label>
          <input type="text" class="form-control" id="header-tittle" placeholder="Enter Tittle.">
        </div>
        <div class="form-group">
          <label for="header-descript">Descript Tittle</label>
          <textarea class="form-control" rows="2" id="header-descript" placeholder="Enter Descript..."></textarea>
        </div>
        <div class="form-group">
          <label for="content-tittle">Content Tittle</label>
          <input type="text" class="form-control" id="content-tittle" placeholder="Enter Tittle.">
        </div>
        <div class="form-group">
          <label for="content-descript">Descript Content</label>
          <textarea class="form-control" rows="2" id="content-descript" placeholder="Enter Descript..."></textarea>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email.">
        </div>
        <div class="form-group">
          <label for="tlp">Telepon</label>
          <input type="text" class="form-control" id="tlp" placeholder="Enter Telepon." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea class="form-control" rows="3" id="address" placeholder="Enter Address..."></textarea>
        </div>
      </div>
      <div class="modal-footer  bg-light">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" onclick="save()"><i class="fas fa-save"></i> Save</button>
      </div>
    </div>

  </div>

</div>

<script type="text/javascript">
  $( document ).ready(function() {    

    showModal = async function () {

      await getCsrf();


      $.ajax({
        url: base_url()+'admin/Main_data/getData',
        type: "post",
        data: {[csrf.name]: csrf.token,},
        dataType: 'json',
        success: function (res) {
          $('#header-tittle').val(res.header_tittle);
          $('#header-descript').val(res.header_descript);
          $('#content-tittle').val(res.tittle_content);
          $('#content-descript').val(res.decript_content);
          $('#email').val(res.email);
          $('#tlp').val(res.tlp);
          $('#address').val(res.address);
        },
        error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
         // location.reload();
       }
     });
      $('#modal-edit').modal('show');
    }


    save = async function save() {
      let  headerTittle = $('#header-tittle').val(),
      headerDescript = $('#header-descript').val(),
      contentTittle = $('#content-tittle').val(),
      contentDescript = $('#content-descript').val(),
      email = $('#email').val(),
      tlp = $('#tlp').val(),
      address = $('#address').val();

      if (headerTittle == '') {
        error('Gagal', 'Silakan isikan kolom Header Tittle terlebih dahulu.!')
        return;
      }

      if (headerDescript == '') {
        error('Gagal', 'Silakan isikan kolom Descript Tittle terlebih dahulu.!')
        return;
      }

      if (contentTittle == '') {
        error('Gagal', 'Silakan isikan kolom Content Tittle terlebih dahulu.!')
        return;
      }

      if (contentDescript == '') {
        error('Gagal', 'Silakan isikan kolom Descript Content terlebih dahulu.!')
        return;
      }

      if (email == '') {
        error('Gagal', 'Silakan isikan kolom Email terlebih dahulu.!')
        return;
      }

      if (tlp == '') {
        error('Gagal', 'Silakan isikan kolom Email terlebih dahulu.!')
        return;
      }

      if (address == '') {
        error('Gagal', 'Silakan isikan kolom Address terlebih dahulu.!')
        return;
      }


      await getCsrf();

      $.ajax({
        url: base_url()+'admin/Main_data/save',
        type: "post",
        data: {[csrf.name]: csrf.token, headerTittle,headerDescript,contentTittle,contentDescript,email,tlp,address},
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