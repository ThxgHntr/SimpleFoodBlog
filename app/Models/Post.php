<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stevebauman\Purify\Casts\PurifyHtmlOnGet;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $casts = [
        'title' => PurifyHtmlOnGet::class,
        'content' => PurifyHtmlOnGet::class,
    ];

    public function getDateUpload()
    {
        return date_format(date_create($this->created_at), 'd M Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function getPreviewPicture()
    {
        $firstPic = $this->pictures()->first();
        return $firstPic != null ? url('/' . $firstPic->file_path) : null;
    }

    public function getAllPreviewPictures()
    {
        return $this->pictures()->select('file_path')->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPaginatedComments()
    {
        return $this->comments()->orderByDesc('created_at')->paginate(5);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function addCommentByUser(User $user, $comment)
    {
        return $this->comments()->save(
            new Comment(
                [
                    'user_id' => $user->id,
                    'comment' => $comment,
                ]
            )
        );
    }

    public function addLikeByUser(User $user)
    {
        return $this->likes()->save(
            new Like(
                [
                    'user_id' => $user->id,
                ]
            )
        );
    }
}
