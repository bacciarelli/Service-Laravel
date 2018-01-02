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

    const RECEIVED = 1;
    const REPAIRED = 2;
    const COMPLETED = 3;
    const RETURNED = 4;
    const SCRAPPED = 5;

    public function getStatusText()
    {
        return [
            self::RECEIVED  => 'received',
            self::REPAIRED  => 'repaired',
            self::COMPLETED => 'repaired & shipped',
            self::RETURNED  => 'returned without repair',
            self::SCRAPPED  => 'scrapped'
        ];
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function deviceModel()
    {
        return $this->belongsTo(DeviceModel::class);
    }

}
