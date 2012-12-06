<?
require_once "application/libraries/dbConnection.php";


class matches_model extends CI_Model {

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
    
    function createMatch($post){
        print_r ( $post );

        $matches_model_query =array() ;
        foreach ($post['matches_model'] as $key => $value) {
            $matches_model_query[] =  "`".$key."` = '".mysql_real_escape_string($value)."'";
        }
        //print_r ( $court_model_query );
        $query =  "INSERT INTO matches_model set 
        ".implode ( "," , $matches_model_query)."
        ";

        mysql_query ( $query );
        $matchID = mysql_insert_id();

        echo " Match id = " .$matchID;
        mysql_query( "INSERT INTO matches_players set `match_id` = '$matchID' , `user_id`='".$post['matches_model']['match_creator']."'");
        mysql_query( "INSERT INTO matches_players set `match_id` = '$matchID' , `user_id`='".$post['playerSelection']."'");

        redirect( 'matches/history');
    }
   
    function getMatches_related_to_this_person( $user_id ){
        $res =  $this->database->s(
            "SELECT * FROM matches_players mp 
            inner join matches_model m on (m.match_id = mp.match_id )
            inner join bookings_model b on ( m.bookings_id = b.bookings_id)
            inner join court_model c on ( b.court_id = c.court_id )
            where `user_id` = '$user_id '"
        );
        foreach ($res as $key => $value) {
                
            $res[$key]['players'] = $this->database->s("select * from 
            matches_players mp 
            inner join profile_model p on (p.`user_id`=mp.user_id)
            where `match_id`='".$value['match_id']."'");
        }
        return $res;
        
    }


}
?>