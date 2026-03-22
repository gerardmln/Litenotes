<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index()
    {
        $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed()->latest('updated_at')->paginate(5);
        return view('notes.index')->with('notes', $notes);
    }

    public function show(Note $note)
    {
        abort_unless($note->trashed(), 404);
        abort_unless($note->user_id === Auth::id(), 404);

        return view('notes.trashed-show')->with('note', $note);
    }

    public function restore(Note $note)
    {
        abort_unless($note->trashed(), 404);
        abort_unless($note->user_id === Auth::id(), 404);

        $note->restore();

        return to_route('notes.show', $note)->with('success', 'Note restored successfully');
    }

    public function destroy(Note $note)
    {
        abort_unless($note->trashed(), 404);
        abort_unless($note->user_id === Auth::id(), 404);

        $note->forceDelete();

        return to_route('trashed.index')->with('success', 'Note permanently deleted');
    }
}
