V

<?php
 
class search {
 
  private $mysql;
 


 

  public function __construct() {
 

    // Connect to our database and store in $mysql property
 

    $this->connect();
 

  }
 
 
  private function connect() {
 
$servername = “192.168.200.185”;

$username = “recipuser”;

$password = “d13acc!481”;

//connecting to MySql database  //

$db = mysql_connect($servername,$username,$password);
if (!$db) {
die("Database connection failed miserably: " . mysql_error());
 	}

//Select the database, will be using the recipe database //

 	$db_select = mysql_select_db("recipindex",$db);
 	if (!$db_select) {
 	die("Database selection also failed miserably: " . mysql_error());
 	}


  }
 

 

  public function search($search_term) {
 

    // Sanitize the search term to prevent injection attacks
 

    $sanitized = $this->mysql->real_escape_string($search_term);
 

    
 

    // Run the query
 

    $query = $this->mysql->query("
 

      SELECT title
 

      FROM search
 

      WHERE title LIKE '%{$sanitized}%'
 

      OR body LIKE '%{$sanitized}%'
 

    ");
 

    
 

    // Check results
 

    if ( ! $query->num_rows ) {
 

      return false;
 

    }
 

    
 

    // Loop and fetch objects
 

    while( $row = $query->fetch_object() ) {
 

      $rows[] = $row;
 

    }
 

    
 

    // Build our return result
 

    $search_results = array(
 

      'count' => $query->num_rows,
 

      'results' => $rows,
 

    );
 

    
 

    return $search_results;
 

  }
 

}
 
