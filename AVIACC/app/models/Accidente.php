<?php
 //Done by Ionita Andra
class Accidente  extends Model
{
    private $conn;
    //private $table_name = "testing";
    private $table_name = "ACCIDENTS";

    //public $name;
    //public $accidente;


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

    public function __construct()
    {
        $this->conn = DatabaseConnection::getInstance();
    }

    public function post()
    {
        $data = $this->daoservice("post");

        return $data->post();
    }

    public function get($starting_entry_to_fetch,$amount_of_entries_to_fetch,$page_to_fetch)
    {
        $data = $this->daoservice("get");

        return $data->get($starting_entry_to_fetch,$amount_of_entries_to_fetch,$page_to_fetch);
    }

    public function getSome($id)
    {
        $data = $this->daoservice("get");

        return $data->getSome($id);
    }

/*public function getSome($data)
{
    $data = $this->daoservice("get");

    return $data->getSome($data);
}
*/
}
