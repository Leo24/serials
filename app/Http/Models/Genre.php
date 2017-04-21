<?php

namespace AppModels;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $deleted_at
 * @property Serial[] $serials
 */
class Genre extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serials()
    {
        return $this->hasMany('AppModels\Serial');
    }
}
