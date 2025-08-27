<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $table = 'moods';
    protected $guarded = [];
    public $timestamps = false;
}
