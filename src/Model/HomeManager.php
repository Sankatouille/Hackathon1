<?php

namespace App\Model;
Use PDO;

use App\Model\AbstractManager;

class HomeManager extends AbstractManager
{

    public function selectByReponses(array $reponses)
    {
        // $statement = $this->pdo->prepare("SELECT * FROM artiste ");
        $where = "where ";
        $i=0;
        foreach($reponses as $key => $reponse) {
            if($i==0) {
                $where .= "$key = :reponse".$i;
            }
            else {
                $where .= " AND $key=:reponse".$i;
            }
            $i++;
        }

        $statement = $this->pdo->prepare("SELECT * FROM artiste " . $where);
        $i=0;
        foreach($reponses as $key => $reponse){
            $statement->bindValue(":reponse".$i, $reponse, PDO::PARAM_STR);
            $i++;
        }
        $statement->execute();
        return $statement->fetchAll();
    }

}