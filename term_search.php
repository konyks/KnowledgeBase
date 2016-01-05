<?php
// term_search.php - searches for a specific term in a database
// Written by:  Serhiy Kony, December 2015

//Include functions library
require('functions.php');
//Conect to the database
include('dbconnect.php');
require('landing.php');

//Use only for admin to view other pages
if(!empty($_POST)){
	$search_term = $_POST['search'];
	$query = "SELECT * FROM glossary WHERE term LIKE '%$search_term%'";
	
	//Send the query to the database to execute
	$result = $db->query($query, MYSQLI_ASSOC);

	echo "
		<table class='table table-striped'>
		<thead>
		<tr>
		<tbody>";

	while(list($id, $term, $definition) = $result->fetch_row())
	{
		//Output all posts
		echo "<tr class='success'>";

		if ($type == 1){
			echo "
			<th><a href='kms.php?p=term_modify&id=$id&action=Delete'><span class='glyphicon glyphicon-trash'></span> Delete</a>
				<a href='kms.php?p=term_modify&id=$id&action=Edit'><span class='glyphicon glyphicon-pencil'></span> Edit</a>
			</th>";
		}

		echo "<th>$term</th>
		<th>$definition</th>
		</tr>";
	}
}

echo "<div id='editIcon'>
		<a href='kms.php?p=term_modify&action=Add'><span class='glyphicon glyphicon-pencil'></span> Add Term</a>
	  </div>
	  <h1>Comany Glossary</h1>
		<div class='row'>
		  <div class='col-lg-6'>
		  <form method='POST' data-toggle='validator' role='form'>
		    <div class='input-group'>
		      <input type='text' name='search' class='form-control' id='search' placeholder='Enter a term' required>
		    </div>
		    <div class='form-group'>
	          <button type='submit' name='btn-record' class='btn btn-success'>Search</button>
	        </div>
		    </form>
		  </div>
		</div>
";
?>