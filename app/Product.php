<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Product extends Model implements TranslatableContract
{
    use Translatable;
   
    public $translatedAttributes = ['name','description'];
   
    protected $guarded = [];
    

    public function category(){

        return $this->belongsTo(Category::class);

    }


}
