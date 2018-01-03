<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Complaint
 *
 * @package App\Models
 */
class Complaint extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'client_id', 'fault_description',
        'notes', 'repair_description', 'brand_id',
        'device_model_id', 'status'
    ];

    const RECEIVED  = 1;
    const REPAIRED  = 2;
    const COMPLETED = 3;
    const RETURNED  = 4;
    const SCRAPPED  = 5;

    /**
     * @return array
     */
    public static function getStatusText()
    {
        return [
            self::RECEIVED  => 'received',
            self::REPAIRED  => 'repaired',
            self::COMPLETED => 'repaired & shipped',
            self::RETURNED  => 'returned without repair',
            self::SCRAPPED  => 'scrapped'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deviceModel()
    {
        return $this->belongsTo(DeviceModel::class);
    }

}
