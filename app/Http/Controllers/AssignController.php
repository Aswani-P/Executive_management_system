<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Assign;


class AssignController extends Controller
{
    public function storeAssignValues(Request $request)
    {   $leads = Lead::all();
        $userid = Auth::id();
        $name = request('fname');
        $email = request('email');
        $status =request('status');
        $assign =request('assign');

        Assign::create([
            'Name'=>$name,
            'Email'=>$email,
            'Status'=>$status,
            'Assign'=>$assign,
            'User_id'=>$userid,
            
        ]);

        return redirect()->route('viewLeadByAdmin')->with('message','Lead updated successfully');
        
    }
}
