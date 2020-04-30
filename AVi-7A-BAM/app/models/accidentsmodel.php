<?php
//Done by Ionita andra
class AccidentsModel extends Model{

 

    public function getFullTableData(){
        $chartdao = $this->daoservice("accidentdao");
        return $chartdao->getFullTableData();
    }


}