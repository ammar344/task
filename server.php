<?php 
// connection to server
$servername = "localhost";
$username = "root";
$password = "";
$db = "task";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// php code

$cmd = $_REQUEST['cmd'];
switch ($cmd){
    case "send": {
        if(isset($_REQUEST['send'])) {
            $fname = $_REQUEST["fname"];
            $femail = $_REQUEST["femail"];
            $fmessage = $_REQUEST["fmessage"];
        
            // Checkboxes data
            $fwebsiteChecked = isset($_REQUEST['fwebsite']) ? 'Yes' : 'No';
            $fecommerceChecked = isset($_REQUEST['fecommerce']) ? 'Yes' : 'No';
            $fseoChecked = isset($_REQUEST['fseo']) ? 'Yes' : 'No';
        
            // SQL to insert data into table
            $insert = "INSERT INTO contact_us (name, email, website_service, ecommerce_service, seo_service, message) 
                       VALUES ('$fname', '$femail', '$fwebsiteChecked', '$fecommerceChecked', '$fseoChecked', '$fmessage')";
            $insert_query = mysqli_query($conn, $insert);
            
            if($insert_query) {
                header('Location: index.html');
                exit; // Terminate the script after redirection
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }break;
}
?>