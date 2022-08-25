<style type="text/css">
    @media (min-width: 768px) {
      .modal-xl {
        width: 95%;
        max-width:1200px;
    }

    @media {
        ._df_button {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            display: inline-block;
            font-size: 1.2rem;
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            width: 160px;
            cursor:pointer;
        }
    }

    hr.vertical-line{ border:  solid #076599; margin-top: -12px;
      border-radius: 5px; }
  }
</style>
<section class="row tm-item-preview">
    <div class="col-md-6 col-sm-12 mb-md-0 mb-5">
        <img style="width: 480px; height: 720px;" src="<?= base_url(); ?>assets/imgUpload/<?= $dataDetail->pict_artikel; ?>" alt="Image" class="img-fluid updateViewrs tm-img-center-sm _df_thumb" source="<?= base_url(); ?>assets/fileBuletin/<?= $dataDetail->file; ?>">
    </div>
    <div class="col-md-6 col-sm-12">
        <h2 class="tm-blue-text tm-margin-b-p"><?= $dataDetail->tittle_artikel; ?></h2>
        <p class="tm-margin-b-p"><?= $dataDetail->descript_artikel; ?></p>
        <br>
        <p class="tm-blue-text tm-margin-b-s">Views: <?= $dataDetail->viwers; ?></p>
        <p class="tm-blue-text tm-margin-b">Edisi: <?= $dataDetail->edisi; ?></p>
        <a href="#" class="tm-btn tm-btn-gray tm-margin-r-20 updateViewrs tm-margin-b-s _df_button" source="<?= base_url();  ?>assets/fileBuletin/<?= $dataDetail->file; ?>">Preview</a>
        <a href="<?= base_url(); ?>fron/Download/<?= $dataDetail->file; ?>" class="tm-btn tm-btn-blue">Download</a>
    </div>
</section>
<br>
<section class="row tm-item-preview">
  <div class="col-md-12 col-sm-12 mb-md-0 mb-5" id="disqus_thread">


  </div>  
</section>
<div class="tm-gallery no-pad-b text-center">
    <div class="row" style="text-align:center">
        <div class="col-md-12 col-sm-12">
            <header class="text-center" style="text-align:center">
                <h4 class="tm-blue-text tm-margin-b text-center" style="text-align:center; "><b>Other Buletin</b></h4>
                <hr class="vertical-line">
            </header>
        </div>
    </div>
    <div class="row">
        <?php foreach ($listArticle as $key) { ?>
            <figure class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item mb-5">
                <a href="<?= base_url(); ?>fron/getById/<?= $key->id; ?>">
                    <div class="tm-gallery-item-overlay">
                        <img src="<?= base_url(); ?>assets/imgUpload/<?= $key->pict_artikel; ?>" alt="Image" class="img-fluid tm-img-center">
                    </div>
                    <p class="tm-figcaption no-pad-b"><?= $key->tittle_artikel; ?></p>
                </a>
            </figure>
        <?php } ?>
    </div>   
</div>


<div class="modal fade" id="modalContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body" id="modalBody">
    <div class="_df_book" height="500" webgl="true" backgroundcolor="teal"
    source="<?= base_url();  ?>assets/fileBuletin/<?= $dataDetail->file; ?>"
    id="df_manual_book">
</div>
</div>
</div>
</div>
</div>

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://buletin-pfid.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


<script type="text/javascript">
    $( document ).ready(function() {
        DFLIP.defaults.backgroundColor = "gray";

        $( ".updateViewrs" ).click(function() {
         var idArticel = '<?= $idArticle; ?>';
         $.ajax({
          url:'<?= base_url(); ?>fron/updateArticleView/'+idArticel,
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
     });

    });
</script>