<?php 

class Blog {
    protected $config;
    protected $post;
    protected $pdo;

    public function __construct() {
        $json =  file_get_contents('../../config.json');
        $this->config = json_decode($json);
        $this->post=$_POST;
        $this->pdo = new PDO('mysql:host='.$this->config->host.';dbname='.$this->config->db_blog, $this->config->user, $this->config->password);
        $this->pdo->exec("SET NAMES utf8");
    }
}