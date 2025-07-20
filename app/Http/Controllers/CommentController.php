<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function destroy(Request $request,$id)
    {
        $data = Comment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit(Request $request,$id)
    {
        $lead = Comment::findOrFail($id);
        $lead->update([
            'comment'=>$request->comment
        ]);
        return redirect()->back();
    }
}
