<center>
<h1 style="color:blue; font-size: 100px">CSC496 Group 4</h1>
<h4 style="color:blue; font-size: 50px">Attempting MySQL connection from php...</h4>
<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$dbname = 'myDB';

# Create Connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
echo"<br>";

# Check Connection
if ($conn->connect_error) {
    die("Connection failed to mysql: " . $conn->connect_error);
} else {
    echo "<font size=50px>Connected to mysql</font> <br>";
}

// sql to create table
$sql = "CREATE TABLE MyProfessors (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

// INSERT data into table
$sql = "INSERT INTO MyProfessors (firstname, lastname, email)
VALUES ('Linh', 'Ngo', 'LNgo@wcupa.edu');";
$sql .= "INSERT INTO MyProfessors (firstname, lastname, email)
VALUES ('James', 'Fabrey', 'JFabrey@wcupa.edu');";
$sql .= "INSERT INTO MyProfessors (firstname, lastname, email)
VALUES ('Richard', 'Wyatt', 'RWyatt@wcupa.edu');";
$sql .= "INSERT INTO MyProfessors (firstname, lastname, email)
VALUES ('Richard', 'Epstein', 'REpstein@wcupa.edu')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo"<br>";
$conn->close();

# Create Connection
$conn = new mysqli($host, $user, $pass, $dbname);

$sql = "SELECT id, firstname, lastname FROM MyProfessors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<br>";
        #echo "<font size=50px>id: </font>" . $row["id"]. "<font size=50px> - Name: </font>" . $row["firstname"]. " " . $row["lastname"]. "<br>";
		if($row["id"] == 79 or $row["id"] == 1){
			echo '<i style="color:navy;font-size:50px;font-family:calibri ;">
						id: 79 - Name: Linh Ngo </i> <br>';
			echo '<img src="https://www.wcupa.edu/sciences-mathematics/computerScience/images/lNgo.jpg" />'; 
			}
		if($row["id"] == 80 or $row["id"] == 2){
			echo '<i style="color:navy;font-size:50px;font-family:calibri ;">
						id: 80 - Name: James Fabrey </i> <br>';
			echo '<img src="https://www.wcupa.edu/sciences-mathematics/computerScience/images/faculty/jFabrey.jpg" />';
		}
		if($row["id"] == 81 or $row["id"] == 3){
			echo '<i style="color:navy;font-size:50px;font-family:calibri ;">
						id: 81 - Name: Richard Wyatt </i> <br>';
			echo '<img src="https://www.wcupa.edu/sciences-mathematics/computerScience/images/faculty/rWyatt.jpg" />';
		}
		if($row["id"] == 82 or $row["id"] == 4){
			echo '<i style="color:navy;font-size:50px;font-family:calibri ;">
						id: 82 - Name: Richard Epstein </i> <br>';
			echo '<img src="https://www.wcupa.edu/sciences-mathematics/computerScience/images/faculty/rEpstein.jpg" />';
		}
    }
} else {
    echo "0 results";
}



$conn->close();

echo "<body style='background: url(https://wcupa.edu/images/heroImages/3200/April%20Scenery-9.jpg);'>";
echo "<br>";
?>
<center>