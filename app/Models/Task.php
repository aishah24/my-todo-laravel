<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Benarkan Laravel menyimpan data ke dalam column ini
    protected $fillable = ['nama_tugasan', 'user_id', 'is_done'];
}