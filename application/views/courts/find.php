<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyCoCHSZv-LGE1PUSSxYgM2htKSAIhuiF-A" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="https://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
<script type="text/javascript">
var data = <?=json_encode( $courts )?> ;
var profile_data = <?=json_encode( $profile )?> ;
var profile = {};
var map;
var markers= {};
var infoWindows = {};


function personMarker(){
	profile['LatLng'] = new google.maps.LatLng ( profile_data[0]['longitude'] , profile_data[0]['latitude'] );
	profile['marker'] = new google.maps.Marker({
			animation:google.maps.Animation.BOUNCE,
            position: profile['LatLng'],
            map: map,
            title: "You"
        });
	iconFile = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'; 
	profile['marker'].setIcon(iconFile) 

}
function init (){
	var latlng = new google.maps.LatLng ( profile_data[0]['longitude'] , profile_data[0]['latitude'] );
	var myOptions = {
	        streetViewControl: true,
	        zoom: 12,
	        center: latlng,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
			scaleControlOptions:google.maps.ControlPosition.LEFT_CENTER,		
			panControl:false
	    };

	map = new google.maps.Map(document.getElementById("map_canvas"),  myOptions);	
}

function addMarkers(){
	$(data).each(function(index){
		
		var temp = new google.maps.LatLng ( data[index]['longitude'] , data[index]['latitude'] );
		console.log( "Location - " + index + " : " +  data[index]['latitude']  + " , " +  data[index]['longitude']);
		markers[index] = new google.maps.Marker({
            position: temp,
            map: map
        });

        infoWindows[index] = new google.maps.InfoWindow({
          content:  "<b>" + data[index]['court_name'] +  "</b><br/>"  + data[index]['surface_type'] +
          '<br/>' + '<a class="btn" onclick="bookThisCourt('+data[index]['court_id'] +')">Book this Court</a>'
        });


        google.maps.event.addListener(markers[index], 'click', function() {

        	close_all();

         	infoWindows[index].open(markers[index].get('map'), markers[index]);
        });

        
	});

	
	
}
function bookThisCourt( court_id){
	var location =  '<?=base_url('courts/book/') ?>' + "?court_id=" + court_id ;
	top.location = location ;
}
function close_all(){
	for ( var subIndex in infoWindows )
	{
		 infoWindows[subIndex].close(); //console.log(subIndex);
	}
	
}

$(function(){
	
	init();
	addMarkers();
	personMarker();

});
</script>
<div class="content">
	<h3>Find Court</h3>
		<?
		/*require_once "application/libraries/EasyGoogleMap.class.php";
	
		$gm = new EasyGoogleMap('');
	
	
		
		foreach ($courts as $key => $value) {
			# code...
			$gm->SetAddress($value['longitude'] . "," . $value['latitude']);
			$gm->SetInfoWindowText($value['court_name']);
			$gm->SetSideClick($value['court_name']);
		}
	
		echo $gm->GmapsKey();
		echo $gm->MapHolder();
		echo $gm->InitJs();
		echo $gm->GetSideClick();
		echo $gm->UnloadMap();
	*/
	/*
	require_once "application/libraries/phoogle.php";
	
	$map = new PhoogleMap();
	$map->setAPIKey("AIzaSyCoCHSZv-LGE1PUSSxYgM2htKSAIhuiF-A");
	 $map->printGoogleJS(); 
	
	 $map->addAddress('208 Dingler Ave, Mooresville, NC 28115');
	  $map->addAddress('210 Doster Ave, Mooresville, NC 28115');
	  $map->addAddress('300 Dingler Ave, Mooresville, NC 28115');
	  $map->showMap();
	*/
		?>
	
	
	
	<div id="map_canvas" style="width:800px;height:400px;" ></div>
</div>


