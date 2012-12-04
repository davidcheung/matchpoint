<?

class dbConnection 
{
	var $DBASE="";
	var $CONN="";


	
	function dbConnection() 
	{

		//the configuration is HARDCODED right here
		$databaseConfig = array (
			"host" => "localhost",
			"database" => "ci",
			"username" => "root",
			"password" => ""
		);
		




		$this->DBASE = $databaseConfig['database'];
		$conn = mysql_connect($databaseConfig['host'],$databaseConfig['username'],$databaseConfig['password']);
		if(!$conn) {
			$this->error("Connection attempt failed");
		}
		if(!mysql_select_db($databaseConfig['database'],$conn)) 
    {
			$this->error("Dbase Select failed");
		}
		$this->CONN = $conn;
		return true;
	}
	
	function close()
	{
		$conn = $this->CONN ;
		$close = mysql_close($conn);
		if(!$close) {
			$this->error("Connection close failed");
		}
		return true;
	}
	
	function error($text)
	{
		$no = mysql_errno();
		$msg = mysql_error();
		echo  $text.">>".$no.">>".$msg;
		exit;
	}
	
	function select($sql="")
	{
		if(empty($sql)) { return false; }
		if(!@eregi("^select",$sql))
		{
			$this->error("queryerror<br>".$sql."<p>");
			return false;
		}
		if(empty($this->CONN)){return false;}
		$conn = $this->CONN;
		$results = @mysql_query($sql,$conn);
		if((!$results) or (empty($results))) 
    {
			return false;
		}
		$count = 0;
		$data = array();
		while ($row = mysql_fetch_array($results))
		{
			$data[$count] = $row;
			$count++;
		}
		mysql_free_result($results);
		return $data;
	}
	function s($sql="")
	{
		if(empty($sql)) { return false; }
		if(!@eregi("^select",$sql))
		{
			$this->error("queryerror<br>".$sql."<p>");
			return false;
		}
		if(empty($this->CONN)){return false;}
		$conn = $this->CONN;
		$results = @mysql_query($sql,$conn);
		if((!$results) or (empty($results))) 
    {
			return false;
		}
		$count = 0;
		$data = array();
		while ($row = mysql_fetch_assoc($results))
		{
			$data[$count] = $row;
			$count++;
		}
		mysql_free_result($results);
		return $data;
	}
		
	function insert ($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("^insert",$sql))
		{
			return false;
		}
		if(empty($this->CONN))
		{
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		if(!$results) 
		{
			$this->error("<H2>No results!</H2>\n");
			return false;
		}
		$id = mysql_insert_id();
		return $id;
	}
	
	function edit($sql="")
	{
		if(empty($sql)) { return false; }
		if(!eregi("^update",$sql))
		{
			return false;
		}
		if(empty($this->CONN))
		{
			return false;
		}
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn);
		if(!$results) 
		{
			$this->error("<H2>No results!</H2>\n");
			return false;
		}
		$rows = 0;
		$rows = mysql_affected_rows();
		return $rows;
	}
	
	function sql_query($sql="")
	{	if(empty($sql)) { return false; }
		if(empty($this->CONN)) { return false; }
		$conn = $this->CONN;
		$results = mysql_query($sql,$conn) or die(mysql_error()."query fail");
		if(!$results)
		{   $message = "Query went bad!";
			$this->error($message);
			return false;
		}
		if(!eregi("^select",$sql)){
			return true; }
		else {
			$count = 0;
			$data = array();
			while ( $row = mysql_fetch_array($results))	{
				$data[$count] = $row;
				$count++;
			}
			mysql_free_result($results);
			return $data;
	 	}
	}
	
	
	function getfields($table)
	{
		$fields = mysql_list_fields($this->DBASE, $table, $this->CONN); 
		$columns = mysql_num_fields($fields); 

		for ($i = 0; $i < $columns; $i++) { 
		   $arr[]= mysql_field_name($fields, $i); 
		}
		return $arr;
	}
	
	function mysql_enum_values($table, $field)
	{
		$conn = $this->CONN;
		$sql = "SHOW COLUMNS FROM $table LIKE '$field'";
		$sql_res = mysql_query($sql,$conn) or die(mysql_error()."query fail");
		$row = mysql_fetch_assoc($sql_res);
		mysql_free_result($sql_res);
		return explode("','",preg_replace("/.*\('(.*)'\)/", "\\1", $row["Type"]));
	}
}
?>