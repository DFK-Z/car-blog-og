<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service::index', ['title' => 'Услуги']);
    }

    public function show($id)
    {
        $post = Service::findOrFail($id);
        return view('service::show', [
            'title' => $post->title,
            'post' => $post,]);
    }
}
