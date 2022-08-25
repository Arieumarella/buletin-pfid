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
              Kritik dan Saran
            </h3>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover">
                  <thead style="background-color: #dee2e6;">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Telepon</th>
                      <th>Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($dataKritik as $key ) { ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key->name; ?></td>
                        <td><?= $key->email; ?></td>
                        <td><?= $key->hp; ?></td>
                        <td><?= $key->message; ?></td>
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


  <script type="text/javascript">
    $( document ).ready(function() {

      $("#pictX").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#err',
        allowedFileExtensions: ["jpg","JPG", "png", "PNG", "jpeg", "JPEG"]
      });

      showModal = function () {
        $('#modal-tambah').modal('show');
      }

      $('#formPict').submit(function() {


        if( document.getElementById("pictX").files.length == 0 ){
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
        { sWidth: '20%', "className": "text-center"},
        { sWidth: '20%', "className": "text-center" },
        { sWidth: '20%', "className": "text-center" },
        { sWidth: '35%', "className": "text-center" },
        ]
      });
    });

  </script>