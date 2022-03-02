<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concimatura extends Model
{
    protected $table = 'concimaturas';

    protected $fillable = ['dataora_concimatura','qta','pianta_id'];
}
