<html>
//Done by Ionita Andra
    <head>
        <title> Populare baza de date</title>
    </head>
    <body>
        <h2> Script de populare baza de date din csv </h3>
        <p>
            <?php
            ini_set('max_execution_time', 1200);
            set_time_limit(1200);
            include 'Database.php';

            $connection = Database::getInstance();
            
             
            $row = 0;

            echo "Suntem conectati la baza de date. Incepem sa inseram linia: ";

            if (($handle = fopen("US_Accidents_Dec19.csv", "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 3000, ",")) !== FALSE) { 
                    $row++;

                    if($row > 1) {
                    
                        $prepared_statement = "insert into ACCIDENTS(Source,TMC,Severity,start_time,end_time,start_lat,start_lng,end_lat,end_lng,distance,
                        description,numbers,street,side,city,county,state,zipcode,country,timezone,airport_code,weather_timestamp,temperature,wind_chill,
                        humidity,pressure,visibility,wind_direction,wind_speed,precipitation,weather_condition,amenity,bump,crossing,give_way,junction,no_exit,
                        railway,roundabout,station,stop,traffic_calming,traffic_signal,turning_loop,sunrise_sunset,civil_twilight,astronomical_twilight)
                        values( :data1, :data2, :data3, :data4, :data5, :data6, :data7, :data8, :data9, :data10, :data11, :data12, :data13, :data14, :data15, 
                        :data16, :data17, :data18, :data19, :data20, :data21, :data22, :data23, :data24, :data25, :data26, :data27, :data28, :data29, :data30, :data31, :data32, :data33, :data34, 
                        :data35, :data36, :data37, :data38, :data39, :data40, :data41, :data42, :data43, :data44, :data45, :data46, :data47)";
                        $statement  = oci_parse($connection,$prepared_statement);
                
                        oci_bind_by_name($statement,':data1',$data[1]);
                        oci_bind_by_name($statement,':data2',$data[2]);
                        oci_bind_by_name($statement,':data3',$data[3]);
                        oci_bind_by_name($statement,':data4',$data[4]);
                        oci_bind_by_name($statement,':data5',$data[5]);
                        oci_bind_by_name($statement,':data6',$data[6]);
                        oci_bind_by_name($statement,':data7',$data[7]);
                        oci_bind_by_name($statement,':data8',$data[8]);
                        oci_bind_by_name($statement,':data9',$data[9]);
                        oci_bind_by_name($statement,':data10',$data[10]);
                        oci_bind_by_name($statement,':data11',$data[11]);
                        oci_bind_by_name($statement,':data12',$data[12]);
                        oci_bind_by_name($statement,':data13',$data[13]);
                        oci_bind_by_name($statement,':data14',$data[14]);
                        oci_bind_by_name($statement,':data15',$data[15]);
                        oci_bind_by_name($statement,':data16',$data[16]);
                        oci_bind_by_name($statement,':data17',$data[17]);
                        oci_bind_by_name($statement,':data18',$data[18]);
                        oci_bind_by_name($statement,':data19',$data[19]);
                        oci_bind_by_name($statement,':data20',$data[20]);
                        oci_bind_by_name($statement,':data21',$data[21]);
                        oci_bind_by_name($statement,':data22',$data[22]);
                        oci_bind_by_name($statement,':data23',$data[23]);
                        oci_bind_by_name($statement,':data24',$data[24]);
                        oci_bind_by_name($statement,':data25',$data[25]);
                        oci_bind_by_name($statement,':data26',$data[26]);
                        oci_bind_by_name($statement,':data27',$data[27]);
                        oci_bind_by_name($statement,':data28',$data[28]);
                        oci_bind_by_name($statement,':data29',$data[29]);
                        oci_bind_by_name($statement,':data30',$data[30]);
                        oci_bind_by_name($statement,':data31',$data[31]);
                        oci_bind_by_name($statement,':data32',$data[32]);
                        oci_bind_by_name($statement,':data33',$data[33]);
                        oci_bind_by_name($statement,':data34',$data[34]);
                        oci_bind_by_name($statement,':data35',$data[35]);
                        oci_bind_by_name($statement,':data36',$data[36]);
                        oci_bind_by_name($statement,':data37',$data[37]);
                        oci_bind_by_name($statement,':data38',$data[38]);
                        oci_bind_by_name($statement,':data39',$data[39]);
                        oci_bind_by_name($statement,':data40',$data[40]);
                        oci_bind_by_name($statement,':data41',$data[41]);
                        oci_bind_by_name($statement,':data42',$data[42]);
                        oci_bind_by_name($statement,':data43',$data[43]);
                        oci_bind_by_name($statement,':data44',$data[44]);
                        oci_bind_by_name($statement,':data45',$data[45]);
                        oci_bind_by_name($statement,':data46',$data[46]);
                        oci_bind_by_name($statement,':data47',$data[47]);
                       
                        oci_execute($statement);
                        oci_free_statement($statement);

                        echo $row . "   ";
                    }
            
                }
                fclose($handle);
            }
            echo "Am terminat de portat csv in Oracle";
            ?>
        </p>
</body>
</html>
