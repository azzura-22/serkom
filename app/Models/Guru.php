<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $guarded = [];
    protected $fillable = ['name_guru', 'nip', 'mapel', 'foto'];


}
