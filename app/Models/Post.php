<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;


 
    protected $guarded = ['id'];



    public function scopeFilter($query) 
    {

        if(request('search')) {
            return $query->where('judul', 'like', '%' . request('search') . '%')
                  ->orWhere('deskripsi', 'like', '%' . request('search') . '%');
        }
    }

 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

 

}

