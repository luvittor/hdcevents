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
        // preparando a string de busca
        $search = trim($search);
        while(strstr("  ", $search)) {
            $search = str_replace("  ", " ", $search);
        }

        // separando as palavras
        $search = explode(" ", $search);

        // preparando a query
        $events = Event::select('*');

        // montando a query
        foreach($search as $value) {
            $events->Where(function($query) use ($value) {
                $query->Where([
                    ['title', 'like', '%' . $value . '%'],
                ])->orWhere([
                    ['description', 'like', '%' . $value . '%'],
                ])->orWhere([
                    ['city', 'like', '%' . $value . '%'],
                ]);
            });
        }

        // retornando os resultados ordenados por data
        return $events->get()->sortBy('date');
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
