<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];

    static function searchEvents($search)
    {
        return Event::orWhere([
            ['title', 'like', '%' . $search . '%'],
        ])->orWhere([
            ['description', 'like', '%' . $search . '%'],
        ])->orWhere([
            ['city', 'like', '%' . $search . '%'],
        ])->get()->sortBy('date');
    }

    static function getAllEvents()
    {
        return Event::all()->sortBy('date');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function users() 
    {
        return $this->belongsToMany('App\Models\User');
    }

}
