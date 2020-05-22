<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'categorie_id', 'description', 'revision_date', 'state', 'pdf_url'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
