<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get(); // Liste des utilisateurs sauf l'utilisateur connecté
        return view('chat.index', compact('users'));
    }

    // Afficher le chat avec un utilisateur spécifique
    public function show(User $user)
    {
        // Récupérer les messages échangés entre l'utilisateur connecté et l'autre utilisateur
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', auth()->id());
        })->orderBy('created_at')->get();

        return view('chat.show', compact('user', 'messages'));
    }

    // Envoi de message
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'attachment' => 'nullable|file|max:10240',
            'audio' => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
            'respond_to_message_id' => 'nullable|exists:messages,id', // Validation pour l'ID du message auquel on répond
        ]);

        // Initialisation des données du message
        $data = [
            'sender_id' => auth()->id(),
            'receiver_id' => $request->user_id,
            'message' => $request->message,
        ];

        // Si l'on répond à un message, on ajoute l'ID du message auquel on répond
        if ($request->respond_to_message_id) {
            $data['respond_to_message_id'] = $request->respond_to_message_id;
        }

        // Gestion des fichiers joints
        if ($request->hasFile('attachment')) {
            $filename = time() . '_' . $request->file('attachment')->getClientOriginalName();
            $request->file('attachment')->storeAs('attachments', $filename, 'public');
            $data['attachment'] = $filename;
        }

        // Gestion des fichiers audio
        if ($request->hasFile('audio')) {
            $filename = time() . '_' . $request->file('audio')->getClientOriginalName();
            $request->file('audio')->storeAs('audios', $filename, 'public');
            $data['audio'] = $filename;
        }

        // Création du message dans la base de données
        Message::create($data);

        // Redirection vers la conversation
        return redirect()->route('chat.show', $request->user_id);
    }

    // MessageController.php

public function markAsRead($messageId)
{
    $message = Message::findOrFail($messageId);

    // Vérifier si le message appartient à l'utilisateur qui le marque comme lu
    if ($message->receiver_id == auth()->id() && !$message->is_read) {
        $message->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 400);
}



}
