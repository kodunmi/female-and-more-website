<?php

namespace App\Http\Controllers;

use App\ActionBoard;
use Illuminate\Http\Request;

class ActionBoardController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'action' => ['required']
        ]);

        ActionBoard::create([
            'action_text' => $request->action,
            'user_id' => $id
        ]);

        return back()->with([
            'message' => 'Your action has been submitted successfully',
            'alert-type' => 'success'
        ]);
    }
}
