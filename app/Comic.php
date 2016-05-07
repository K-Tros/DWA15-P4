<?php

namespace Project4;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = ['comic_id','title','thumbnail_url','marvel_url','description','on_sale_date','isbn'];

    public function users()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\Project4\User')->withTimestamps()->withPivot('collection','wishlist');
    }

    public static function getComicsForCurrentUser()
    {
        $user = \Project4\User::where('id', '=', \Auth::id())->first();
        return $user->comics;
    }

    public static function comicSearch($request) {
        return \Project4\Comic::where('title', 'LIKE', '%'.$request->input('title', '').'%')->orderBy('title','desc')->get();
    }
}
