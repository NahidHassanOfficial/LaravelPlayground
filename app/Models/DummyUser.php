<?php
namespace App\Models;

use App\Enum\GenderEnum;
use Illuminate\Database\Eloquent\Model;

class DummyUser extends Model
{
    protected $fillable = [
        'name',
        'gender',
    ];

    protected $casts = [
        'gender' => GenderEnum::class,
    ];
}