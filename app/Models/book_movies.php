<?php

namespace App\Models;

use CodeIgniter\Model;

class book_movies extends Model
{
    protected $table = 'book_movies'; // Name of the database table
   // protected $primaryKey = 'id'; // Primary key of the table
    protected $allowedFields = [ 'user_email','movie','seat_number','price'];
    // Include 'img' if you are also handling file uploads

}
?>