<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $guarded = [''];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'c_parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'c_parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
