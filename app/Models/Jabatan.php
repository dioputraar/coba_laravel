<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Jabatan extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'jabatan',
        'status',
        'creadate',
        'modidate'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'jabatans', 'length' => 10, 'prefix' =>'JB']);
        });
    }
}
