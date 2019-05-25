<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static latest()
 */
class AllClass extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name', 'note'];
}
