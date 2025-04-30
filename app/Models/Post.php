<?php

namespace App\Models;
use League\CommonMark\CommonMarkConverter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function renderedContent(): string
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
    
        return $converter->convertToHtml($this->content);
    }

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'tags',
        'published',
        'published_at',
        'featured_image',
    ];
    
    protected $casts = [
        'tags' => 'array',
        'published' => 'boolean',
        'published_at' => 'datetime',
        'featured_image' => 'string',
    ];
    
    protected static function booted(): void
{
    static::creating(function ($post) {
        if (empty($post->slug)) {
            $post->slug = \Str::slug($post->title);
        }
    });
}
}
