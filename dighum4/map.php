    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKH2F9gZMQyATwBodQsEr-uM0fokVCvZw&callback=initMap"></script>

    <script> 
    var marker;
      function initialize() {
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
      
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
           zoom: 4,
           mapTypeId: google.maps.MapTypeId.ROADMAP
        }
      
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Fungsi mengambil data dari database
        <?php
            $query = mysqli_query($conn,"select * from tabel_lokasi");
            if(mysqli_num_rows($query) < 0){?>
               //Default Peta Jogja
               var properti_peta = {
                    center: new google.maps.LatLng(-7.797068, 110.370529), 
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var peta = new google.maps.Map(document.getElementById("map"), properti_peta);
             //end
        

        //Function Menampilkan informasi lokasi
            <?php
            }else{
            while ($data = mysqli_fetch_array($query))
            {
                $nama = mystripslashesjs($data['nama_institusi']);
                $jenis = mystripslashesjs($data['jenis_manuscript']); 
                $judul = mystripslashesjs($data['judul_manuscript']);  
                $bentuk = mystripslashesjs($data['bentuk_manuscript']);  
                $alamat = mystripslashesjs($data['alamat']);
                $lat = $data['lat'];
                $lng = $data['lng'];
                $alamat = str_replace(array("\r","\n"),"",$alamat);
                $jenis = str_replace(array("\r","\n"),"",$jenis);
                $judul = str_replace(array("\r","\n"),"",$judul);
                $bentuk = str_replace(array("\r","\n"),"",$bentuk);

                echo ("addMarker($lat, $lng, '<b>Nama : </b>$nama<br><b>Jenis Manuskrip : </b>$jenis<br><b>Judul Manuskrip : </b>$judul<br><b>Bentuk Manuskrip : </b>$bentuk<br><b>Alamat : </b>$alamat');");                 
            }
            }
          ?>
        
                // Proses membuat marker
                function addMarker(lat, lng, info) {
                    var location = new google.maps.LatLng(lat, lng);
                    bounds.extend(location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: location,
                    
                    });      
                    map.fitBounds(bounds);
                    bindInfoWindow(marker, map, infoWindow, info);
                }
            
                // Menampilkan informasi pada masing-masing marker yang dihover
                function bindInfoWindow(marker, map, infoWindow, html) {
                google.maps.event.addListener(marker, 'mouseover', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(map, marker);
                });
                }

                }
            google.maps.event.addDomListener(window, 'load', initialize);

            </script>