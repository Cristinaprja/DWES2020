<?php
namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model{

    protected $table = "blog";

    public function comments()    {
        return $this->hasMany(Comment::class);
    }
}
?>