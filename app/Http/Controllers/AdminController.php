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
        // return $categories;  
    }
    public function changeStatus($id){
        $users = User::find($id);
        return view('admin.UserUpdate',compact('users'));

    }
    public function update(Request $request){
        
        $id = request('id');
       $users = User::find($id);
        $users->update([
            'name'=>request('name'),
            'email'=>request('email'),
            'status'=>request('status')
        ]);
        return redirect()->route('Executive')->with('message','Updated the  status.');
    }

    public function AdminUserdeletes($id){
        $users=User::find($id);
        // return $users;
        $users->delete();
        return redirect()->route('Executive')->with('message','admin deleted the executer');

    }
    public function viewLead(){
        $categories =Category::all();
        $leads = Lead::join('categories', 'leads.category_id', '=', 'categories.id')
        ->select('leads.*', 'categories.category')
        ->get();
    return view('admin.viewAdminSideLead', compact('leads','categories'));
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
    public function assign($id){

        $leads = Lead::where('leads.id',$id)->leftJoin('users', 'users.id', '=', 'leads.user_id')
        ->select('leads.*', 'users.name as user_name')
        ->first();


        // $users = Auth::id();
        // $id = request('id');
        // $leads=Lead::find($id);
        $leadsname = Lead::leftJoin('users', 'users.id', '=', 'leads.user_id')
        ->select('leads.*', 'users.name as user_name')
        ->get();

       
        return view('admin.adminAssignLead',compact('leads','leadsname'));
    }


    public function updateAssign(Request $request){

        $id = request('id');
        $leads= Lead::find($id);
        $leads->update([
            'user_id'=>request('leads')
        ]);
        return redirect()->route('viewLeadByAdmin')->with('message','Lead assigned successfully');


    }

    public function StoreAssign(Request $request){
        $id = request('id');
    }

    public function filtering_category(Request $request){
        $filter = $request->post('filter');
        if($filter=='all'){
            $leads = Lead::join('categories', 'leads.category_id', '=', 'categories.id')
            ->select('leads.*', 'categories.category')
            ->get();
        }else{
            // $leads = Lead::whereHas('category', function($query) use ($filter) {
            //     $query->where('category', $filter);
            // })->get();

            $leads = Lead::where('leads.category_id',$filter)->join('categories', 'leads.category_id', '=', 'categories.id')
            ->select('leads.*', 'categories.category')
            ->get();
        }
        
    
        $categories = Category::all();
        return view('admin.adminLeadFilter', compact('leads', 'categories'));
    }


    
 
        
      
    
}
