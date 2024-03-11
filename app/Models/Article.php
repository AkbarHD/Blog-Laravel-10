<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;  // import class name belongsto

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'desc', 'img', 'view', 'status', 'publish_date'];

    // nah karna pada saat kita pnaggil category_id itu yang di kepanggil malah angka maka kita perlu relasiin
    public function Category(): BelongsTo //Category dpt dari model karna si article merelasikan ke "category"
    {
        // relasi one to one
        return $this->belongsTo(Category::class); // sbnrnya mau dibikin kayak User jg bisa agar lbh jelas aja
    }

    public function User(): BelongsTo //Category dpt dari model karna si article merelasikan ke "category"
    {
        // relasi one to one
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
