<?php

namespace App\Domain\CMS\Models;

use Illuminate\Database\Eloquent\Model;
use Aammui\LaravelTaggable\Traits\HasCategory;
use Aammui\LaravelTaggable\Traits\HasTag;

class Article extends Model
{
    use HasCategory, HasTag;
}