<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'collection_id', 
        'user_id',
        'content', 
        'image',
        'fontstyle'
    ];

        public function collection() {
            return $this->belongsTo(Collection::class);
        }

        public function user() {
            return $this->belongsTo(User::class);
        }
}
