<?php#####################################################
     #    /////   **    create db tables   **    \\\\\   #
	 #   **********  Created by: GYFTDCHYLD **********   #
	 # **G           ----------------------          C** #
	 #####################################################?>
<?php //  create_table.php 
/* This script connects to the MySQL server, selects the database, and creates a table. */

// Connect and select:
if ($dbc = @mysql_connect('localhost', 'root', '')) {
	
	// Handle the error if the database couldn't be selected:
	if (!@mysql_select_db('abc', $dbc)) {
		print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
		mysql_close($dbc);
		$dbc = FALSE;
	}

} else { // Connection failure.
	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';
}

if ($dbc) {

	// Define the query:
	$query = 'CREATE TABLE shedules (
	entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(5) NOT NULL,
name VARCHAR(100) NOT NULL,
contact VARCHAR(15) NOT NULL UNIQUE KEY,
location VARCHAR(100) NOT NULL,
destination VARCHAR(100),
time VARCHAR(10) NOT NULL,
date VARCHAR(100) NOT NULL,
date_entered DATETIME NOT NULL
)';
	
	// Execute the query:
	if (@mysql_query($query, $dbc)) {
		print '<p>The table has been created!</p>';
	} else {
		print '<p style="color: red;">Could not create the table because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
		
	mysql_close($dbc); // Close the connection.

}
?>

<?PHP
// Connect and select:
if ($dbc = @mysql_connect('localhost', 'root', '')) {
	
	// Handle the error if the database couldn't be selected:
	if (!@mysql_select_db('abc', $dbc)) {
		print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
		mysql_close($dbc);
		$dbc = FALSE;
	}

} else { // Connection failure.
	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';
}

if ($dbc) {
// Define the query:
	$query = 'CREATE TABLE quick_cab (
	msg_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
sender VARCHAR(20) NOT NULL,
contact VARCHAR(10) NOT NULL,
message VARCHAR(250) NOT NULL,
message_admin VARCHAR(250) NOT NULL,
driver_response VARCHAR(250),
driver_id VARCHAR(30),
drvr_pass VARCHAR(100),
time_entered VARCHAR(30),
driver_time_stamp VARCHAR(30)
)';
	
	// Execute the query:
	if (@mysql_query($query, $dbc)) {
		print '<p>The table has been created!</p>';
	} else {
		print '<p style="color: red;">Could not create the table because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
		
	mysql_close($dbc); // Close the connection.
}
?>


<?PHP
// Connect and select:
if ($dbc = @mysql_connect('localhost', 'root', '')) {
	
	// Handle the error if the database couldn't be selected:
	if (!@mysql_select_db('abc', $dbc)) {
		print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
		mysql_close($dbc);
		$dbc = FALSE;
	}

} else { // Connection failure.
	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';
}

if ($dbc) {

	// Define the query:
	$query = 'CREATE TABLE users (
	user_id VARCHAR(15) NOT NULL PRIMARY KEY,
	title VARCHAR(5) NOT NULL,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
email VARCHAR(50) NOT NULL,
uzr_name VARCHAR(30) NOT NULL,
password VARCHAR(100) NOT NULL,
car_id VARCHAR(10) NOT NULL,
date_entered DATETIME NOT NULL,
activated VARCHAR(10) NOT NULL,
admin VARCHAR(10) NOT NULL
)';
	
	// Execute the query:
	if (@mysql_query($query, $dbc)) {
		print '<p>The table has been created!</p>';
	} else {
		print '<p style="color: red;">Could not create the table because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
		
	mysql_close($dbc); // Close the connection.

}
?>


<?PHP
// Connect and select:
if ($dbc = @mysql_connect('localhost', 'root', '')) {
	
	// Handle the error if the database couldn't be selected:
	if (!@mysql_select_db('abc', $dbc)) {
		print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
		mysql_close($dbc);
		$dbc = FALSE;
	}

} else { // Connection failure.
	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';
}

if ($dbc) {

	// Define the query:
	$query = 'CREATE TABLE feedback (
	entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(5) NOT NULL,
name VARCHAR(20) NOT NULL,
response VARCHAR(10) NOT NULL,
comment VARCHAR(250) NOT NULL,
date_entered DATETIME NOT NULL
)';
	
	// Execute the query:
	if (@mysql_query($query, $dbc)) {
		print '<p>The table has been created!</p>';
	} else {
		print '<p style="color: red;">Could not create the table because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
		
	mysql_close($dbc); // Close the connection.

}
?>

<?php //  create_table.php 
/* This script connects to the MySQL server, selects the database, and creates a table. */

// Connect and select:
if ($dbc = @mysql_connect('localhost', 'root', '')) {
	
	// Handle the error if the database couldn't be selected:
	if (!@mysql_select_db('abc', $dbc)) {
		print '<p style="color: red;">Could not select the database because:<br />' . mysql_error($dbc) . '.</p>';
		mysql_close($dbc);
		$dbc = FALSE;
	}

} else { // Connection failure.
	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysql_error() . '.</p>';
}

if ($dbc) {

	// Define the query:
	$query = 'CREATE TABLE private_messages (
	entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
to_id VARCHAR(35) NOT NULL,
from_id VARCHAR(35) NOT NULL,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
time_sent DATETIME,
message TEXT(10000) NOT NULL,
opened ENUM(\'0\',\'1\'),
recipeintDelete ENUM(\'0\',\'1\'),
senderDelete ENUM(\'0\',\'1\')
)';
	
	// Execute the query:
	if (@mysql_query($query, $dbc)) {
		print '<p>The table has been created!</p>';
	} else {
		print '<p style="color: red;">Could not create the table because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
		
	mysql_close($dbc); // Close the connection.

}
?>
