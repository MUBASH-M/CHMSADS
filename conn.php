<?Php
$host_name = "localhost";
$database = "hmsads"; // Change your database nae
$username = "root";          // Your database user id 
$password = "";          // Your password

// Create connection
$conn = new mysqli($host_name, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>