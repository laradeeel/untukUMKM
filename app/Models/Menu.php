<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function menu_category()
    {
        return $this->belongsTo(Menu_category::class, 'menu_category_id');
    }
}
