<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'user_id', 
        'bgcolor',
        'public'
    ];

        public function cards() {
            return $this->hasMany(Card::class);
        }

        public function user() {
            return $this->belongsTo(User::class);
        }
}
