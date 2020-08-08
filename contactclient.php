
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bob";
$idno;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$a=$_POST['name'];
$b=$_POST['email'];
$c=$_POST['mobile'];
$d=$_POST['request'];
$e=$_POST['interest'];
$f=$_POST['comment'];

$sql1="select idno from contact_us";
$result=$conn->query($sql1);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $idno1=$row["idno"];
    }
}

$idno=$idno1+1;

$sql = "INSERT INTO `contact_us` (`idno`,`name`, `email`, `mobile`, `request`, `interest`, `comment` ) VALUES ('$idno','$a', '$b', '$c', '$d', '$e', '$f')";

if (mysqli_query($conn, $sql)) {
		echo '<script language="javascript">';
		echo 'alert("Our team will get back to you Shortly..:)")';
		echo '</script>';
		echo '<Script language="javascript">';
	    echo 'window.location = "index2.html" ';
	    echo '</script>';


} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>