
<section class="tm-margin-b-l">
    <header>
        <h2 class="tm-main-title"><?= $dataWebsite->tittle_content; ?></h2>    
    </header>

    <p><?= $dataWebsite->decript_content; ?></p>

    <div class="tm-gallery">
        <div class="row">
            <?php foreach ($dataArticel as $key ) { ?> 
                <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                    <a href="<?= base_url(); ?>fron/getById/<?= $key->id; ?>">
                        <div class="tm-gallery-item-overlay">
                            <img src="<?= base_url(); ?>assets/imgUpload/<?= $key->pict_artikel; ?>" alt="Image" class="img-fluid tm-img-center">
                        </div>
                        <p class="tm-figcaption"><?= $key->tittle_artikel; ?></p>
                    </a>
                </figure>
            <?php } ?>
        </div>   
    </div>

    <nav class="tm-gallery-nav">
        <ul class="nav justify-content-center">
            <?= $this->pagination->create_links(); ?>
            <!-- <li class="nav-item"><a class="nav-link active" href="#">1</a></li>
            <li class="nav-item"><a class="nav-link" href="#">2</a></li>
            <li class="nav-item"><a class="nav-link" href="#">3</a></li>
            <li class="nav-item"><a class="nav-link" href="#">4</a></li> -->                    
        </ul>
    </nav>
</section>
<script type="text/javascript">
   var csrf = {};
   $(document).ready( function(){
     $.ajax({
      url:'<?= base_url(); ?>fron/updatePwngunjung',
      type: "get",
      dataType: 'json',
      success: function (res) {
        console.log(res);
    },
    error: function(jqXHR, textStatus, errorThrown) {
     console.log(textStatus, errorThrown);
         // location.reload();
     }
 });


     async function getCsrf() {
      await $.ajax({
        url: '<?= base_url(); ?>admin/Get_csrf',
        type: "get",
        dataType: 'json',
        success: async function (res) {
          csrf.name = await res.name;
          csrf.token = await res.token
      },
      error: function(jqXHR, textStatus, errorThrown) {
       console.log(textStatus, errorThrown);
   }
});
  }

})
</script>
