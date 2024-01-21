<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Car extends Model
{
    use HasFactory;
    protected  $fillable = [
        'name',
        'description',
        'brand',
        'price',
        'num_plaq',
        'lien_img',
    ];

    public function getSlug(): string {
        return Str::slug($this->name);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

}
