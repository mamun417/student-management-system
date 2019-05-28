<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static latest()
 */
class AllParent extends Model
{
    protected $table = 'parents';
    protected $fillable = ['phone', 'age', 'gender', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students(){
        return $this->hasMany(Student::class, 'parent_id');
    }
}
