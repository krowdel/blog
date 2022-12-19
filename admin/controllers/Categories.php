<?php

class Categories extends Blog {

    public function __construct() {
        parent::__construct();
    }

    public function getAllCategories() {
        $query='SELECT * FROM categories';
        $res = $this->pdo -> prepare($query);
        $res -> execute();
        $results = $res -> fetchAll(PDO::FETCH_ASSOC);
        $res -> closeCursor();
        $results = $this->statistic($results);    
        return $results;   
    }

    private function statistic($results) {
        $query='SELECT id_category, COUNT(*) AS num FROM articles GROUP BY id_category';
        $res = $this->pdo -> prepare($query);
        $res -> execute();
        $statistic = $res -> fetchAll(PDO::FETCH_ASSOC);
        $res -> closeCursor();
        $modify=[];
        foreach ($results as $result){
            foreach ($statistic as $row) {
                if ($row['id_category']==$result['id_category']){
                    $result['quantity_article']=$row['num'];
                }
            }
            $modify[]=$result;
        }
        return $modify;
    }

    public function getCategories() {
        $query='SELECT * FROM categories WHERE active=true';
        $res = $this->pdo -> prepare($query);
        $res -> execute();
        $results = $res -> fetchAll(PDO::FETCH_ASSOC);
        $res -> closeCursor();
        return $results;   
    }

    public function getCategory($id) {
        $query='SELECT * FROM categories where id_category=:id';
        $res = $this->pdo -> prepare($query);
        $res -> bindValue(':id', $id, PDO::PARAM_INT);
        $res -> execute();
        $result = $res -> fetch(PDO::FETCH_ASSOC);
        $res -> closeCursor(); 
        return $result;   
    }

    public function insert() {
        $return = false;
        $query='INSERT INTO categories (name, lang, active) 
                values (:name, :lang, :active)';
        $res = $this->pdo -> prepare($query);
        $res -> bindValue(':name', $this->post['name'], PDO::PARAM_STR);
        $res -> bindValue(':lang', $this->post['lang'], PDO::PARAM_STR);
        $res -> bindValue(':active', $this->post['published'], PDO::PARAM_BOOL);
        if ($res -> execute()) { $return =true; }
        // echo '<pre>';
        // echo $res->debugDumpParams();
        // echo '</pre>';
        $res -> closeCursor();
        return $return;
    }

    public function update() {
        $return = false;
        $query='UPDATE categories 
                SET name=:name, lang=:lang, active=:active 
                WHERE id_category=:id';
        $res = $this->pdo -> prepare($query);
        // var_dump($this->post);
        $res -> bindValue(':id', $this->post['id'], PDO::PARAM_INT);
        $res -> bindValue(':name', $this->post['name'], PDO::PARAM_STR);
        $res -> bindValue(':lang', $this->post['lang'], PDO::PARAM_STR);
        $res -> bindValue(':active', $this->post['published'], PDO::PARAM_BOOL);
        if ($res -> execute()) { $return =true; }
        $res -> closeCursor();
        return $return;
    }

    public function delete($id) {
        $query='DELETE FROM categories WHERE id_category=:id';
        $res=$this->pdo->prepare($query);
        $res->bindValue(':id', $id, PDO::PARAM_STR);
        $res->execute();
        $res->closeCursor();
        $this->toolsImg->deleteCover($id);
        // echo $res->debugDumpParams();
    }

    public function activation($id, $status) {
        $query='UPDATE categories SET active=:active  WHERE id_category=:id';
        $res=$this->pdo->prepare($query);
        $res->bindValue(':id', $id, PDO::PARAM_STR);
        $res->bindValue(':active', $status, PDO::PARAM_STR);
        $res->execute();
        $res->closeCursor();
    }
}