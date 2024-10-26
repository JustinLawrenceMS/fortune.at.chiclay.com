<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonQuixoteText extends Model
{
	use HasFactory;
	
	protected $fillable = ['text', 'word_count'];
}
