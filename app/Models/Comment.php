<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Casts\PurifyHtmlOnGet;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment',
    ];
    
    protected $casts = [
        'comment' => PurifyHtmlOnGet::class,
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateUpload()
    {
        return date_format(date_create($this->created_at), 'd M Y');
    }

    public function getDateTimeUpload()
    {
        return date_format(date_create($this->created_at), 'g A, d M Y');
    }
}
