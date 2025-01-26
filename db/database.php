<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
    }

    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo, prezzoarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories(){
        $stmt = $this->db->prepare("SELECT * FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryById($idcategory){
        $stmt = $this->db->prepare("SELECT nomecategoria FROM categoria WHERE idcategoria=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoriesFromPost($idarticolo){
        $stmt = $this->db->prepare("SELECT categoria FROM articolo_ha_categoria WHERE articolo=?");
        $stmt->bind_param('i',$idarticolo);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, dataarticolo, nome, prezzoarticolo FROM articolo, venditore WHERE venditore=idvenditore ORDER BY dataarticolo DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, nome, prezzoarticolo FROM articolo, venditore WHERE idarticolo=? AND venditore=idvenditore";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByCategory($idcategory){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, dataarticolo, nome, prezzoarticolo FROM articolo, venditore, articolo_ha_categoria WHERE categoria=? AND venditore=idvenditore AND idarticolo=articolo";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByIdAndAuthor($id, $idauthor){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, prezzoarticolo, (SELECT GROUP_CONCAT(categoria) FROM articolo_ha_categoria WHERE articolo=idarticolo GROUP BY articolo) as categorie FROM articolo WHERE idarticolo=? AND venditore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id, $idauthor);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByAuthorId($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, testoarticolo, prezzoarticolo FROM articolo WHERE venditore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDescriptionByAuthorId($id){
        $query = "SELECT brevedescrizione FROM venditore WHERE idvenditore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAuthorbyidArticle($idarticolo){
        $query = "SELECT nome, brevedescrizione, username FROM venditore,articolo WHERE venditore=idvenditore AND idarticolo=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idarticolo);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertAuthor($username, $password, $nome, $brevedescrizione, $via, $comune, $cap){
        $query = "INSERT INTO venditore (username, password, nome, brevedescrizione, via, comune, cap) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssd',$username, $password, $nome, $brevedescrizione, $via, $comune, $cap);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function insertArticle($titoloarticolo, $testoarticolo, $dataarticolo, $imgarticolo, $venditore, $prezzoarticolo){
        $query = "INSERT INTO articolo (titoloarticolo, testoarticolo, dataarticolo, imgarticolo, venditore, prezzoarticolo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssid',$titoloarticolo, $testoarticolo, $dataarticolo, $imgarticolo, $venditore, $prezzoarticolo);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateArticleOfAuthor($idarticolo, $titoloarticolo, $testoarticolo, $dataarticolo, $imgarticolo, $venditore, $prezzoarticolo){
        $query = "UPDATE articolo SET titoloarticolo = ?, testoarticolo = ?, dataarticolo = ?, imgarticolo = ?, prezzoarticolo = ? WHERE idarticolo = ? AND venditore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssdii',$titoloarticolo, $testoarticolo, $datarticolo, $imgarticolo, $prezzoarticolo, $idarticolo, $venditore);
        
        return $stmt->execute();
    }

    public function deleteArticleOfAuthor($idarticolo, $venditore){
        $query = "DELETE FROM articolo WHERE idarticolo = ? AND venditore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idarticolo, $venditore);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function insertCategoryOfArticle($articolo, $categoria){
        $query = "INSERT INTO articolo_ha_categoria (articolo, categoria) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$articolo, $categoria);
        return $stmt->execute();
    }

    public function deleteCategoryOfArticle($articolo, $categoria){
        $query = "DELETE FROM articolo_ha_categoria WHERE articolo = ? AND categoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$articolo, $categoria);
        return $stmt->execute();
    }

    public function deleteCategoriesOfArticle($articolo){
        $query = "DELETE FROM articolo_ha_categoria WHERE articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$articolo);
        return $stmt->execute();
    }
    public function deleteCartOfArticle($articolo){
        $query = "DELETE FROM venditore_ha_articolo WHERE articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$articolo);
        return $stmt->execute();
    }

    public function getAuthors(){
        $query = "SELECT username, nome, GROUP_CONCAT(DISTINCT nomecategoria) as argomenti FROM categoria, articolo, autore, articolo_ha_categoria WHERE idarticolo=articolo AND categoria=idcategoria AND autore=idautore AND attivo=1 GROUP BY username, nome";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $query = "SELECT idvenditore, username, nome FROM venditore WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function deleteArticle($idarticolo){
        $query = "DELETE FROM articolo WHERE idarticolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idarticolo);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }
    public function searchArticle($research){
        $string = "%".$research."%";
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, dataarticolo, prezzoarticolo FROM articolo WHERE titoloarticolo LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$string);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insertNotifica($testonotifica){
        $letto = 0;
        $query = "INSERT INTO notifiche (contenutonotifica, letto) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$testonotifica, $letto);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function insertNotificaAlVenditore($venditore, $notifica){
        $query = "INSERT INTO venditore_ha_notifiche (venditore, notifica) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$venditore, $notifica);
        return $stmt->execute();
    }

    public function getLastNotifica(){
        $query = "SELECT idnotifica FROM notifiche ORDER BY idnotifica DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertArticleAlVenditore($venditore, $articolo){
        $query = "INSERT INTO venditore_ha_articolo (venditore, articolo) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$venditore, $articolo);
        return $stmt->execute();
    }
    public function deleteArticleAlVenditore($venditore, $articolo){
        $query = "DELETE FROM venditore_ha_articolo WHERE venditore = ? AND articolo = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$venditore, $articolo);
        return $stmt->execute();
    }

    public function getNotificationsByAuthorId($venditore){
        $query = "SELECT notifica FROM venditore_ha_notifiche WHERE venditore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$venditore);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotificationById($idnotifica){
        $query = "SELECT contenutonotifica, letto FROM notifiche WHERE idnotifica = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idnotifica);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setLetto($idnotifica, $letto){
        $query = "UPDATE notifiche SET letto = ? WHERE idnotifica = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$letto, $idnotifica);
        
        return $stmt->execute();
    }
    public function getArticlesByAuthors($venditore){
        $query = "SELECT articolo FROM venditore_ha_articolo WHERE venditore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$venditore);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>