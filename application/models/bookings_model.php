<?
require_once "application/libraries/dbConnection.php";


class bookings_model extends CI_Model {

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


    function createBookings( $post ){

        //print_r( $post);
        
        if ( $post['bookings_model']['book_duration']  == 0  )
        {
            return 0;
        }
        //need to merge the date and time because its 1 field in database
        $post['bookings_model']['booked_for'] = date( 'Y-m-d H:i:s', strtotime( $post['bookings_model']['date'] . " " .  $post['bookings_model']['time'] ) );
        unset($post['bookings_model']['date'], $post['bookings_model']['time'] );
        $bookings_model_query =array() ;
        foreach ($post['bookings_model'] as $key => $value) {
            $bookings_model_query[] =  "`".$key."` = '".mysql_real_escape_string($value)."'";
        }

        $query = "INSERT INTO `bookings_model` set 
        ".implode ( "," , $bookings_model_query)."
        ";
        //echo $query;
        mysql_query ( $query );
        return mysql_insert_id();
    }


    function getBookingsByThisGuy( $user_id ){
        return $this->database->s("SELECT * FROM bookings_model b
         join court_model c on (b.court_id = c.court_id)
         join address_model a on ( c.address_id = a.address_id)  
         join profile_model p on ( b.booked_by = p.user_id )
         where `booked_by`='$user_id' 
         
        ");
    }

}