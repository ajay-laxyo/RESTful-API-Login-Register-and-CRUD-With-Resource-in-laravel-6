<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Employee extends Model
{
	use HasApiTokens;

    protected $table = 'employees';

    protected $fillable = ['name', 'email', 'password', 'mobile', 'address'];
}
