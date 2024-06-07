<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_truyen','TomTat','TieuDe','KichHoat','TenSlugChapter','NoiDung'
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';

    public function Truyen(){
        return $this->belongsTo('App\Models\Truyen', 'id_truyen', 'id');
    }
}
