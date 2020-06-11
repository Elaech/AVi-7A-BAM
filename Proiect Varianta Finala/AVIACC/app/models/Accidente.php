<?php
//Done by Ionita Andra
class Accidente  extends Model
{
    private $conn;
    private $table_name = "ACCIDENTS";
    public $id;
    public $Source;
    public $TMC;
    public $Severity;
    public $start_time;
    public $end_time;
    public $start_lat;
    public $start_lng;
    public $end_lat;
    public $end_lng;
    public $distance;
    public $description;
    public $numbers;
    public $street;
    public $side;
    public $city;
    public $county;
    public $state;
    public $zipcode;
    public $country;
    public $timezone;
    public $airport_code;
    public $weather_timestamp;
    public $temperature;
    public $wind_chill;
    public $humidity;
    public $pressure;
    public $visibility;
    public $wind_direction;
    public $wind_speed;
    public $precipitation;
    public $weather_condition;
    public $amenity;
    public $bump;
    public $crossing;
    public $give_way;
    public $junction;
    public $no_exit;
    public $railway;
    public $roundabout;
    public $station;
    public $stop;
    public $traffic_calming;
    public $traffic_signal;
    public $turning_loop;
    public $sunrise_sunset;
    public $civil_twilight;
    public $astronomical_twilight;

    private $valid_string_show = " id  Source TMC Severity start_time end_time start_lat start_lng end_lat end_lng 
    distance description numbers street side city county state zipcode country timezone airport_code weather_timestamp 
  temperature wind_chill humidity pressure visibility wind_direction wind_speed precipitation weather_condition 
  amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
  turning_loop sunrise_sunset civil_twilight astronomical_twilight ";

    private $valid_string_boolean = " amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
turning_loop sunrise_sunset civil_twilight astronomical_twilight ";

    private $valid_string_equals = " id  Source TMC Severity start_time end_time start_lat start_lng end_lat end_lng 
distance description numbers street side city county state zipcode country timezone airport_code weather_timestamp 
temperature wind_chill humidity pressure visibility wind_direction wind_speed precipitation weather_condition 
amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
turning_loop sunrise_sunset civil_twilight astronomical_twilight ";

    private $valid_string_between = " id TMC Severity start_time end_time start_lat start_lng end_lat end_lng 
distance  numbers  weather_timestamp temperature wind_chill humidity pressure visibility wind_direction wind_speed precipitation ";

    public $accidentShow;
    public $accidentBetween;
    public $accidentBoolean;
    public $accidentEquals;

    public function __construct()
    {
        $this->conn = DatabaseConnection::getInstance();
    }

    public function post()
    {
        $data = $this->daoservice("post");

        return $data->post();
    }



    public function ShowCommand($name)
    {
        $data = $this->daoservice("command");

        return $data->ShowCommand($name);
    }


    public function BetweenCommand($name, $value, $operator)
    {
        $data = $this->daoservice("command");

        return $data->BetweenCommand($name, $value, $operator);
    }


    public function BooleanCommand($name, $value)
    {
        $data = $this->daoservice("command");

        return $data->BooleanCommand($name, $value);
    }

    public function EqualsCommand($name, $value)
    {
        $data = $this->daoservice("command");

        return $data->EqualsCommand($name, $value);
    }

    public  function createString($accidentShow, $accidentEquals, $accidentBetween,$accidentBoolean)
    {
        $data = $this->daoservice("command");

        return $data->createString($accidentShow, $accidentEquals, $accidentBetween,$accidentBoolean);
    }


    public function get($starting_entry_to_fetch, $amount_of_entries_to_fetch, $page_to_fetch, $data_requested)
    {
        $data = $this->daoservice("get");

        return $data->get($starting_entry_to_fetch, $amount_of_entries_to_fetch, $page_to_fetch, $data_requested);
    }

    public function getSome($id)
    {
        $data = $this->daoservice("get");

        return $data->getSome($id);
    }

}
