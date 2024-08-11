<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;


    public static array $experience = ['beginner', 'intermediate', 'expert'];
    public static array $categories = ['IT', 'Engineering', 'Marketing', 'Design', 'Sales', 'Writing', 'Healthcare', 'Other'];
}
