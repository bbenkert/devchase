<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\MarkdownConverter;

class Post extends Model
{
    public function renderedContent(): string
    {
        $environment = new Environment;
        $environment->addExtension(new CommonMarkCoreExtension);
        $environment->addExtension(new GithubFlavoredMarkdownExtension);
        $environment->addExtension(new TableExtension);

        $converter = new MarkdownConverter($environment);

        return $converter->convert($this->content)->getContent();
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
        static::creating(function ($post): void {
            if (empty($post->slug)) {
                $post->slug = \Str::slug($post->title);
            }
        });
    }
}
