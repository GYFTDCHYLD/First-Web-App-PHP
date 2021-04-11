<?php#####################################################
     #    /////   **    create database    **    \\\\\   #
	 #   **********  Created by: GYFTDCHYLD **********   #
	 # **G           ----------------------          C** #
	 #####################################################?>
	 

<?php //create_db.php
/* This script connects to the MySQL server. */

// Attempt to connect to MySQL and print out messages:
if ($dbc = @mysql_connect('localhost', 'root', '')) {
	
	print '<p>Successfully connected to MySQL!</p>';
	
	// Try to create the database:
	if (@mysql_query('CREATE DATABASE abc', $dbc)) {
		print '<p>The database has been created!</p>';
	} else { // Could not create it.
		print '<p style="color: red;">Could not create the database because:<br />' . mysql_error($dbc) . '.</p>';
	}
	
	// Try to select the database:
	if (@mysql_select_db('abc', $dbc)) {
		print '<p>The database has been selected!</p>';
	} else {
		print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
	}
	
	mysql_close($dbc); // Close the connection.

} else {

	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';

}

?>
</body>
</html>