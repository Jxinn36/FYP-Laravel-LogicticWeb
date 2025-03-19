<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisement';
    protected $primaryKey ='advID';
    protected $fillable = ['advID','advName', 'advDesc', 'advImg', 'advCompany', 'companyRegisNo'];
}