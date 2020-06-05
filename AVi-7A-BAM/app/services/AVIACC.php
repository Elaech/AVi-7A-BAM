<?php
//Done by Ionita Andra & Bogdan Cretu
class AVIACC
{


    function getAccidentsDataRequest($data){
       //header("Content-Type: text/plain");
        $url = Constants::ACC_DETAILS['url'];
       // $data=array();
		//$data=["id"=> $id, "page"=>$page,"amount"=>$amount,"show"=>$show,"boolean"=>$boolean,"equals"=>$equals,"between"=>$between];
       
       $temp=json_decode($data,true);
        $temp['amount']=1000;

        //var_dump($data);
		$data_json = array(
            'http' => array(
                'header'  => "Content-Type: text/plain\r\n",
                'method'  => Constants::ACC_DETAILS['method'],
                'content' => json_encode($temp)
               //'content' => $data
            )
        );


        $context  = stream_context_create($data_json);
        try{
        $result = file_get_contents($url, false, $context);
        }catch(Exception $ignored){echo "Ceva nu e ok";}
       // var_dump($data);
        if ($result === FALSE || $result==null) { 
            return null;
        }
        else{
       return $result;
        }
    }
}
