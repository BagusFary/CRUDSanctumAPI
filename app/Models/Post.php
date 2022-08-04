<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;


    // protected $fillable = ['judul', 'deskripsi'];
    protected $guarded = ['id'];
    // protected $with = ['category', 'author'];


    public function scopeFilter($query) 
    {

        if(request('search')) {
            return $query->where('judul', 'like', '%' . request('search') . '%')
                  ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
    }

    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function getRoutekeyName()
    // {
    //     return 'id';
    // }

    //public function list(){
    //    return DB::select('SELECT * FROM posts');
    //}
}

