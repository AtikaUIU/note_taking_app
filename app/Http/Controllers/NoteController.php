<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoteController extends Controller

{
    //__index method__
    public function index()
    {
       // echo "hh";
         $user=Auth::user();
         $notes=$user->notes;
        //dd($notes);

        return view('note.index',compact('notes', 'notes'));
        //return view('note.index');
    }
     //__create method__
     public function create()
     {
         return view('note.create');
     }
     public function store(Request $request)
     {
       //dd($request);
       $validated = $request->validate([
        'note_title' => 'required',
        'note_content' => 'required|max:25',

        ]);
            $user=Auth::user();
            $note = new Note();
            $note->user_id =$user->id;
            $note->title = $request->note_title;
            $note->content = $request->note_content;

            $note->save();

            return redirect()->back();


     }
     public function edit($id)
     {
        $data= Note::find($id);
        return view('note.edit',compact('data', 'data'));

        //return redirect()->back();
     }
     public function update(Request $request, $id)
     {
        //dd($request);
       $validated = $request->validate([
        'note_title' => 'required',
        'note_content' => 'required|max:25',

     ]);
        $note =Note::find($id);
        $note->title = $request->note_title;
        $note->content = $request->note_content;
        $note->save();
        return redirect()->route('index')->with('success', 'Successfully Updated!');



     }

     public function search(Request $request)
     {
         $search = $request->input('search');
         $notes = Note::where('user_id', auth()->id())
                      ->where(function ($query) use ($search) {
                          $query->where('title', 'like', "%$search%")
                                ->orWhere('content', 'like', "%$search%");
                      })
                      ->get();


        // return view('note.index',compact('notes', 'notes'));
         return view('note.index', compact('notes', 'search'));
        // $data=compact('notes_search', 'search');
        //  return view('note.index', compact('data', 'data'));
     }

     public function delete($id)
     {
        Note::destroy($id);

        return redirect()->back();
     }

}
