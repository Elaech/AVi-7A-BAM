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

   function getId($id1, $id2){
    $this->accident="Select * from accidents where id<=" . $id1 . " and id>=" . $id2;
    return $this->accident;
   }

   
   function getTMC($tmc1,$tmc2){
    $this->accident="Select * from accidents where TMC<=" . $tmc1 . " and TMC>=" . $tmc2;
    return $this->accident;
   }

   
   function getSeverity($severity1, $severity2){
    $this->accident="Select * from accidents where severity<=" . $severity1 . " and severity>=" . $severity2;
    return $this->accident;
   }

   
   function getDistance($distance1, $distance2){
    $this->accident="Select * from accidents where distance<=" . $distance1 . " and distance>=" . $distance2;
    return $this->accident;
   }

   
   function getNumbers($numbers1, $numbers2){
    $this->accident="Select * from accidents where numbers<=" . $numbers1 . " and numbers>=" . $numbers2;
    return $this->accident;
   }
   
   function getTemperature($temperature1, $temperature2){
    $this->accident="Select * from accidents where temperature<=" . $temperature1 . " and temperature>=" . $temperature2;
    return $this->accident;
   }
   
   function getPrecipitation($precipitation1, $precipitation2){
    $this->accident="Select * from accidents where precipitation<=" . $precipitation1 . " and precipitation>=" . $precipitation2;
    return $this->accident;
   }

   
   function getVisibility($visibility1, $visibility2){
    $this->accident="Select * from accidents where visibility<=" . $visibility1 . " and visibility>=" . $visibility2;
    return $this->accident;
   }


    function execute()
   {
       $this->accident->call();
   }
}