<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $table = 'users';

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'role',
    ];


    // Specify the password column
    public function getAuthPassword()
    {
        return $this->password;
    }

    /** @use HasFactory<\Database\Factories\> */
    use HasFactory;
}
