<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'pm_category';
    protected $primaryKey = 'id'; 
    protected $guarded = ['id'];
}
