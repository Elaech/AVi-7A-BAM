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



        //echo "  Mayday get.php count calculated         ";
        $accidents = array();
        $accidents["body"] = array();
        $row_of_fetched_data_as_array = array();
        $accidents["count"] = $count;
        $accidents["valid"] = array();
        $amount = 0;


        $prepared_statement_select_base = "Select * from ACCIDENTS where
        id <= (:amount_of_entries_to_fetch * (:page+1)  + :starting_entry_to_fetch) and
            id >= (:amount_of_entries_to_fetch  * :page + :starting_entry_to_fetch) ";



        $statement_select_base  = oci_parse($this->connection, $prepared_statement_select_base);

        oci_bind_by_name($statement_select_base, ':amount_of_entries_to_fetch', $amount_of_entries_to_fetch);
        oci_bind_by_name($statement_select_base, ':starting_entry_to_fetch', $starting_entry_to_fetch);
        oci_bind_by_name($statement_select_base, ':page', $page_to_fetch);

        oci_execute($statement_select_base);

        

        

        //while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) && $amount<110) {
        while ($amount < $amount_of_entries_to_fetch) {
            $amount = $amount + 1;
            //extract($row);
            //echo "  Mayday get.php";

            oci_fetch($statement_select_base);


            array_push(
                $accidents["body"],

                array(
                    "id" => (int) oci_result($statement_select_base, "ID"),
                    "Source" => oci_result($statement_select_base, "SOURCE"),
                    "TMC" => (int) oci_result($statement_select_base, "TMC"),
                    "Severity" => (int) oci_result($statement_select_base, "SEVERITY"),
                    "start_time" => oci_result($statement_select_base, "START_TIME"),
                    "end_time" => oci_result($statement_select_base, "END_TIME"),
                    "start_lat" => (int) oci_result($statement_select_base, "START_LAT"),
                    "start_lng" => (int) oci_result($statement_select_base, "START_LNG"),
                    "end_lat" => (int) oci_result($statement_select_base, "END_LAT"),
                    "end_lng" => (int) oci_result($statement_select_base, "END_LNG"),
                    "distance" => (int) oci_result($statement_select_base, "DISTANCE"),
                    "description" => oci_result($statement_select_base, "DESCRIPTION"),
                    "numbers" => (int) oci_result($statement_select_base, "NUMBERS"),
                    "street" => oci_result($statement_select_base, "STREET"),
                    "side" => oci_result($statement_select_base, "SIDE"),
                    "city" => oci_result($statement_select_base, "CITY"),
                    "county" => oci_result($statement_select_base, "COUNTY"),
                    "state" => oci_result($statement_select_base, "STATE"),
                    "zipcode" => oci_result($statement_select_base, "ZIPCODE"),
                    "country" => oci_result($statement_select_base, "COUNTRY"),
                    "timezone" => oci_result($statement_select_base, "TIMEZONE"),
                    "airport_code" => oci_result($statement_select_base, "AIRPORT_CODE"),
                    "weather_timestamp" => oci_result($statement_select_base, "WEATHER_TIMESTAMP"),
                    "temperature" => (int) oci_result($statement_select_base, "TEMPERATURE"),
                    "wind_chill" => oci_result($statement_select_base, "WIND_CHILL"),
                    "humidity" => (int) oci_result($statement_select_base, "HUMIDITY"),
                    "pressure" => (int) oci_result($statement_select_base, "PRESSURE"),
                    "visibility" => (int) oci_result($statement_select_base, "VISIBILITY"),
                    "wind_direction" => oci_result($statement_select_base, "WIND_DIRECTION"),
                    "wind_speed" => oci_result($statement_select_base, "WIND_SPEED"),
                    "precipitation" => (int) oci_result($statement_select_base, "PRECIPITATION"),
                    "weather_condition" => oci_result($statement_select_base, "WEATHER_CONDITION"),
                    "amenity"  => oci_result($statement_select_base, "AMENITY"),
                    "bump" => oci_result($statement_select_base, "BUMP"),
                    "crossing" => oci_result($statement_select_base, "CROSSING"),
                    "give_way" => oci_result($statement_select_base, "GIVE_WAY"),
                    "junction"  => oci_result($statement_select_base, "JUNCTION"),
                    "no_exit" => oci_result($statement_select_base, "NO_EXIT"),
                    "railway" => oci_result($statement_select_base, "RAILWAY"),
                    "roundabout" => oci_result($statement_select_base, "ROUNDABOUT"),
                    "station" => oci_result($statement_select_base, "STATION"),
                    "stop" => oci_result($statement_select_base, "STOP"),
                    "traffic_calming" => oci_result($statement_select_base, "TRAFFIC_CALMING"),
                    "traffic_signal" => oci_result($statement_select_base, "TRAFFIC_SIGNAL"),
                    "turning_loop" => oci_result($statement_select_base, "TURNING_LOOP"),
                    "sunrise_sunset" => oci_result($statement_select_base, "SUNRISE_SUNSET"),
                    "civil_twilight" => oci_result($statement_select_base, "CIVIL_TWILIGHT"),
                    "atronomical_twilight" => oci_result($statement_select_base, "ASTRONOMICAL_TWILIGHT")
                )
            );
            //echo oci_result($statement_select_base, "ID");
            // array_push($row_of_fetched_data_as_array,array("id" => oci_result($statement_select_base, "ID")));
            // array_push($row_of_fetched_data_as_array, oci_result($statement_select_base, "STREET"));
            //  array_push($accidents["body"],$row_of_fetched_data_as_array);
            // $row_of_fetched_data_as_array = array();
        }

        $prepared_statement_select_count = "Select COUNT(*) from ACCIDENTS where
        id <= (:amount_of_entries_to_fetch * (:page+1)  + :starting_entry_to_fetch) and
            id >= (:amount_of_entries_to_fetch  * :page + :starting_entry_to_fetch) ";

        $statement_select_count = oci_parse($this->connection, $prepared_statement_select_count);
        oci_bind_by_name($statement_select_count, ':amount_of_entries_to_fetch', $amount_of_entries_to_fetch);
        oci_bind_by_name($statement_select_count, ':starting_entry_to_fetch', $starting_entry_to_fetch);
        oci_bind_by_name($statement_select_count, ':page', $page_to_fetch);

        oci_execute($statement_select_count);
        oci_fetch($statement_select_count);
        $accidents["count"] = oci_result($statement_select_count, "COUNT(*)");
        echo json_encode($accidents);

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


            $prepared_statement_select_base = "Select * from ACCIDENTS where id=:id";

            $statement_select_base  = oci_parse($this->connection, $prepared_statement_select_base);
            oci_bind_by_name($statement_select_base, ':id', $id);

            //oci_bind_by_name($statement_select_base,':amount_of_entries_to_fetch',$amount_of_entries_to_fetch);
            // oci_bind_by_name($statement_select_base,':starting_entry_to_fetch',$starting_entry_to_fetch);

            oci_execute($statement_select_base);


            //while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) && $amount<110) {
            //while ($amount<$amount_of_entries_to_fetch) {
            //    $amount = $amount+1;
            //extract($row);
            //echo "  Mayday get.php          ";


            oci_fetch($statement_select_base);
            array_push($accidents["valid"], array("id"));

            array_push(
                $accidents["body"],

                array(
                    //"id" => (int)oci_result($statement_select_base, "ID"),
                    "Source" => oci_result($statement_select_base, "SOURCE"),
                    "TMC" => (int) oci_result($statement_select_base, "TMC"),
                    "Severity" => (int) oci_result($statement_select_base, "SEVERITY"),
                    "start_time" => oci_result($statement_select_base, "START_TIME"),
                    "end_time" => oci_result($statement_select_base, "END_TIME"),
                    "start_lat" => (int) oci_result($statement_select_base, "START_LAT"),
                    "start_lng" => (int) oci_result($statement_select_base, "START_LNG"),
                    "end_lat" => (int) oci_result($statement_select_base, "END_LAT"),
                    "end_lng" => (int) oci_result($statement_select_base, "END_LNG"),
                    "distance" => (int) oci_result($statement_select_base, "DISTANCE"),
                    "description" => oci_result($statement_select_base, "DESCRIPTION"),
                    "numbers" => (int) oci_result($statement_select_base, "NUMBERS"),
                    "street" => oci_result($statement_select_base, "STREET"),
                    "side" => oci_result($statement_select_base, "SIDE"),
                    "city" => oci_result($statement_select_base, "CITY"),
                    "county" => oci_result($statement_select_base, "COUNTY"),
                    "state" => oci_result($statement_select_base, "STATE"),
                    "zipcode" => oci_result($statement_select_base, "ZIPCODE"),
                    "country" => oci_result($statement_select_base, "COUNTRY"),
                    "timezone" => oci_result($statement_select_base, "TIMEZONE"),
                    "airport_code" => oci_result($statement_select_base, "AIRPORT_CODE"),
                    "weather_timestamp" => oci_result($statement_select_base, "WEATHER_TIMESTAMP"),
                    "temperature" => (int) oci_result($statement_select_base, "TEMPERATURE"),
                    "wind_chill" => oci_result($statement_select_base, "WIND_CHILL"),
                    "humidity" => (int) oci_result($statement_select_base, "HUMIDITY"),
                    "pressure" => (int) oci_result($statement_select_base, "PRESSURE"),
                    "visibility" => (int) oci_result($statement_select_base, "VISIBILITY"),
                    "wind_direction" => oci_result($statement_select_base, "WIND_DIRECTION"),
                    "wind_speed" => oci_result($statement_select_base, "WIND_SPEED"),
                    "precipitation" => (int) oci_result($statement_select_base, "PRECIPITATION"),
                    "weather_condition" => oci_result($statement_select_base, "WEATHER_CONDITION"),
                    "amenity"  => oci_result($statement_select_base, "AMENITY"),
                    "bump" => oci_result($statement_select_base, "BUMP"),
                    "crossing" => oci_result($statement_select_base, "CROSSING"),
                    "give_way" => oci_result($statement_select_base, "GIVE_WAY"),
                    "junction"  => oci_result($statement_select_base, "JUNCTION"),
                    "no_exit" => oci_result($statement_select_base, "NO_EXIT"),
                    "railway" => oci_result($statement_select_base, "RAILWAY"),
                    "roundabout" => oci_result($statement_select_base, "ROUNDABOUT"),
                    "station" => oci_result($statement_select_base, "STATION"),
                    "stop" => oci_result($statement_select_base, "STOP"),
                    "traffic_calming" => oci_result($statement_select_base, "TRAFFIC_CALMING"),
                    "traffic_signal" => oci_result($statement_select_base, "TRAFFIC_SIGNAL"),
                    "turning_loop" => oci_result($statement_select_base, "TURNING_LOOP"),
                    "sunrise_sunset" => oci_result($statement_select_base, "SUNRISE_SUNSET"),
                    "civil_twilight" => oci_result($statement_select_base, "CIVIL_TWILIGHT"),
                    "atronomical_twilight" => oci_result($statement_select_base, "ASTRONOMICAL_TWILIGHT")
                )
            );
            //echo oci_result($statement_select_base, "ID");
            // array_push($row_of_fetched_data_as_array,array("id" => oci_result($statement_select_base, "ID")));
            // array_push($row_of_fetched_data_as_array, oci_result($statement_select_base, "STREET"));
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
