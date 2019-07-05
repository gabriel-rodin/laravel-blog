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

    public static function manageData($request)
    {
        $data = self::firstOrNew(['id'=>$request->id]);
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->save();
    }
}
