<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment', 'company_id', 'creator_name'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
