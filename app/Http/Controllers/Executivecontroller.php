<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Executivecontroller extends Controller
{
    public function LeadFormforExecutive(){
        $categories = Category::all();
        return view('executive.executiveLead',compact('categories'));
    }
    public function StoreLead(Request $request){
        $user = Auth::id();
        $name = request('name');
        $contact = request('contact');
        $email = request('email');
        $phonecode = request('code');
        $remark = request('remark');
        $category = request('category');

        request()->validate([
            'name'=>'required',
            'code'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'remark'=>'required',
            'category_name'=>'required'
        ]);
        $category = Category::findOrFail(['category_id']);
        $categoryName = $category->category;

        Lead::create([
            'name'=>$name,
            'email'=>$email,
            'phoneCode'=>$phonecode,
            'phone'=>$contact,
            'remark'=>$remark,
            'category_name' => $categoryName,
            'user_id'=>$user
        ]);
        return redirect()->route('home')->with('message','lead added successfully.');
    }
    
    public function category(){
        $categories = Category::all();
        return view('executive.executiveLead', ['categories' => $categories]);
    }

    public function ExcutiveviewLeadTable(){
        $user= Auth::id();
        
        $exs = Lead::where('user_id',$user)->get();
        $leads = Lead::join('categories', 'leads.category_id', '=', 'categories.id')
        ->select('leads.*', 'categories.category')
        ->get();

        return view('executive.viewExecutiveTable',compact('exs','leads'));
    }
    public function ExecutiveEditBtn($id){
        $id = request('id');
        $categories=Category::all();
        $leads = Lead::find($id);
        return view('executive.editLeadExcutive',compact('leads','categories'));
    }


    public function ExecutiveLeadUpdate(Request $request){
        
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
        return redirect()->route('viewLeads')->with('message','Lead updated successfully');
    }
    public function ExecutivedeleteLead($id){
       
            $leads=Lead::find($id);
            $leads->delete();
            return redirect()->route('viewLeads')->with('message',' deleted the lead');
    
        
    }
    
}
