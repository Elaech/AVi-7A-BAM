<?php
header("Content-Type: application/json; charset=UTF-8");
//Done by Ionita Andra

class Get
{

    private $connection;

    public function get()
    {
        $accident = new Accidente();

        $stmt = $accident->read();
        $count = $stmt->rowCount();

        if ($count > 0) {


            $accidents = array();
            $accidents["body"] = array();
            $accidents["count"] = $count;

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                extract($row);

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
                );

                array_push($accidents["body"], $p);
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
