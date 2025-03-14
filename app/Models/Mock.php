<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mock extends Model
{
    use HasFactory;

    protected $fillable = ['url','title','project_name','slug','user_id'];

    /** relacion 1 a Muchos Inversa */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
