@extends('layouts.app')

@section('titulo')
{{ $post->titulo }}
@endsection

@section('contenido')
<div class="container mx-auto md:flex">
	<div class="md:w-1/2">
		<img class="rounded" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
		<div class="p-3 flex items-center gap-4"> 
			@auth
			<livewire:like-post :post="$post" />
			@endauth
		</div>
		<div>
			<p class="font-bold"><a href="{{ route('post.index', $post->user->username) }}" title="Dueño del Post">{{ $post->user->username }}</a></p>
			<p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
			<p class="mt-5">{{ $post->descripcion}}</p>
		</div>
		@auth
		@if($post->user_id === auth()->user()->id)
		<form action="{{ route('post.destroy', $post) }}" method="POST">
			@method('DELETE')
			@csrf
			<input type="submit" value="Eliminar Post" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
		</form>
		@endif
		@endauth
	</div>
	<div class="md:w-1/2 p-5">
	<livewire:comments :post="$post" />
</div>
@endsection