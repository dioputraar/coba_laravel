<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ruang extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'kapasitas',
        'lantai',
        'foto_ruang',
        'status',
        'creadate',
        'modidate'
    ];

    public static function idOtomatis()
    {
        $kode = DB::table('ruangs')->max('id');
    	$addNol = '';
    	$kode = str_replace("RNG", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "RNG".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}
