<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;



class Task extends Model
{
    use HasFactory, HasRoles;
    protected $connection = 'mongodb';
    protected $collection = 'tasks';


    protected $guarded = [];
    protected $fillable = [
        'task_name',
        'category',
        'status',
        'task_description',
        'end_date',
        'admin_id',
    ];
}
