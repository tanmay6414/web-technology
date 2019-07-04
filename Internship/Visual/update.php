<?php
require_once('php_validate.php');




if(isset($_POST['updateAll'])){
	$i = $_POST['countdata'];
	$city="city";
	$population="population";
	#echo "city".($i+1);
	for ($x = 1; $x <= $i; $x++) {
		$a=$population.$x;
	    $a=$_POST[$a];

	    $b=$city.$x;
	    $b=$_POST[$b];
	    
	    $sql = "UPDATE graph SET population=$a WHERE city='$b'";
	    $res = mysqli_query($conn, $sql);
	    header("Location: column_graph.php");
	} 
        
	}

	if(isset($_POST['updateAll1'])){
	$i = $_POST['countdata'];
	$city="city";
	$population="population";
	#echo "city".($i+1);
	for ($x = 1; $x <= $i; $x++) {
		$a=$population.$x;
	    $a=$_POST[$a];

	    $b=$city.$x;
	    $b=$_POST[$b];
	    
	    $sql = "UPDATE graph SET population=$a WHERE city='$b'";
	    $res = mysqli_query($conn, $sql);
	    header("Location: index.php");
	} 
        
	}
	
?>
