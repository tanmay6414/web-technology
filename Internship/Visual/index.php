<!DOCTYPE html>

<?php
require_once('php_validate.php');
$sql = "SELECT * FROM graph";
$result = mysqli_query($conn, $sql);
?>

<html lang="en-US"> 
<body>

<div id="mainDiv">
<h1  style="color: #3e5b34;margin-left: 100px" > QJ Technology <a href="column_graph.php" style="margin-left: 200px" ><button style=";border: none;background: none;"><b>Go to Column Graph</b></button></a></span></h1>
<hr style="height: 2px;background-color: black">

<div id="leftDiv" style="float: left;margin-left: 100px">
<h2 style="margin-left: 100px">Pie Chart</h2> 

<div id="piechart" style="float: left;"> 
</div>
</div>

<div id="rightDiv" style="float: right;margin-right: 100px">
  <h2 >Update Graph</h2>
  <?php
  require_once('php_validate.php');
  $sql1 = "SELECT * FROM graph";
  $result1 = mysqli_query($conn, $sql1);
  ?> <div style="border: 1px solid black;margin-top: 100px;padding: 20px">
    <form action="update.php" method="post" id="mainForm">
  <table cellspacing="10px" style=""><?php
  $i=1;
  while($row1 = mysqli_fetch_assoc($result1)) { ?>
    <tr><?php
        echo "<form action='update.php' method='post'><td>" .$row1['city'] .'</td>' ?>
         <td><input type="hidden" form="mainForm" name="<?php echo "city".$i; ?>" value="<?php echo $row1['city'] ?>"></td>
         <td><input form ="mainForm" type="number" name="<?php echo "population".$i; ?>"></td>
         <td>
         </td>
         </form>
         </tr>
         <?php ;
         $i=$i+1;
    }
  ?> 
</table>
<input type="hidden" name="countdata" value="<?php echo $i-1 ; ?> ">
<button type="submit" style="margin-left: 40%" name="updateAll1">Update</button>
</form>
</div>

</div>

</div>

</body> 
<script type="text/javascript"
src="https://www.gstatic.com/charts/loader.js"></script> 

<script type="text/javascript"> 
google.charts.load('current', {'packages':['corechart']}); 
google.charts.setOnLoadCallback(drawChart); 

function drawChart() { 
var data = google.visualization.arrayToDataTable([
	['City', 'Population'],
	<?php
	while($row = mysqli_fetch_assoc($result)) {
        echo "['".$row['city']."',".$row['population']."],";
    }
	?> 
]);

var options = {'title':'Population Percentage Graph', 'width':550, 'height':400}; 
var chart = 
new google.visualization.PieChart(document.getElementById('piechart')); 
chart.draw(data, options); 
} 
</script> 
</html> 
