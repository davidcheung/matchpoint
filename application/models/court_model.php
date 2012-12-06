<?
require_once "application/libraries/dbConnection.php";


class court_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
    var $database ;
    private $table_name         = 'profile_model';          // user accounts
    

    function __construct()
    {

        // Call the Model constructor
        parent::__construct();
        $this->database = new dbConnection( );

    }

    function getCourts(){
        return $this->database->s( "SELECT * FROM court_model c left join address_model a on ( a.address_id = c.address_id ) ");
    }

    function getCourtByID ( $court_id ){
        return $this->database->s( "SELECT * FROM court_model c left join address_model a on ( a.address_id = c.address_id ) where `court_id`='$court_id'");
    }

    function create_court( $post) {

        $court_model_query =array() ;
        foreach ($post['court_model'] as $key => $value) {
            $court_model_query[] =  "`".$key."` = '".mysql_real_escape_string($value)."'";
        }
        //print_r ( $court_model_query );
        $query =  "INSERT INTO court_model set 
        ".implode ( "," , $court_model_query)."
        ";

        mysql_query ( $query );
        $courtID = mysql_insert_id();


        /* -------------------- ADDRESS  -------------------- */
         $address_model_query =array() ;
        foreach ($post['address_model'] as $key => $value) {
            $address_model_query[] =  "`".$key."` = '".mysql_real_escape_string($value)."'";
        }

         mysql_query( "INSERT INTO address_model set 
        ".implode ( "," , $address_model_query)."
        ");
         $address_id = mysql_insert_id();

          mysql_query ("update court_model set `address_id`='$address_id' where  
            `court_id`='".$courtID."'");    


        $address = $post['address_model']['line1'] . ", " .
        $post['address_model']['city'] . ", " .
        $post['address_model']['province'] . ", " .
        $post['address_model']['country'] . ", " .
        $post['address_model']['postal'] ;

        $latlon = $this->get_lat_lon( $address );
        print_r ( $latlon );

        if ( $latlon['latitude'] != 0 &&   $latlon['longitude'] != 0 )
        {
            mysql_query("update `address_model` 
            set 
            `latitude`='".$latlon['latitude']."',
            `longitude`='".$latlon['longitude']."',
            `city`='".$latlon['city']."',
            `province`='".$latlon['province']."',
            `country`='".$latlon['country']."',
            `postal`='".@$latlon['postal']."'               
            where `address_id`='$address_id' ");
            
        }

    }


    function getSurfaceTypes(){
        return $this->database->s("select * from surface_type");
    }


    function get_lat_lon($address)
    {
        $address=urlencode($address);
        $api_key="";
        $url = 'http://maps.google.com/maps/geo?q='.$address.'&output=json&oe=utf8&sensor=false&key=AIzaSyCoCHSZv-LGE1PUSSxYgM2htKSAIhuiF-A';
        $data = @file_get_contents($url);
        $jsondata = json_decode($data,true);
        if(is_array($jsondata )&& $jsondata ['Status']['code']==200){
          $lat = $jsondata ['Placemark'][0]['Point']['coordinates'][0];
          $lon = $jsondata ['Placemark'][0]['Point']['coordinates'][1];

          $country = $jsondata ['Placemark'][0]['AddressDetails']['Country']['CountryName'];

          if ( is_array ( $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['SubAdministrativeArea'] ))
          {
                $province = $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['AdministrativeAreaName'];
                $city = $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['SubAdministrativeArea']['Locality']['LocalityName'];
                $postal = $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['SubAdministrativeArea']['Locality']['DependentLocality']['PostalCode']['PostalCodeNumber'];
                $line1= $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['SubAdministrativeArea']['Locality']['DependentLocality']['Thoroughfare']['ThoroughfareName'];
          }
          else{
                $province = $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['AdministrativeAreaName'];
                $city = $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['Locality']['LocalityName'];
                $postal = $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['Locality']['DependentLocality']['PostalCode']['PostalCodeNumber'];
                $line1= $jsondata ['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['SubAdministrativeArea']['Locality']['DependentLocality']['Thoroughfare']['ThoroughfareName'];
          }
          
        }

        //echo "<pre>"; print_r ( $jsondata) ; echo "</pre>";
        $array_geo=array( 
            "latitude" =>$lat, 
            "longitude"=>$lon,
            "city" => $city,
            "province" => $province,
            "country" => $country,
            "postal" => $postal
        );
        return $array_geo;
    }

}
?>