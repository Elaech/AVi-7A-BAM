<?php
header("Content-Type: application/json; charset=UTF-8");
//Done by Ionita Andra and Cretu Bogdan

class Get
{

    private $connection;

    public function get($starting_entry_to_fetch,$amount_of_entries_to_fetch,$page_to_fetch)
    {

        


        $accident = new Accidente();
        //echo "  Mayday get.php get entered ";
        //$stmt = $accident->get();
        //$count = $stmt->rowCount();
        $count = $amount_of_entries_to_fetch;


        //nuj ce face if-ul asta dar l-am pastrat I guess, il scoti tu Andra daca nu iti mai trebe
        if ($count > 0) {

            //echo "  Mayday get.php count calculated         ";
            $accidents = array();
            $accidents["body"] = array();
            $row_of_fetched_data_as_array = array();
            $accidents["count"] = $count;
            $accidents["valid"] = array();
            $amount = 0;


            $prepared_statement = "Select * from ACCIDENTS where
            id <= (:amount_of_entries_to_fetch * (:page+1)  + :starting_entry_to_fetch) and
             id >= (:amount_of_entries_to_fetch  * :page + :starting_entry_to_fetch) ";

            $statement  = oci_parse($this->connection, $prepared_statement);

            oci_bind_by_name($statement, ':amount_of_entries_to_fetch', $amount_of_entries_to_fetch);
            oci_bind_by_name($statement, ':starting_entry_to_fetch', $starting_entry_to_fetch);
            oci_bind_by_name($statement, ':page', $page_to_fetch);

            oci_execute($statement);


            //while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) && $amount<110) {
            while ($amount < $amount_of_entries_to_fetch) {
                $amount = $amount + 1;
                //extract($row);
                //echo "  Mayday get.php          ";

                oci_fetch($statement);


                array_push(
                    $accidents["body"],

                    array(
                        "id" => (int) oci_result($statement, "ID"),
                        "Source" => oci_result($statement, "SOURCE"),
                        "TMC" => (int) oci_result($statement, "TMC"),
                        "Severity" => (int) oci_result($statement, "SEVERITY"),
                        "start_time" => oci_result($statement, "START_TIME"),
                        "end_time" => oci_result($statement, "END_TIME"),
                        "start_lat" => (int) oci_result($statement, "START_LAT"),
                        "start_lng" => (int) oci_result($statement, "START_LNG"),
                        "end_lat" => (int) oci_result($statement, "END_LAT"),
                        "end_lng" => (int) oci_result($statement, "END_LNG"),
                        "distance" => (int) oci_result($statement, "DISTANCE"),
                        "description" => oci_result($statement, "DESCRIPTION"),
                        "numbers" => (int) oci_result($statement, "NUMBERS"),
                        "street" => oci_result($statement, "STREET"),
                        "side" => oci_result($statement, "SIDE"),
                        "city" => oci_result($statement, "CITY"),
                        "county" => oci_result($statement, "COUNTY"),
                        "state" => oci_result($statement, "STATE"),
                        "zipcode" => oci_result($statement, "ZIPCODE"),
                        "country" => oci_result($statement, "COUNTRY"),
                        "timezone" => oci_result($statement, "TIMEZONE"),
                        "airport_code" => oci_result($statement, "AIRPORT_CODE"),
                        "weather_timestamp" => oci_result($statement, "WEATHER_TIMESTAMP"),
                        "temperature" => (int) oci_result($statement, "TEMPERATURE"),
                        "wind_chill" => oci_result($statement, "WIND_CHILL"),
                        "humidity" => (int) oci_result($statement, "HUMIDITY"),
                        "pressure" => (int) oci_result($statement, "PRESSURE"),
                        "visibility" => (int) oci_result($statement, "VISIBILITY"),
                        "wind_direction" => oci_result($statement, "WIND_DIRECTION"),
                        "wind_speed" => oci_result($statement, "WIND_SPEED"),
                        "precipitation" => (int) oci_result($statement, "PRECIPITATION"),
                        "weather_condition" => oci_result($statement, "WEATHER_CONDITION"),
                        "amenity"  => oci_result($statement, "AMENITY"),
                        "bump" => oci_result($statement, "BUMP"),
                        "crossing" => oci_result($statement, "CROSSING"),
                        "give_way" => oci_result($statement, "GIVE_WAY"),
                        "junction"  => oci_result($statement, "JUNCTION"),
                        "no_exit" => oci_result($statement, "NO_EXIT"),
                        "railway" => oci_result($statement, "RAILWAY"),
                        "roundabout" => oci_result($statement, "ROUNDABOUT"),
                        "station" => oci_result($statement, "STATION"),
                        "stop" => oci_result($statement, "STOP"),
                        "traffic_calming" => oci_result($statement, "TRAFFIC_CALMING"),
                        "traffic_signal" => oci_result($statement, "TRAFFIC_SIGNAL"),
                        "turning_loop" => oci_result($statement, "TURNING_LOOP"),
                        "sunrise_sunset" => oci_result($statement, "SUNRISE_SUNSET"),
                        "civil_twilight" => oci_result($statement, "CIVIL_TWILIGHT"),
                        "atronomical_twilight" => oci_result($statement, "ASTRONOMICAL_TWILIGHT")
                    )
                );
                //echo oci_result($statement, "ID");
                // array_push($row_of_fetched_data_as_array,array("id" => oci_result($statement, "ID")));
                // array_push($row_of_fetched_data_as_array, oci_result($statement, "STREET"));
                //  array_push($accidents["body"],$row_of_fetched_data_as_array);
                // $row_of_fetched_data_as_array = array();
            }

            echo json_encode($accidents);
        } else {

            echo json_encode(
                array("body" => array(), "count" => 0, "valid" => array())
            );
        }
    }


    public function getSome($id)//Andra, daca nu foloseste asta la ceva pls delete it
    {



        $amount_of_entries_to_fetch = 25; // Asta o sa trebuiasa sa fie argumentul functiei
        $starting_entry_to_fetch = 0; // SI asta


        $accident = new Accidente();
        //echo "  Mayday get.php get entered        ";
        //$stmt = $accident->get();
        //$count = $stmt->rowCount();
        $count = 1;


        //nuj ce face if-ul asta dar l-am pastrat I guess
        if ($count > 0) {

            //echo "  Mayday get.php count calculated         ";
            $accidents = array();
            $accidents["body"] = array();
            $row_of_fetched_data_as_array = array();
            $accidents["count"] = $count;
            $accidents["valid"] = array();
            $amount = 0;


            $prepared_statement = "Select * from ACCIDENTS where id=:id";

            $statement  = oci_parse($this->connection, $prepared_statement);
            oci_bind_by_name($statement, ':id', $id);

            //oci_bind_by_name($statement,':amount_of_entries_to_fetch',$amount_of_entries_to_fetch);
            // oci_bind_by_name($statement,':starting_entry_to_fetch',$starting_entry_to_fetch);

            oci_execute($statement);


            //while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) && $amount<110) {
            //while ($amount<$amount_of_entries_to_fetch) {
            //    $amount = $amount+1;
            //extract($row);
            //echo "  Mayday get.php          ";


            oci_fetch($statement);
            array_push($accidents["valid"], array("id"));

            array_push(
                $accidents["body"],

                array(
                    //"id" => (int)oci_result($statement, "ID"),
                    "Source" => oci_result($statement, "SOURCE"),
                    "TMC" => (int) oci_result($statement, "TMC"),
                    "Severity" => (int) oci_result($statement, "SEVERITY"),
                    "start_time" => oci_result($statement, "START_TIME"),
                    "end_time" => oci_result($statement, "END_TIME"),
                    "start_lat" => (int) oci_result($statement, "START_LAT"),
                    "start_lng" => (int) oci_result($statement, "START_LNG"),
                    "end_lat" => (int) oci_result($statement, "END_LAT"),
                    "end_lng" => (int) oci_result($statement, "END_LNG"),
                    "distance" => (int) oci_result($statement, "DISTANCE"),
                    "description" => oci_result($statement, "DESCRIPTION"),
                    "numbers" => (int) oci_result($statement, "NUMBERS"),
                    "street" => oci_result($statement, "STREET"),
                    "side" => oci_result($statement, "SIDE"),
                    "city" => oci_result($statement, "CITY"),
                    "county" => oci_result($statement, "COUNTY"),
                    "state" => oci_result($statement, "STATE"),
                    "zipcode" => oci_result($statement, "ZIPCODE"),
                    "country" => oci_result($statement, "COUNTRY"),
                    "timezone" => oci_result($statement, "TIMEZONE"),
                    "airport_code" => oci_result($statement, "AIRPORT_CODE"),
                    "weather_timestamp" => oci_result($statement, "WEATHER_TIMESTAMP"),
                    "temperature" => (int) oci_result($statement, "TEMPERATURE"),
                    "wind_chill" => oci_result($statement, "WIND_CHILL"),
                    "humidity" => (int) oci_result($statement, "HUMIDITY"),
                    "pressure" => (int) oci_result($statement, "PRESSURE"),
                    "visibility" => (int) oci_result($statement, "VISIBILITY"),
                    "wind_direction" => oci_result($statement, "WIND_DIRECTION"),
                    "wind_speed" => oci_result($statement, "WIND_SPEED"),
                    "precipitation" => (int) oci_result($statement, "PRECIPITATION"),
                    "weather_condition" => oci_result($statement, "WEATHER_CONDITION"),
                    "amenity"  => oci_result($statement, "AMENITY"),
                    "bump" => oci_result($statement, "BUMP"),
                    "crossing" => oci_result($statement, "CROSSING"),
                    "give_way" => oci_result($statement, "GIVE_WAY"),
                    "junction"  => oci_result($statement, "JUNCTION"),
                    "no_exit" => oci_result($statement, "NO_EXIT"),
                    "railway" => oci_result($statement, "RAILWAY"),
                    "roundabout" => oci_result($statement, "ROUNDABOUT"),
                    "station" => oci_result($statement, "STATION"),
                    "stop" => oci_result($statement, "STOP"),
                    "traffic_calming" => oci_result($statement, "TRAFFIC_CALMING"),
                    "traffic_signal" => oci_result($statement, "TRAFFIC_SIGNAL"),
                    "turning_loop" => oci_result($statement, "TURNING_LOOP"),
                    "sunrise_sunset" => oci_result($statement, "SUNRISE_SUNSET"),
                    "civil_twilight" => oci_result($statement, "CIVIL_TWILIGHT"),
                    "atronomical_twilight" => oci_result($statement, "ASTRONOMICAL_TWILIGHT")
                )
            );
            //echo oci_result($statement, "ID");
            // array_push($row_of_fetched_data_as_array,array("id" => oci_result($statement, "ID")));
            // array_push($row_of_fetched_data_as_array, oci_result($statement, "STREET"));
            //  array_push($accidents["body"],$row_of_fetched_data_as_array);
            // $row_of_fetched_data_as_array = array();
            //}

            echo json_encode($accidents);
        } else {

            echo json_encode(
                array("body" => array(), "count" => 0, "valid" => array())
            );
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
