<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the receptions for the category
     */
    public function receptions() {
        return $this->hasMany('App\Reception', 'cat_id');

       // $receptions = Reception::find(1)->receptions;

    }


}
