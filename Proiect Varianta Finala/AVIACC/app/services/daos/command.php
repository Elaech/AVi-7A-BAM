<?php
// Done by Andra Ionita
class Command
{

    private $valid_string_show = " id source tmc severity start_time end_time start_lat start_lng end_lat end_lng 
       distance description numbers street side city county state zipcode country timezone airport_code weather_timestamp 
     temperature wind_chill humidity pressure visibility wind_direction wind_speed precipitation weather_condition 
     amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
     turning_loop sunrise_sunset civil_twilight astronomical_twilight ";

    private $valid_string_boolean = " amenity bump crossing give_way junction no_exit railway roundabout station stop traffic_calming traffic_signal 
    turning_loop sunrise_sunset civil_twilight  zipcode timezone wind_direction weather_condition  airport_code weather_timestamp  country 
    astronomical_twilight  start_time end_time  end_lat end_lng  source description   street side city county state";

    private $valid_string_equals = " id tmc severity  start_lat start_lng 
    distance  numbers temperature wind_chill humidity pressure visibility  wind_speed precipitation ";

    private $valid_string_between = " id tmc severity  start_lat start_lng 
    distance  numbers  temperature wind_chill humidity pressure visibility  wind_speed precipitation ";


    public $accidentBetween = array();
    public $accidentBoolean = array();
    public $accidentEquals = array();

    public function __construct()
    {
        $this->conn = DatabaseConnection::getInstance();
    }

    ///////////////////////////////show command
    function ShowCommand($name)
    {
        $accidentShow = array();
        if (strpos($this->valid_string_show, $name)) {

            array_push($accidentShow,  ["name" =>  $name]);
        } else
            return "error";
        //return "show succes";

        return $accidentShow;
    }

    function getAccidentShow()
    {
        return $this->accidentShow;
    }

    //////////////////////////filter between
    function BetweenCommand($name, $value, $operator)
    {
        $accidentBetween = array();
        if (strpos($this->valid_string_between, $name)) {

            array_push($accidentBetween, [
                "name" => $name,
                "value" => $value,
                "operator" => $operator
            ]);
        } else
            return "error";
        // return "between succes";
        return $accidentBetween;
    }

    function getBetweenFilter()
    {
        return $this->accidentBetween;
    }

    //////////////////////////filter boolean
    function BooleanCommand($name, $value)
    {
        $accidentBoolean = array();
        if (strpos($this->valid_string_boolean, $name)) {

            array_push($accidentBoolean, [
                "name" => $name,
                "value" => $value
            ]);
        } else
            return "error";
        //return "boolean succes";
        return $accidentBoolean;
    }


    function getBooleanFilter()
    {
        return $this->accidentBoolean;
    }

    ///////////////////////filter equals
    function EqualsCommand($name, $value)
    {
        $accidentEquals = array();
        if (strpos($this->valid_string_equals, $name)) {

            array_push($accidentEquals, [
                "name" => $name,
                "value" => $value
            ]);
        } else
            return "error";
        //return "equals succes";
        return $accidentEquals;
    }

    function getEqualsFilter()
    {
        return $this->accidentEquals;
    }



    ///////////////////create select
    function createString($accidentShow, $accidentEquals, $accidentBetween, $accidentBoolean)
    {
        $sql_string = "SELECT ";


        if (empty($accidentShow))
            $sql_string .=  " * ";
        else {
            //   $sql_string .=  " id, ";
            foreach ($accidentShow as $command) {
                foreach ($command as $temp) {

                    $sql_string .= (string) $temp['name'] . ",";
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
                        $command = $row['name'] . " like '%" . $row['value'] . "%'";

                        // $command = $row['name'] . "='" . $row['value'] . "'";
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
