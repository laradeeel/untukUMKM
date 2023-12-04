<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_category extends Model
{
    use HasFactory;
    protected $table = 'menu_categories';
    protected $guarded = ['id'];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'menu_category_id');
    }
}
