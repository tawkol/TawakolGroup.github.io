<?php 
class Recent_project extends Dbh {
    public function project(){
        $stmt = $this->connect()->prepare('SELECT th.`theme1`, wo.`worker_fname`, wo.`worker_ID`, wo.`profile_img` FROM themes th, workers wo WHERE th.`worker_ID` = wo.`worker_ID` ORDER BY th.`theme_ID` DESC LIMIT 5 ;');
        $stmt->execute();
        return $stmt;
    }
}
?>
