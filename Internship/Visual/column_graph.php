<?php
require_once('php_validate.php');
$color1 = array("#94abd1", "#1ce4ff", "#75ffb3","#e8fc97","#fce497","#f7c3a5","#f28e8e","#ef0404","#efac04","#f9f63b","#51d306","#037f56","#034f7f","#e0bff2","#4c033b","#111010");
$sql2 = "SELECT * FROM graph";
$result2 = mysqli_query($conn, $sql2);
?>
<html lang="en-US"> 
<body>

<div id="mainDiv">
<h1  style="color: #3e5b34;margin-left: 100px" > QJ Technology <a href="index.php" style="margin-left: 200px" ><button style=";border: none;background: none;"><b>Go to Pie Chart</b></button></a></span></h1>

<hr style="height: 2px;background-color: black">

<div id="leftDiv" style="float: left;margin-left: 100px">
<h2 style="margin-left: 100px">Pie Chart</h2> 

<div id="columnchart_values" style="float: left;"> 
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
         
         </form>
         </tr>
         <?php ;
         $i=$i+1;
    }
  ?> 
</table>
<input type="hidden" name="countdata" value="<?php echo $i-1 ; ?> ">
<button type="submit" style="margin-left: 40%" name="updateAll">Update</button>
</form>
</div>
  
</div>

</div>
</body> 


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Cityt", "Population", { role: "style" } ],

        <?php
          $i=0;
          while($row2 = mysqli_fetch_assoc($result2)) {
          echo "['".$row2['city']."',".$row2['population'].",'".$color1[$i]."'],";
          $i=$i+1;
          }
        ?> 

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Population in Cities in Thousand",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
</html>



