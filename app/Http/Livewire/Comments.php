<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comentario;

class Comments extends Component
{

    public $post;
    public $comentario;
    public $comentarios;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comentarios = $post->comentarios()->get()->reverse();
    }

    public function store()
    {
        $this->validate([
            'comentario' => 'required',
        ]);

        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario,
        ]);

        session()->flash('mensaje', 'Tu comentario fue ingresado correctamente');

        $this->comentario = '';

        $this->comentarios = $this->post->comentarios()->get()->reverse();
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
