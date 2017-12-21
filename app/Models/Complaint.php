<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'client_id', 'fault_description', 'notes', 'repair_description', 'brand_id', 'device_model_id', 'status'
    ];
}
