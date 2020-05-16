<?php

namespace app\Command;

use app\Command\Interfaces\CommandInterface;
use app\Receiver\Accident;

class GetBetween implements CommandInterface
{

    public $accident;
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

    public function __construct(Accident $accident)
    {
        $this->accident= $accident;
    
    }

    function getAmenity($amenity){
        $this->accident="Select * from accidents where amenity=" . $amenity;
        return $this->accident;
       }
    
       
       function getJunction($junction){
        $this->accident="Select * from accidents where junction=" . $junction;
        return $this->accident;
       }
    
       
       function getBump($bump){
        $this->accident="Select * from accidents where bump=" . $bump;
        return $this->accident;
       }
    
       
       function getCrossing($crossing){
        $this->accident="Select * from accidents where crossing=" . $crossing;
        return $this->accident;
       }
    
       
       function getRailway($railway){
        $this->accident="Select * from accidents where railway=" . $railway;
        return $this->accident;
       }
       
       function getStation($station){
        $this->accident="Select * from accidents where station=" . $station;
        return $this->accident;
       }
       
       function getSunriseSunset($sunrise_sunset){
        $this->accident="Select * from accidents where sunrise_sunset=" . $sunrise_sunset;
        return $this->accident;
       }
    
       
       function getAstronomicalTwilight($astronomical_twilight){
        $this->accident="Select * from accidents where astronimical_twilight=" . $astronomical_twilight;
        return $this->accident;
       }
    

    function execute()
   {
       $this->accident->call();
   }
}