<?php

namespace App\Models;

use CodeIgniter\Model;

class adminmodel extends Model
{
    protected $table = 'admin'; // Name of the database table
    protected $allowedFields = ['email','password' ];
    // Include 'img' if you are also handling file uploads
}
?>