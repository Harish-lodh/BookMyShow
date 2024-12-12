<?php

namespace App\Models;

use CodeIgniter\Model;

class MySql extends Model
{
    protected $table = 'Allmovie'; // Name of the database table
    protected $primaryKey = 'id'; // Primary key of the table
    protected $allowedFields = [ 'moviename', 'genre', 'language', 'release_date', 'duration', 'quality', 'price', 'img' ];
    // Include 'img' if you are also handling file uploads
}
