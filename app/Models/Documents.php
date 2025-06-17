<?php   

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Languages;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_document',
        'description_document',
        'file_document',
        'niveau_document',
        'language',
    ];
    public function languages()
    {
        return $this->belongsTo(Languages::class, 'language', 'name_language');
    }
}