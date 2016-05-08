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
        return \Project4\Comic::where('title', 'LIKE', '%'.$request->input('title', '').'%')->orderBy('title','asc')->get();
    }

    public static function addComicToUserCollection($id) {
        // find current user
        $user = \Project4\User::where('id', '=', \Auth::id())->first();

        // first, see if there is already an entry in the ComicUser table for this combination
        $comics = $user->comics;
        $exists = false;
        foreach ($user->comics as $comic) {
            if ($comic->id == $id) {
                $exists = true;
            }
        }
        // IF there is, set the collection value to 1
        if($exists) {
            $user->comics()->updateExistingPivot($id, ['collection_count'=> 1]);
        }
        // IF there is not, create new row in ComicUser table with collection value as 1
        else {
            $comic = \Project4\Comic::where('id','LIKE',$id)->first();
            # Connect this comic to this user
            # (create a many to many entry)
            $user->comics()->save($comic, array('collection_count' => 1, 'wishlist_count' => 0));
        }
    }

    public static function addComicToUserWishList($id) {
        // find current user
        $user = \Project4\User::where('id', '=', \Auth::id())->first();

        // first, see if there is already an entry in the ComicUser table for this combination
        $comics = $user->comics;
        $exists = false;
        foreach ($user->comics as $comic) {
            if ($comic->id == $id) {
                $exists = true;
            }
        }
        // IF there is, set the collection value to 1
        if($exists) {
            $user->comics()->updateExistingPivot($id, ['wishlist'=> 1]);
        }
        // IF there is not, create new row in ComicUser table with collection value as 1
        else {
            $comic = \Project4\Comic::where('id','LIKE',$id)->first();
            # Connect this comic to this user
            # (create a many to many entry)
            $user->comics()->save($comic, array('collection_count' => 0, 'wishlist_count' => 1));
        }
    }
}
