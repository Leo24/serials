<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $country_id
 * @property integer $genre_id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $picture
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Country $country
 * @property Genre $genre
 * @property Season[] $seasons
 */
class Serial extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['country_id', 'genre_id', 'title', 'description', 'start_date', 'picture', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('AppModels\Country');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre()
    {
        return $this->belongsTo('AppModels\Genre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seasons()
    {
        return $this->hasMany('AppModels\Season');
    }
}
