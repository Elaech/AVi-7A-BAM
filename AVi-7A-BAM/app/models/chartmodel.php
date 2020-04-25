<?php
//Done by Ionita andra
class ChartModel extends Model{

 

    public function showChart(){
        $chartdao = $this->daoservice("chartdao");
        return $chartdao->showChart();
    }


}