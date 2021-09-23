<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";

    protected $fillable = ['description', 'category_id'];

    public $timestamps = true;
    public $incrementing = false;
    public $keyType = 'char';

    public function category_task()
    {
        return $this->belongsTo(CategoryTask::class);
    }
}
