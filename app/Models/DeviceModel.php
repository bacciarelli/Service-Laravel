<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type_id'
    ];

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
