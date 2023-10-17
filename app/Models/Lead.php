<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','email','phoneCode','phone','status','category_id','user_id','remark'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
