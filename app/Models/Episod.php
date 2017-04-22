<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $season_id
 * @property integer $serial_id
 * @property string $title
 * @property string $description
 * @property string $premiere_date
 * @property string $picture
 * @property string $created_at
 * @property string $updated_at
 * @property Season $season
 * @property Serial $serial
 */
class Episod extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'episodеs';

    /**
     * @var array
     */
    protected $fillable = ['season_id', 'serial_id', 'title', 'description', 'premiere_date', 'picture', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id' ,'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serial()
    {
        return $this->belongsTo(Serial::class, 'serial_id', 'id');
    }
}
