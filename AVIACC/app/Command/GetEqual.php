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

   function getId(){
    $this->accident="Select * from accidents where id=" . $this->id;
    return $this->accident;
   }

   
   function getSource(){
    $this->accident="Select * from accidents where Source=" . $this->source;
    return $this->accident;
   }

   
   function getTMC(){
    $this->accident="Select * from accidents where TMC=" . $this->TMC;
    return $this->accident;
   }

   
   function getSeverity(){
    $this->accident="Select * from accidents where severity=" . $this->severity;
    return $this->accident;
   }

   
   function getDistance(){
    $this->accident="Select * from accidents where distance=" . $this->distance;
    return $this->accident;
   }

   
   function getNumbers(){
    $this->accident="Select * from accidents where numbers=" . $this->numbers;
    return $this->accident;
   }
   
   function getStreet(){
    $this->accident="Select * from accidents where street=" . $this->street;
    return $this->accident;
   }
   
   function getCounty(){
    $this->accident="Select * from accidents where county=" . $this->county;
    return $this->accident;
   }

   
   function getCountry(){
    $this->accident="Select * from accidents where country=" . $this->country;
    return $this->accident;
   }

   


    function execute()
   {
       $this->accident->call();
   }
}