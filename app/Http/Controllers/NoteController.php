<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function getAllNotes() {
        return Note::all();
    }

    public function upsertNote(Request $request) {
        $note = new Note;
        if($request['id'])
            $note = Note::find($request['id']);
        $note['content'] = $request['content'];
        $note->save();
    }

    public function deleteNote(Request $request) {
        Note::find($request['id'])->delete();
    }
}
