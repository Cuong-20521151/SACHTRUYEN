<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
    protected $fillable = [
        'TenTruyen', 'TenSlugTruyen', 'TacGia', 'NoiDungTruyen', 'DanhMuc', 'HinhAnh', 'KichHoat', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'Truyen'; // Đảm bảo nhất quán với tên bảng trong migration

    public function danhmucTruyen()
    {
        return $this->belongsTo(DanhmucTruyen::class, 'DanhMuc', 'id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'id_truyen', 'id');
    }
}
