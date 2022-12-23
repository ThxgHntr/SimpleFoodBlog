<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Livewire\Public\Feed;
use App\Http\Livewire\Public\SearchPost;
use App\Http\Livewire\Public\ShowPost;
use App\Http\Livewire\Public\ShowUserProfile;
use App\Http\Livewire\Public\Tags;
use App\Http\Livewire\Public\Users;
use App\Http\Livewire\User\EditPost;
use App\Http\Livewire\User\Upload;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('upload', Upload::class)->name('upload');

    Route::get('/{user}/post/{post}/edit', EditPost::class)->name('post.edit')->middleware('post-owner');

    Route::post('image-upload', [ImageUploadController::class, 'storeImage'])->name('image.upload');
});

Route::middleware(['web'])->group(function () {

    Route::get('/feed', Feed::class)->name('feed');
    Route::get('/', function () {return redirect('feed');});

    Route::get('/post/{post}', ShowPost::class)->name('post.show');

    Route::get('/posts/tags/{tag}', SearchPost::class)->name('posts.search');

    Route::get('/{user}', ShowUserProfile::class)->name('profile.show');

    Route::get('/users/all', Users::class)->name('users');
    Route::get('/tags/all', Tags::class)->name('tags');
});
