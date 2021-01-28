<?php  
class Comment{
    private $id;
    private $blog;
    private $user;
    private $comment;
    private $approved;
    private $created;
    private $updated;

    public function setUser($user){
        $this->user = $user;
    }
    public function getUser(){
        return $this->user;
    }
    public function setComment($comment){
        $this->comment = $comment;
    }
    public function getComment(){
        return $this->comment;
    }
    public function setBlog($blog){
        $this->blog = $blog;
    }
    public function setApproved($approved){
        $this->approved = $approved;
    }
    public function setCreated($created){
        $this->created = $created;
    }
    public function setUpdated($uptaded){
        $this->uptaded = $uptaded;
    }
}
?>