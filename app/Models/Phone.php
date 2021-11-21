<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Phone extends Model
{
    protected $table = "phones";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;
}
