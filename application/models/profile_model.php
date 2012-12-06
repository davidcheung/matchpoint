<?
require_once "application/libraries/dbConnection.php";


class profile_model extends CI_Model {

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
    
   

    function get_profile_by_userid($user_id)
	{
		/*$query = $this->db->get($this->table_name);
        $this->db->where('user_id', $user_id);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;*/
        $result = $this->database->s ( "SELECT *, p.address_id 
            FROM 
            profile_model p 
            left join address_model a on (a.address_id  = p.address_id)
            where `user_id`='$user_id'");

        if ( count ( $result) > 0) {
            return $result;    
        }
        else{
            mysql_query("INSERT into profile_model set `user_id`='$user_id'");
             $result = $this->database->s ( "SELECT *, p.address_id 
            FROM 
            profile_model p 
            left join address_model a on (a.address_id  = p.address_id)
            where `user_id`='$user_id'");
             return $result;
        }
        
	}


    function get_user_by_id($user_id)
    {
        return $this->database->s (  "SELECT * FROM users where `id`='".$user_id."'");
    }

   
   function get_all()
   {
        /* $query = $this->db->get($this->table_name);
        return $query->result();*/
        return $this->database->s(  "SELECT a.* ,p.*, u.`email` FROM 
        users u          
        inner join `profile_model` p on (p.user_id = u.id) 
        left join `address_model` a on (a.address_id = p.address_id) 
        ");
   }


   function update_profile( $post ){

        $profile_model_query =array() ;
        foreach ($post['profile_model'] as $key => $value) {
            $profile_model_query[] =  "`".$key."` = '".mysql_real_escape_string($value)."'";
        }

        
        mysql_query("UPDATE profile_model 
        set
        ".implode ( "," , $profile_model_query)."
        where  
        `user_id`='".$_POST['user_id']."'") or die ( mysql_error() );


        $address_model_query =array() ;
        foreach ($post['address_model'] as $key => $value) {
            $address_model_query[] =  "`".$key."` = '".mysql_real_escape_string($value)."'";
        }


        $address_changed = false;
        if ( $post['profile_model']['address_id'] > 0 )
        {   
            $address_id = $post['profile_model']['address_id'];
             mysql_query( "UPDATE address_model set 
            ".implode ( "," , $address_model_query)."
            where `address_id`='".$address_id."'
            ");

            if ( mysql_affected_rows() > 0 )
            {
                $address_changed = true;
            }

        }
        else{
            //new address record
            
            
            mysql_query( "INSERT INTO address_model set 
            ".implode ( "," , $address_model_query)."
            ");

            $address_id = mysql_insert_id();


            mysql_query ("update profile_model set `address_id`='$address_id' where  
            `user_id`='".$_POST['user_id']."'");


            if ( mysql_affected_rows() > 0 )
            {
                $address_changed = true;                
            }

        }


        //renew the longitude / latitude 
        if ( $address_changed )
        {
            $address = $post['address_model']['line1'] . ", " .
            $post['address_model']['city'] . ", " .
            $post['address_model']['province'] . ", " .
            $post['address_model']['country'] . ", " .
            $post['address_model']['postal'] ;
            $latlon = $this->get_lat_lon( $address );
            //print_r ( $latlon );

            if ( $latlon['latitude'] != 0 &&   $latlon['longitude'] != 0 )
            {
                mysql_query("update `address_model` 
                set 
                `latitude`='".$latlon['latitude']."',
                `longitude`='".$latlon['longitude']."'                
                where `address_id`='$address_id' ");
                /*
                `city`='".$latlon['city']."',
                `province`='".$latlon['province']."',
                `country`='".$latlon['country']."',
                `postal`='".$latlon['postal']."'
                 */
            }
        }
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