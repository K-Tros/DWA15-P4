<?php

namespace Project4;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = ['comic_id','title','thumbnail_url','marvel_url','description','on_sale_date','isbn'];

    public function users()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\Project4\User')->withTimestamps();
    }
}
