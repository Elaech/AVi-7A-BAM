<?php
header("Content-Type: application/json; charset=UTF-8");
//Done by Ionita Andra and Cretu Bogdan

class Get
{

    private $connection;

    public function get()
    {

        $amount_of_entries_to_fetch = 121; // Asta o sa trebuiasa sa fie argumentul functiei
        $starting_entry_to_fetch = 0; // SI asta


        $accident = new Accidente();
        //echo "  Mayday get.php get entered        ";
        //$stmt = $accident->get();
        //$count = $stmt->rowCount();
        $count = $amount_of_entries_to_fetch;


        //nuj ce face if-ul asta dar l-am pastrat I guess
        if ($count > 0) {

            //echo "  Mayday get.php count calculated         ";
            $accidents = array();
            $accidents["body"] = array();
            $row_of_fetched_data_as_array = array();
            $accidents["count"] = $count;
            $amount = 0;


            $prepared_statement = "Select * from ACCIDENTS where id < :amount_of_entries_to_fetch + :starting_entry_to_fetch and id > :starting_entry_to_fetch";
            
            $statement  = oci_parse($this->connection,$prepared_statement);
            
            oci_bind_by_name($statement,':amount_of_entries_to_fetch',$amount_of_entries_to_fetch);
            oci_bind_by_name($statement,':starting_entry_to_fetch',$starting_entry_to_fetch);

            oci_execute($statement);


            //while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) && $amount<110) {
            while ($amount<$amount_of_entries_to_fetch) {
                $amount = $amount+1;
                //extract($row);
                //echo "  Mayday get.php          ";
                
                oci_fetch($statement);

                /*
                $p  = array(

                    "id" => $id,
                    "Source" => $Source,
                    "TMC" => $TMC,
                    "Severity" => $Severity,
                    "start_time" => $start_time,
                    "end_time" => $end_time,
                    "start_lat" => $start_lat,
                    "start_lng" => $start_lng,
                    "end_lat" => $end_lat,
                    "end_lng" => $end_lng,
                    "distance" => $distance,
                    "description" => $description,
                    "numbers" => $numbers,
                    "street" => $street,
                    "side" => $side,
                    "city" => $city,
                    "county" => $county,
                    "state" => $state,
                    "zipcode" => $zipcode,
                    "country" => $country,
                    "timezone" => $timezone,
                    "airport_code" => $airport_code,
                    "erather_timestamp" => $weather_timestamp,
                    "temperature" => $temperature,
                    "wind_chill" => $wind_chill,
                    "humidity" => $humidity,
                    "pressure" => $pressure,
                    "visibility" => $visibility,
                    "wind_direction" => $wind_direction,
                    "wind_speed" => $wind_speed,
                    "precipitation" => $precipitation,
                    "weather_condition" => $weather_condition,
                    "amenity"  => $amenity,
                    "bump" => $bump,
                    "crossing" => $crossing,
                    "give_way" => $give_way,
                    "junctio"  => $junction,
                    "no_exit" => $no_exit,
                    "railway" => $railway,
                    "roundabout" => $roundabout,
                    "station" => $station,
                    "stop" => $stop,
                    "traffic_calming" => $traffic_calming,
                    "traffic_signal" => $traffic_signal,
                    "turning_loop" => $turning_loop,
                    "sunrise_sunset" => $sunrise_sunset,
                    "civil_twilight" => $civil_twilight,
                    "atronomical_twilight" => $astronomical_twilight
                );*/
                //echo oci_result($statement, "ID");

                //O sa trebuiasca sa gasim o metoda sa facem array-ul asociativ si sa salvam si numele coloanelor in 
                //JSON, stie misa sigur cum o sa trebuiasca sa vedem
                array_push($row_of_fetched_data_as_array, oci_result($statement, "ID"));
                array_push($row_of_fetched_data_as_array, oci_result($statement, "STREET"));
                array_push($accidents["body"],$row_of_fetched_data_as_array);
                $row_of_fetched_data_as_array = array();
            }

            echo json_encode($accidents);
        } else {

            echo json_encode(
                array("body" => array(), "count" => 0));
        }
    }
    

    public function __construct()
    {
        $this->connection = DatabaseConnection::getInstance();
    }

    public function __destruct()
    {
        oci_close($this->connection);
    }
}
