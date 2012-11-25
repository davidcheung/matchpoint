<?

class profile_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
    private $table_name         = 'profile_model';          // user accounts
    

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   

    function get_profile_by_userid($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

    function get_user_by_id($user_id, $activated)
    {
        $this->db->where('id', $user_id);
        $this->db->where('activated', $activated ? 1 : 0);

        $query = $this->db->get($this->table_name);
        if ($query->num_rows() == 1) return $query->row();
        return NULL;
    }

   
   function get_all ()
   {
         $query = $this->db->get($this->table_name);
        return $query->result();
   }
}

?>