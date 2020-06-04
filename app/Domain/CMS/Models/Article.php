<?php

namespace App\Domain\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use Aammui\LaravelTaggable\Traits\HasCategory;
use Aammui\LaravelTaggable\Traits\HasTag;
use Aammui\LaravelMedia\Traits\HasMedia;

class Article extends Model
{
    use HasCategory, HasTag,  HasMedia;

    protected $fillable = ['title', 'description', 'slug', 'status', 'type'];

    public function link()
    {
        return $this->slug;
    }
}
