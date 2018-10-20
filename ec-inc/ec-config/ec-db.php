<?
class DatabaseSettings {
	var $settings;
	function getSettings()
	{
		// Database variables
		// Host name
		$settings['dbhost'] = 'localhost';
		// Database name
		$settings['dbname'] = 'db_ecooby';
		// Username
		$settings['dbusername'] = 'root';
		// Password
		$settings['dbpassword'] = '';
		
		return $settings;
	}
}
class DB extends DatabaseSettings {
	var $classQuery;
	var $mysqli;
	
	var $errno = '';
	var $error = '';
	
	// Connects to the database
	function DB() {
		// Load settings from parent class
		$settings = DatabaseSettings::getSettings();
		
		// Get the main settings from the array we just loaded
		$host = $settings['dbhost'];
		$name = $settings['dbname'];
		$user = $settings['dbusername'];
		$pass = $settings['dbpassword'];
		
		// Connect to the database
		$this->mysqli = new mysqli( $host , $user , $pass , $name );
		$this->mysqli->query("SET CHARACTER SET 'utf8'");
		$this->mysqli->query("set character_set_client='utf8'");
		$this->mysqli->query("set character_set_results='utf8'");
		$this->mysqli->query("set collation_connection='utf8_general_ci'");
		$this->mysqli->query("SET NAMES utf8");
	}
	
	// Executes a database query
	function query( $query ) {
		$this->classQuery = $query;
		return $this->mysqli->query( $query );
	}
	
	function escapeString( $query ) {
		return $this->mysqli->escape_string( $query );
	}
	
	// Get the data return int result
	function numRows( $result ) {
		return $result->num_rows;
	}
	
	function lastInsertedID() {
		return $this->mysqli->insert_id;
	}
	
	// Get query using assoc method
	function fetchAssoc( $result ) {
		return $result->fetch_assoc();
	}
	
	// Gets array of query results
	function fetchArray( $result , $resultType = MYSQLI_ASSOC ) {
		return $result->fetch_array( $resultType );
	}
	
	// Fetches all result rows as an associative array, a numeric array, or both
	function fetchAll( $result , $resultType = MYSQLI_ASSOC ) {
		return $result->fetch_all( $resultType );
	}
	
	// Get a result row as an enumerated array
	function fetchRow( $result ) {
		return $result->fetch_row();
	}
	
	// Free all MySQL result memory
	function freeResult( $result ) {
		$this->mysqli->free_result($result);
	}
	
	//Closes the database connection
	function close() {
		$this->mysqli->close();
	}
	
	function sql_error() {
		if(empty($error)) {
			$errno = $this->mysqli->errno;
			$error = $this->mysqli->error;
		}
		return $errno . ' : ' . $error;
	}

}