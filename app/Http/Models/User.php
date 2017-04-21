<?php

namespace AppModels;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'deleted_at', 'created_at', 'updated_at'];

}
