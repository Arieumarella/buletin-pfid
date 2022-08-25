<section class="row tm-margin-b-l">
    <div class="col-12">
        <h2 class="tm-blue-text tm-margin-b-p">Kritik & Saran</h2>
    </div>
    <div class="col-md-6 col-sm-12 mb-md-0 mb-5 tm-overflow-auto">         
        <div class="mr-lg-5">
            <?= $this->session->flashdata('psn'); ?>
            <!-- contact form -->
            <form action="<?= base_url(); ?>Kritik/inputKritik" method="post" class="tm-contact-form">
                <div class="form-group">
                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name" required="">
                </div>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <div class="form-group">                                                        
                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">                                                        
                    <input type="text" id="hp" name="hp" class="form-control" placeholder="Telepon" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required="">
                </div>
                <div class="form-group">
                    <textarea id="contact_message" name="contact_message" class="form-control" rows="8" placeholder="Message" required=""></textarea>
                </div>
                <button type="submit" class="tm-btn tm-btn-blue float-right">Submit</button>
            </form>                          
        </div>                                       
    </div>
    <div class="col-md-6 col-sm-12">
        <p class="tm-margin-b-p">
        Jika ada kritik dan saran untuk kebaikan dan kemajuan website buletin silakan inputkan kritik dan saran pada form kritik dan saran yang tersedia pada sebelah kiri tampilan. Ada juga contact person beserta alamat pengelola website dibawah ini.</p>
        <address>
            <span class="tm-blue-text">Alamat</span><br>
            <?= $dataWebsite->address; ?><br><br>
            <div class="tm-blue-text">          
                Email : <a class="tm-blue-text" href="mailto:<?= $dataWebsite->email; ?>"><?= $dataWebsite->email; ?></a><br>
                Whatsapp : <a class="tm-blue-text" href="tel:<?= $dataWebsite->tlp; ?>"><?= $dataWebsite->tlp; ?></a><br>    
            </div>                            
        </address>

    </div>
</section>
<section class="row tm-margin-b-l">
    <div class="col-12">
        <header>
            <h4 class="tm-blue-text tm-margin-b">Maps Lokasi</h4>
        </header>
        <div id="google-map"></div>
    </div>
</section>

<script>     

            /* Google map
            ------------------------------------------------*/
            var map = '';
            var center;

            function initialize() {
                const myLatLng = { lat: -6.2366703, lng: 106.8005398 };
                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(-6.2365703, 106.7983398),
                    scrollwheel: false
                };

                map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

                google.maps.event.addDomListener(map, 'idle', function() {
                  calculateCenter();
              });

                google.maps.event.addDomListener(window, 'resize', function() {
                  map.setCenter(center);
              });

                new google.maps.Marker({
                    position: myLatLng,
                    map,
                    title: "Hello World!",
                });
            }

            function calculateCenter() {
                center = map.getCenter();
            }

            function loadGoogleMap(){
                var script = document.createElement('script');
                script.type = 'text/javascript';
                // use your own API key for Google Maps
                script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAYoYWDkkxVBzR-qMaf8zhgZhyBYXGN6bU&language=id&region=ID&libraries=places&' + 'callback=initialize';
                document.body.appendChild(script);
            } 

            $(document).ready(function(){

                // Google Map
                loadGoogleMap();  
                
                // Update the current year in copyright
                $('.tm-current-year').text(new Date().getFullYear());

            });

        </script>             