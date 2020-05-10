<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

Class Post{

    private $connection;

    public function post(){

        $accident = new Accidente();
        
        $data = json_decode(file_get_contents("php://input"));
        
        $accident->id = $data->id;
        $accident->Source = $data->Source;
        $accident->TMC = $data->TMC;
        $accident->Severity = $data->Severity;
        $accident->start_time = $data->start_time;
        $accident->end_time = $data->end_time;
        $accident->start_lat = $data->start_lat;
        $accident->start_lng = $data->start_lng;
        $accident->end_lat = $data->end_lat;
        $accident->end_lng = $data->end_lng;
        $accident->distance = $data->distance;
        $accident->description = $data->description;
        $accident->numbers = $data->numbers;
        $accident->street = $data->street;
        $accident->side = $data->side;
        $accident->city = $data->city;
        $accident->county = $data->county;
        $accident->state = $data->state;
        $accident->zipcode = $data->zipcode;
        $accident->country = $data->country;
        $accident->timezone = $data->timezone;
        $accident->airport_code = $data->airport_code;
        $accident->erather_timestamp = $data->weather_timestamp;
        $accident->temperature = $data->temperature;
        $accident->wind_chill = $data->wind_chill;
        $accident->humidity = $data->humidity;
        $accident->pressure = $data->pressure;
        $accident->visibility = $data->visibility;
        $accident->wind_direction = $data->wind_direction;
        $accident->wind_speed = $data->wind_speed;
        $accident->precipitation = $data->precipitation;
        $accident->weather_condition = $data->weather_condition;
        $accident->amenity  = $data->amenity;
        $accident->bump = $data->bump;
        $accident->crossing = $data->crossing;
        $accident->give_way = $data->give_way;
        $accident->junctio  = $data->junction;
        $accident->no_exit = $data->no_exit;
        $accident->railway = $data->railway;
        $accident->roundabout = $data->roundabout;
        $accident->station = $data->station;
        $accident->stop = $data->stop;
        $accident->traffic_calming = $data->traffic_calming;
        $accident->traffic_signal = $data->traffic_signal;
        $accident->turning_loop = $data->turning_loop;
        $accident->sunrise_sunset = $data->sunrise_sunset;
        $accident->civil_twilight = $data->civil_twilight;
        $accident->atronomical_twilight = $data->astronomical_twilight;
        
        
        if ($accident->create()) {
            echo '{';
            echo '"message": "Accident was created."';
            echo '}';
        } else {
            echo '{';
            echo '"message": "Unable to create an Accident."';
            echo '}';
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
