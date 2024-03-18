<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;



class Task extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'Tasks';


    protected $guarded = [];
    protected $fillable = [
        'task_name',
        'category',
        'status',
        'completion_percentage',
        'task_description',
    ];
}
