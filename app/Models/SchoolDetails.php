<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolDetails extends Model
{
    protected $fillable = [
        'name_school',
        'address_school',
        'email_school',
        'password_school',
        'phone_school',
        'website_school',
        'description_school',
        'image_path',
    ];

    /** @use HasFactory<\Database\Factories\School_detailsFactory> */
    use HasFactory;
}