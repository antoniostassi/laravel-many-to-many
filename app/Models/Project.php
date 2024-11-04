<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        // Mass Assignment
        'name',
        'slug',
        'description',
        'creation_date',
        'expiring_date',
        'label_tag',
        'price',
        'completed', 
        'type'
    ];

    public function type(){ // Il type è sempre solo 1
        return $this->belongsTo(Type::class); // One to One
    }
}
