<?php

class Articles extends Blog {

    public function __construct() {
        parent::__construct();
        $this->toolsImg = new ImageTools;
        $this->tags = new Tags;
    }

    public function getblogs() {
        $query='SELECT articles.*, categories.name, categories.id_category  FROM articles JOIN categories ON categories.id_category=articles.id_category';
        $res = $this->pdo -> prepare($query);
        $res -> execute();
        $results = $res -> fetchAll(PDO::FETCH_ASSOC);
        $res -> closeCursor();
        $results=$this->tagsArticles($results);
        return $results;   
    }

    private function tagsArticles($results) {
        $return=[];
        foreach ($results as $row) {
            $return[]=$this->tagsArticle($row);
        }
        return $return;
    }

    private function tagsArticle($result) {
        $tags=$this->tags->getTagsArticle($result['id']);
        $tabTags=[];
        foreach ($tags as $tag) {
            $tabTags[]=$tag['name_tag'];
        }
        $result['tags']=$tabTags;
        return $result;
    }

    public function getblog($id) {
        $query='SELECT * FROM articles where id=:id';
        $res = $this->pdo -> prepare($query);
        $res -> bindValue(':id', $id, PDO::PARAM_INT);
        $res -> execute();
        $result = $res -> fetch(PDO::FETCH_ASSOC);
        $res -> closeCursor(); 
        $result=$this->tagsArticle($result);
        return $result;   
    }

    public function insert () {
        $return = false;
        $query='INSERT INTO articles (title, lang, shortcontent, content, published, date_add, id_category) 
                values (:title, :lang, :shortcontent, :content, :published, now(), :id_category)';
        $res = $this->pdo -> prepare($query);
        $res -> bindValue(':title', $this->post['title'], PDO::PARAM_STR);
        $res -> bindValue(':lang', $this->post['lang'], PDO::PARAM_STR);
        $res -> bindValue(':shortcontent', $this->post['shortcontent'], PDO::PARAM_STR);
        $res -> bindValue(':content', $this->post['content'], PDO::PARAM_STR);
        $res -> bindValue(':published', $this->post['published'], PDO::PARAM_BOOL);
        $res -> bindValue(':id_category', $this->post['idCategory'], PDO::PARAM_INT);
        if ($res -> execute()) { 
            $return =true; 
            $id=$this->pdo->lastInsertId();
            if (file_exists($_FILES['cover']['tmp_name'])) {
                $this->toolsImg->addCover($id);
            } 
        }
        if ($this->post['tags_name']!='') {
            $tags_name=explode(",", $this->post['tags_name']);
            $this->tags->addTags($tags_name, $id);
        }
        // echo '<pre>';
        // echo $res->debugDumpParams();
        // echo '</pre>';
        $res -> closeCursor();
        return $return;
    }

    public function update() {
        $return = false;
        $query='UPDATE articles 
                SET title=:title, lang=:lang, id_category=:id_category, shortcontent=:shortcontent, content=:content, published=:published, date_up=now() 
                WHERE id=:id';
        $res = $this->pdo -> prepare($query);
        $res -> bindValue(':id', $this->post['id'], PDO::PARAM_INT);
        $res -> bindValue(':id_category', $this->post['idCategory'], PDO::PARAM_INT);
        $res -> bindValue(':title', $this->post['title'], PDO::PARAM_STR);
        $res -> bindValue(':lang', $this->post['lang'], PDO::PARAM_STR);
        $res -> bindValue(':shortcontent', $this->post['shortcontent'], PDO::PARAM_STR);
        $res -> bindValue(':content', $this->post['content'], PDO::PARAM_STR);
        $res -> bindValue(':published', $this->post['published'], PDO::PARAM_BOOL);
        if ($res -> execute()) { $return =true; }
        $res -> closeCursor();
        if (file_exists($_FILES['cover']['tmp_name'])) {
            $this->toolsImg->addCover($this->post['id']);
        } 
        if ($this->post['tags_name']!='') {
            $this->tags->clearTagsArticle($this->post['id']);
            $tags_name=explode(",", $this->post['tags_name']);
            $this->tags->addTags($tags_name, $this->post['id']);
        }
        return $return;
    }

    public function delete($id) {
        $query='DELETE FROM articles WHERE id=:id';
        $res=$this->pdo->prepare($query);
        $res->bindValue(':id', $id, PDO::PARAM_STR);
        $res->execute();
        $res->closeCursor();
        $this->toolsImg->deleteCover($id);
        // echo $res->debugDumpParams();
    }

    public function imagedelete($id) {
        $this->toolsImg->deletCover($this->post['id']); 
    }

    public function published($id, $status) {
        $query='UPDATE articles SET published=:status  WHERE id=:id';
        $res=$this->pdo->prepare($query);
        $res->bindValue(':id', $id, PDO::PARAM_STR);
        $res->bindValue(':status', $status, PDO::PARAM_STR);
        $res->execute();
        $res->closeCursor();
    }
}