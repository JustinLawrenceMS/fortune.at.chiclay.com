<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonQuixoteSpanishText extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'text_length', 'word_count'];
}
