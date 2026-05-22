<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // កែត្រង់ចំណុចនេះ

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'slug']; 
}