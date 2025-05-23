<?php

//app/Models/Task.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    protected $fillable = ['name', 'priority']; //الحقول التي يمكن تعبئتها
}