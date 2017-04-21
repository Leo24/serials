<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $serial_id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Serial $serial
 */
class Season extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['serial_id', 'title', 'start_date', 'end_date', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serial()
    {
        return $this->belongsTo('AppModels\Serial');
    }
}
