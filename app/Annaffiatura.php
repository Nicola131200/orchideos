<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annaffiatura extends Model
{
    protected $table = 'annaffiaturas';

    protected $fillable = ['dataora_annaffiatura','pianta_id'];
}
