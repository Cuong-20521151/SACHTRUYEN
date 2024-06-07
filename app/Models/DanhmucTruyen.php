<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'TenDanhMuc','TenSlug','NoiDungDanhMuc','KichHoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';

    public function Truyen(){
        return $this->hasMany('App\Models\Truyen','DanhMuc','id');
    }
}
