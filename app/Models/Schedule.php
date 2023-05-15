<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'yyymmdd',
        'user_id',
    ];

    // リレーションを追加
    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
}
