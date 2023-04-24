<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'yyymmdd',
        'user_id',
    ];

    // リレーションを追加
    public function users() {
        return $this->belongsTo(User::class);
    }
}
