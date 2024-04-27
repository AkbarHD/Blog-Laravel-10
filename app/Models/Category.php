<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug']; // ini apa saja yang diisi

    // timestamp otomatis ke isi sndiri tanpa harus bikin protected

    // relasi has many category -> artikel
    // 1 kategori bisa di pakai bnyk artikel
    // ini untuk all category
    public function Articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
