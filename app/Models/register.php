<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    function showregisterForm($data)
    {
        return $this->db->get_where('users', $data)->row();
    }
}
