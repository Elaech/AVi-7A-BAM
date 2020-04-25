
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Name', 'Accident'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["name"]."', ".$row["accidente"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Numbers of accidents in different country in this week:',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  