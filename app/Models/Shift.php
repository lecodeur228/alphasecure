<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'shift_type', 'agent_id'];

    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Get the agent that owns the shift.
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
