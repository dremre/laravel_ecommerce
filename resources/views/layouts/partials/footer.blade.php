<head>
    <style>
        #map{
            height: 300px;
            width: 50%;
        }
    </style>
</head>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">Eticaret Yazılımı 191307077@kocaeli.edu.tr & 191307078@kocaeli.edu.tr &copy; 2021</div>
            <div class="col-md-6 text-right"><a href="http://bilisim.kocaeli.edu.tr/">Kocaeli Üniversitesi BSM</a></div>
        </div>
    </div>

    <div id="map">
     <script>
         function initMap(){
             var location ={lat:40.819597,lng:29.922773}
             var map =new google.maps.Map(document.getElementById("map"),{
                 zoom:4,
                 center:location
             });
             var marker =new google.maps.Marker({
               position:location,
                 map:map
             });
         }
     </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtXSZRcViEe5rPompzWqf2hDdr1hnyo10&callback=initMap">

        </script>
    </div>
</footer>

