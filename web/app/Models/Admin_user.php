<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    public $table = 'admin_users';
    public $primaryKey = 'id';
    public $timestamps = false;
}
