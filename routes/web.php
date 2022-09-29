<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;

/*
Aquí es donde puede registrar rutas web para su aplicación. Estas
las rutas son cargadas por el RouteServiceProvider dentro de un grupo que
contiene el grupo de middleware "web".
*/

//Pagina Principal
Route::get('/', HomeController::class)->name('home');

//Registro de Usuarios
Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

//Login de Usuario
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Rutas Perfil del Usuario Actual
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

//Rutas para los Post del Usuario
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Rutas para seccion de Seguidores
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

//Rutas para seccion de comentarios en los post
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentario.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

//Rutas para seccion de imagenes
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

//Rutas para Like a fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');