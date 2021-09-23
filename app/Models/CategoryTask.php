<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTask extends Model
{
    use HasFactory;

    protected $table = "category_task";

    protected $fillable = ['name', 'icon'];

    public $timestamps = true;
    public $incrementing = false;
    public $keyType = 'char';

    public function task()
    {
        return $this->hasMany(Task::class, 'category_id', 'id');
    }
}
