<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'photo'];

    /**
     * Get the shifts associated with the agent.
     */
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
