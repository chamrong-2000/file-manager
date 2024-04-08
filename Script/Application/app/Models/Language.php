<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'flag',
        'name',
        'code',
        'direction',
    ];

    /**
     * Relationships between blog categories & blog articles.
     */
    public function translates()
    {
        return $this->hasMany(Translate::class, 'lang', 'code');
    }

}
