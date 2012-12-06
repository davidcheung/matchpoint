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
    
    function createMatch(){
        
    }
   


}
?>