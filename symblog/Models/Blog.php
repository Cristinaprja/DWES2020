<?php  
class Blog{
    private $id;
    private $title;
    private $blog;
    private $image;
    private $author;
    private $tags;
    private $created;
    private $updated;
    private $comments = array();

    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setBlog($blog){
        $this->blog = $blog;
    }
    public function getBlog()
    {
        return $this->blog;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setTags($tags){
        $this->tags = $tags;
    }
    public function getTags(){
        return $this->tags;
    }
    public function setCreated($created){
        $this->created = $created;
    }
    public function getCreated(){
        return $this->created;
    }
    public function setUpdated($uptaded){
        $this->uptaded = $uptaded;
    }
    public function getUpdated(){
        return $this->updated;
    }
    public function addComment($comment){
        array_push($this->comments, $comment);
    }
    public function getNumComments(){
        return sizeof($this->comments);
    }
}
?>