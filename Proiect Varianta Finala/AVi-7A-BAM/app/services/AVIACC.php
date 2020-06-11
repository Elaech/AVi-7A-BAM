<?php
//Done by Ionita Andra & Bogdan Cretu
class AVIACC
{

    function getAccidentsDataRequest($data){

        $url = Constants::ACC_DETAILS['url'];
        $temp=json_decode($data,true);
        $temp['amount']=-11;

		$data_json = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::ACC_DETAILS['method'],
                'content' => json_encode($temp)
            )
        );

        $context  = stream_context_create($data_json);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){}
        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
       return $result;
        }
    }
}
