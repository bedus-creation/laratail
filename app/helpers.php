<?php

use Illuminate\Support\Str;

function isUserLink()
{
    $isUserLink = Str::contains(
        request()->url(),
        [route('users.index'), route('roles.index')]
    );
    return $isUserLink ? 'true' : 'false';
}

function isCmsLink()
{
    $isCmsLink = Str::contains(
        request()->url(),
        [route('articles.index'), route('categories.index'), route('tags.index')]
    );
    return $isCmsLink ? 'true' : 'false';
}
