<?php

class Command
{

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


    ///////////////////////////////show command
    function ShowCommand($name)
    {
        if (strpos($this->valid_string_show, $name)) {

            array_push($this->accidentShow, $name);
        } else
            return "error";
    }

    function getAccidentShow()
    {
        return $this->accidentShow;
    }

    //////////////////////////filter between
    function BetweenCommand($name, $value, $operator)
    {

        if (strpos($this->valid_string_between, $name)) {

            array_push($this->accidentBetween, [
                "name" => $name,
                "value" => $value,
                "operator" => $operator
            ]);
        } else
            return "error";
    }

    function getBetweenFilter()
    {
        return $this->accidentBetween;
    }

    //////////////////////////filter boolean
    function BooleanCommand($name, $value)
    {

        if (strpos($this->valid_string_boolean, $name)) {

            array_push($this->accidentBoolean, [
                "name" => $name,
                "value" => $value
            ]);
        } else
            return "error";
    }


    function getBooleanFilter()
    {
        return $this->accidentBoolean;
    }

    ///////////////////////filter equals
    function EqualsCommand($name, $value)
    {

        if (strpos($this->valid_string_equals, $name)) {

            array_push($this->accidentEquals, [
                "name" => $name,
                "value" => $value
            ]);
        } else
            return "error";
    }

    function getEqualsFilter()
    {
        return $this->accidentEquals;
    }



    ///////////////////create select
    function createString()
    {
        $sql_string = "SELECT ";


        foreach ($this->accidentShow as $command) {
            $sql_string .= (string) $command . ",";
        }

        $sql_string =rtrim( $sql_string,',');
        $sql_string .= " FROM ACCIDENTS";

        if (!empty($this->accidentBetween) || !empty($this->accidentBoolean) || !empty($this->accidentEquals)) {

            $sql_string .= " WHERE ";

            if (!empty($this->accidentBetween)) {
                $command = "";

                foreach ($this->accidentBetween as $row) {
                    $command = $row['name'] . $row['operator'] . $row['value'];
                    $sql_string .= (string) $command . " AND ";
                    $command = "";
                }
            } else if (!empty($accidentBoolean)) {

                $command = "";

                foreach ($this->accidentBoolean as $row) {
                    $command = $row['name'] . "=" . $row['value'];
                    $sql_string .= (string) $command . " AND ";
                    $command = "";
                }
            } else  if (!empty($accidentEquals)) {

                $command = "";

                foreach ($this->accidentEquals as $row) {
                    $command = $row['name'] . "=" . $row['value'];
                    $sql_string .= (string) $command . " AND ";
                    $command = "";
                }
            }
        }

    
        $sql_string =rtrim( $sql_string,"AND");
        return $sql_string;
    }
}
