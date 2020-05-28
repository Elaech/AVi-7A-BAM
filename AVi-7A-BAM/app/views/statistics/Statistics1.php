<!DOCTYPE html>
<html>

<head>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
          google.charts.load('current', {
               'packages': ['corechart']
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
               var data = google.visualization.arrayToDataTable(
                    <?php
                    /*
                echo "[";
                echo "['Name', 'Accident'],";
                foreach ($data as $row) {
                    
                    echo "['" . $row['severity'] . "'," . 5 . "],";
                }
                echo "]";
*/
                    echo "[";
                    echo "['Name', 'Accident'],";
                    for ($i = 0; $i < 20; $i++) {
                         for ($j = 0; $j < 1; $j++) {
                              echo "['" . $data->body[$i][$j]->severity . "'," . 1 . "],";
                              // var_dump($data->body);}
                         }
                    }
                    echo "]";
                    ?>);
               var options = {
                    title: 'Numbers of accidents in different country in this week:',
                    //is3D:true,  
                    pieHole: 0.4
               };
               var chart = new google.visualization.PieChart(document.getElementById('piechart'));
               chart.draw(data, options);
          }
     </script>
</head>

<body>

     <div style="width:900px;">

          <div id="piechart" style="width: 900px; height: 500px;"></div>
     </div>
</body>

</html>