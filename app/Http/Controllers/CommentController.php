<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Aquí puedes obtener todos los comentarios y mostrarlos en una vista
        $comments = Comment::all();
        return view('post', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí puedes mostrar un formulario para crear un nuevo comentario
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aquí puedes guardar el comentario enviado por el usuario
        Comment::create([
            'user_id' => auth()->user()->id, // Obtén el ID del usuario actual
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('comments.index')->with('success', 'Comentario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
         // Aquí puedes mostrar los detalles de un comentario específico
         return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
         // Aquí puedes mostrar un formulario para editar un comentario existente
         return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // Aquí puedes actualizar el comentario con los datos enviados por el usuario
        $comment->update([
            'comment' => $request->comment,
        ]);

        return redirect()->route('comments.index')->with('success', 'Comentario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        // Aquí puedes eliminar un comentario específico
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comentario eliminado correctamente');
    }
}
