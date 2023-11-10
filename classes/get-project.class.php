<?php 

class getThemes extends Dbh{
    public function getTheme($id){
        $stmt = $this->connect()->prepare('SELECT * FROM themes WHERE theme_ID ='.$id.';');
        $stmt->execute();
        $r = $stmt->fetch();
        return $r;
    }       
}