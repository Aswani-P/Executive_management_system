<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function viewTable(){
        $users = User::where('usertype','executive')->get();
        return view('admin.viewExecutive',compact('users'));    
    }
    public function changeStatus($id){
        $users = User::find($id);
        return view('admin.UserUpdate',compact('users'));

    }
    public function update(Request $request){
        
        $id = request('id');
       $users = User::find($id);
        $users->update([
            'status'=>request('status')
        ]);
        return redirect()->route('Executive')->with('message','Updated the  status.');
    }

    public function delete($id){
        $users=User::find($id);
        $users->delete();
        return redirect()->route('Executive')->with('message','admin deleted the executer');

    }
    public function viewLead(){
    
        $leads = Lead::join('categories', 'leads.category_id', '=', 'categories.id')
        ->select('leads.*', 'categories.category')
        ->get();
    return view('admin.viewAdminSideLead', compact('leads'));
    }

    public function editLead($id){
        $id = request('id');
        $categories=Category::all();
        $leads = Lead::find($id);
        return view('admin.editLead',compact('leads','categories'));
        // return $leads;
    }
    public function updateAdminLead(){
        $id = request('id');
        $leads = Lead::find($id);
        $leads->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'phoneCode'=>request('code'),
            'phone'=>request('contact'),
            'remark'=>request('remark'),
            'category'=>request('category')
            
        ]);
        return redirect()->route('viewLeadByAdmin')->with('message','Lead updated successfully');
    }

    public function deletAdminLead($id){
        $leads=Lead::find($id);
        $leads->delete();
        return redirect()->route('viewLeadByAdmin')->with('message',' deleted the lead');

    
    }
 
        
      
    
}
