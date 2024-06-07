<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'TenTruyen','TenSlugTruyen','NoiDungTruyen','DanhMuc','HinhAnh','KichHoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';

    public function danhmucTruyen(){
        return $this->belongsTo('App\Models\DanhmucTruyen', 'DanhMuc', 'id');
    }
    public function Chapter(){
        return $this->hasMany('App\Models\Chapter','id_truyen','id');
    }
}
