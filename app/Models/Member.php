<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname','first_name','middle_name',
        'dob','gender','nationality','state_of_origin','lga','tribe',
        'home_diocese','home_parish','last_parish_residence',
        'residential_address','phone','email',
        'occupation','business_address',
        'marital_status','spouse_name','spouse_phone',
        'next_of_kin','next_of_kin_phone',
        'baptism','communion','confirmation',
        'groups','passport'
    ];

    protected $casts = [
        'dob' => 'date',
        'baptism' => 'boolean',
        'communion' => 'boolean',
        'confirmation' => 'boolean',
    ];
}
