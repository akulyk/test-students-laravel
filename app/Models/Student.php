<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    // Sortable Behavior
    use Sortable;

    protected $fillable = array('user_id');

    public $sortable = ['id', 'firstname', 'lastname', 'group_number', 'rates'];
}
