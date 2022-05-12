<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Oferta extends Model
{
    use HasFactory, HybridRelations;

    protected $table = "ofertas";
    protected $connection = 'mongodb';

    public function users()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
//        return $this->belongsToMany(
//            User::class,
//            'oferta_user',
//            'oferta_id',
//            'user_id'
//        );
        return $this->hasMany(User::class);
//            ->using(OfertaUser::class);
    }
}
