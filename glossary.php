<?php
// glossary.php- displays glossary page
// Written by:  Serhiy Kony, December 2015

//Connect to the database
include('dbconnect.php');

//Include a search scrip
include('term_search.php');

//Verify that the program was called from kms.php
require('landing.php');

//Create a query
$query = "SELECT id, term, definition 
		FROM glossary
		ORDER BY term";

//Send the query to the database to execute
$result = $db->query($query, MYSQLI_ASSOC);

//Check if there are any terms in the table				
if(empty($result))
{
	//Display a warning message
	echo "
		<div class='alert alert-danger'>
   			 <strong>Warning</strong> There is no terms to display.
  		</div>";
} 
else{
  //Display all available terms
	echo "
	<table class='table table-striped'>
    <thead>
      <tr>";
    //Display action only for the administrator
    if($type == 1){
    	echo "<th>Action</th>";
    }  
  
    echo "<th>Term</th>
        <th>Definition</th>
      </tr>
    </thead>
    <tbody>";

  //List all terms
	while(list($id, $term, $definition) = $result->fetch_row())
	{
		//Output all posts
		echo "<tr>";

    //Display only for the administrator
		if ($type == 1){
			echo "<th><a href='kms.php?p=term_modify&id=$id&action=Delete'><span class='glyphicon glyphicon-trash'></span> Delete</a>
       		    	<a href='kms.php?p=term_modify&id=$id&action=Edit'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
       		    </th>";
		}

    echo "<th>$term</th>
   		    <th>$definition</th>
  		  </tr>";
	}

	echo "
	</tbody>
  	</table>";
}
?>