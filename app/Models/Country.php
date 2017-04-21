<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $deleted_at
 * @property Serial[] $serials
 */
class Country extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'code', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serials()
    {
        return $this->hasMany(Serial::class);
    }
}
