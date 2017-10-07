<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function loadData($data = [])
    {
        if (count($data)> 0){
            foreach($data as $col =>$val){
                $this->{$col} = $val;
            }
        }
    }/**/
}
