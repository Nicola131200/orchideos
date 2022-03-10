<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pianta extends Model
{
    protected $table = 'piantas';

    protected $fillable = ['nome','user_id','tipologia','data_acquisto'];

    /**
     * Get all of the annaffiature for the Pianta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function annaffiature(){
        return $this->hasMany('App\Annaffiatura');
    }

    /**
     * Get all of the concimature for the Pianta
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function concimature(){
        return $this->hasMany('App\Concimatura');
    }
}
