<?php

namespace App\Application\Admin\Controllers;

use Aammui\LaravelMedia\Facades\Media;
use Aammui\LaravelMedia\Traits\HasMedia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use HasMedia;
    public function __invoke(Request $request)
    {
        $media = Media::addMedia(request()->image);
        return response()->json([
            'status' => 'success',
            'link' => $media->link()
        ]);
    }
}
