<?php

namespace App\Model;


use PDO;

use App\Model\AbstractManager;

class HomeManager extends AbstractManager
{

    public function selectByReponses(array $reponses)
    {
        // $statement = $this->pdo->prepare("SELECT * FROM artiste ");
        $where = "where ";
        $i=0;
        foreach($reponses as $key => $reponse) {
            $exclamation="";
            $isdiff=str_split($reponse);
            if($isdiff[0]=="!") {
                $exclamation = "!";
            }
            if($i==0) {
                $where .= "$key ".$exclamation."= :reponse".$i;
            }
            else {
                $where .= " AND $key".$exclamation."=:reponse".$i;
            }
            $i++;
        }

        $statement = $this->pdo->prepare("SELECT * FROM artiste " . $where);
        $i=0;
        foreach($reponses as $key => $reponse){
            $isdiff=str_split($reponse);
            if($isdiff[0]=="!") {
                $reponse="";
                for($cle=1; $cle<count($isdiff); $cle++) {
                    $reponse .= $isdiff[$i];
                }
            }
            $statement->bindValue(":reponse".$i, $reponse, PDO::PARAM_STR);
            $i++;
        }
        $statement->execute();
        return $statement->fetchAll();
    }

}