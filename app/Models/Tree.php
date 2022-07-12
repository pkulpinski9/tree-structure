<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    public $fillable = [
        'name',
        'parent_id'
    ];

    public function childs() {
        return $this->hasMany('App\Models\Tree', 'parent_id', 'id');
    }

    use HasFactory;
}
