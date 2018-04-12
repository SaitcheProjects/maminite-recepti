<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    protected $fillable = ['name', 'products', 'preparation', 'cat_id', 'prepareTime'];

    /**
     * Get the category that owns the reception.
     */
    public function category() {
        return $this->belongsTo('App\Category', 'cat_id');
    }

}
