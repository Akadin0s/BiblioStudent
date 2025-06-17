<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documents;

class Languages extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_language',
        'title_language',
        'description_language',
        'image_path',
    ];
    public function documents()
    {
        return $this->hasMany(Documents::class, 'language', 'name_language');
    }
}