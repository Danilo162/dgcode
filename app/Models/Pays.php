<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = 'pays';
    public function mentClients()
    {
        return $this->hasMany(MentClient::class, 'pays_id');
    }
}
