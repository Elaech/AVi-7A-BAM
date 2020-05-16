<?php

class Command
{

    private $valid_string_show = " id source tmc severity start_time end_time start_lat start_lng end_lat end_lng 
       distance description numbers street side city county state zipcode country timezone airport_code weather_timestamp 
     temperature wind_chill humidity pressure visibility wind_direction wind_speed precipitation weather_condition 
     amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
     turning_loop sunrise_sunset civil_twilight astronomical_twilight ";

    private $valid_string_boolean = " amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
   turning_loop sunrise_sunset civil_twilight astronomical_twilight ";

    private $valid_string_equals = " id  source tmc severity start_time end_time start_lat start_lng end_lat end_lng 
   distance description numbers street side city county state zipcode country timezone airport_code weather_timestamp 
 temperature wind_chill humidity pressure visibility wind_direction wind_speed precipitation weather_condition 
 amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
 turning_loop sunrise_sunset civil_twilight astronomical_twilight ";

    private $valid_string_between = " id tmc severity start_time end_time start_lat start_lng end_lat end_lng 
 distance  numbers  weather_timestamp temperature wind_chill humidity pressure visibility wind_direction wind_speed precipitation ";

    public $accidentShow = array();
    public $accidentBetween = array();
    public $accidentBoolean = array();
    public $accidentEquals = array();


    ///////////////////////////////show command
    function ShowCommand($name)
    {
        if (strpos($this->valid_string_show, $name)) {

            array_push($this->accidentShow, $name);
        } else
            return "error";
        //return "show succes";
       return $this->accidentShow;
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
       // return "between succes";
       return $this->accidentBetween;
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
        //return "boolean succes";
        return $this->accidentBoolean;
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
        //return "equals succes";
        return $this->accidentEquals;
    }

    function getEqualsFilter()
    {
        return $this->accidentEquals;
    }



    ///////////////////create select
    function createString($accidentShow, $accidentEquals, $accidentBetween,$accidentBoolean)
    {
        $sql_string = "SELECT ";


        if (empty($accidentShow))
            $sql_string .=  " * ";
        else {
            foreach ($accidentShow as $command) {
                foreach ($command as $temp) {
                $sql_string .= (string) $temp . ",";
            }
        }
    }
        $sql_string = rtrim($sql_string, ',');
        $sql_string .= " FROM ACCIDENTS";

        if (!empty($accidentBetween) || !empty($accidentBoolean) || !empty($accidentEquals)) {

            $sql_string .= " WHERE ";

           if (!empty($accidentBetween)) {
                $command = "";

                foreach ($accidentBetween as $temp) {
                    foreach ($temp as $row) {
                    $command = $row['name'] . $row['operator'] . $row['value'];
                    $sql_string .= (string) $command . " AND ";
                    }
                
                }
            } 
             if (!empty($accidentBoolean)) {

                $command = "";

                foreach ($accidentBoolean as $temp) {
                    foreach ($temp as $row) {
                    $command = $row['name'] . "=" . $row['value'];
                    $sql_string .= (string) $command . " AND ";
                    $command = "";
                    }
                }
            } 
             if (!empty($accidentEquals)) {

                $command = "";

                foreach ($accidentEquals as $temp) {
                    foreach ($temp as $row) {
                    $command = $row['name'] . "=" . $row['value'];
                    $sql_string .= (string) $command . " AND ";
                    $command = "";
                    }
                }
            }
        }


        $sql_string = rtrim($sql_string, 'AND ');
        return $sql_string;
    }
}
