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
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'serials2genres',  'serial_id', 'genre_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'serials2countries',  'serial_id', 'country_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function genreList()
    {
        $genreList = [];
        foreach ($this->genres as $genre) {
            $genreList[] = $genre->id;
        }
        return $genreList;
    }

    public function countryList()
    {
        $countryList = [];
        foreach ($this->countries as $country) {
            $countryList[] = $country->id;
        }
        return $countryList;
    }
}
