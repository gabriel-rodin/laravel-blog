<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public static function getData($id)
    {
        $data = self::with('user')->with('category')->where('id',$id)->first();
        return $data;
    }

    public static function getAll($request,$id=null)
    {
        $query = Blog::query();
        $query->with('user');
        $query->with('category');
        if(!!$request->cat){
            $query->where('category_id',$request->cat);
        }
        if(!!$id){
            $query->where('user_id',$id);
        }
        $query->orderBy('created_at','desc');
        return $query->paginate(5);
    }

    public static function manageData($request,$id)
    {
        $data = self::firstOrNew(['id'=>$id]);
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->category_id = $request->category;
        $data->description = $request->description;
        $data->save();
    }

    public static function deleteData($id)
    {
        $data = self::find($id)->delete();
        return $data;
    }

}
