<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Role;
use App\User;

class RolesController extends Controller
{
     public function __construct()
    {
        $this->middleware('administrator');

        
    }
    public function index(){
       $roles = Role::get();
        return view('users.roles.index', compact('roles'));
    }
     public function create(Request $request){
      
        // validate request only for POST method
        if(request()->isMethod('post')){
            // validate role form
          
            $this->validate(request(), [
                'name' => 'required|unique:roles|string|max:20',
                'priority' => 'required|unique:roles|integer|min:1|max:11|not_in: 0',
                
            ]);
            
            $role = new Role();
            $role->name = request('name');
            $role->priority = request('priority');
            // save into database
            $role->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Role: $role->name is created successfully"
            ]);
            
            // redirect to all roles
            return redirect(route('roles-list'));
        }
        return view('users.roles.create', compact('role'));
    }
    
    public function edit(Role $role){
        // moderator may change only his/her profile
                
        
        // validate request only for POST method
        if(request()->isMethod('post')){
            // validate role form
           
         
            $this->validate(request(), [
                'name' => 'required|unique:roles|string|max:191',
                
            ]);
            
            $role->name = request('name');
            
            
            // save into database
            $role->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Role: $role->name is updated successfully"
            ]);
                        
            return redirect(route('roles-list'));
        }
        
        return view('users.roles.edit', compact('role'));
    }
     public function delete(Role $role){
         
         Role::where('id', '=', $role->id)->delete();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Role: $role->name is deleted successfully"
        ]);
        
        // redirect to all users table
        return redirect(route('roles-list'));
    }
}
