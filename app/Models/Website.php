<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain',
        'description'
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'website_id', 'id');
    }

    public function subscribers(){
        return $this->hasMany(Subscriber::class, 'website_id', 'id');
    }
}
