<?php

namespace Project4;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = ['comic_id','thumbnail_url','marvel_url','description','on_sale_date','isbn'];

}
