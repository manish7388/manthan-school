<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'parent_name',
        'student_name',
        'class_applying_for',
        'mobile',
        'email',
        'message',
        'status',
        'crm_status',
        'crm_response',
    ];
}