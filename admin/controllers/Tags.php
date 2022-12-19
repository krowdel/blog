<?php 
class Tags extends Blog {
    public function __construct() {
        parent::__construct();
    }

    public function getTagsName() {
        $query='SELECT COUNT(id_article) as qua_article, name_tag FROM tags GROUP BY name_tag';
        $res = $this->pdo -> prepare($query);
        $res -> execute();
        $results = $res -> fetchAll(PDO::FETCH_ASSOC);
        $res -> closeCursor();  
        return $results;  
    }

    public function deletTag($nameTag) {
        $query='DELETE FROM tags WHERE name_tag=:nametag';
        $res = $this->pdo->prepare($query);
        $res->bindValue(':nametag', $nameTag, PDO::PARAM_STR);
        $res->execute();
        $res->closeCursor();
    }

    public function getTagsArticle(int $id_article) {
        $query='select * FROM tags WHERE id_article=:id_article';
        $res=$this->pdo->prepare($query);
        $res->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $res->execute();
        $results=$res->fetchAll(PDO::FETCH_ASSOC);
        $res->closeCursor();
        return $results;
    }

    public function clearTagsArticle(int $id_article) {
        $query='DELETE FROM tags WHERE id_article=:id_article';
        $res=$this->pdo->prepare($query);
        $res->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $res->execute();
        $res->closeCursor();
    }

    public function addTags(array $tags, int $id_article) {
        $query='INSERT INTO tags (name_tag, id_article) values (:name_tag, :id_article)';
        if ($tags!='') {
            $res = $this->pdo -> prepare($query);
            foreach ($tags as $row) {
                $row=trim($row);
                $res -> bindParam(':name_tag', $row, PDO::PARAM_STR);
                $res -> bindParam(':id_article', $id_article, PDO::PARAM_INT);
                $res->execute();
            }
            $res->closeCursor();
        }
    }
}