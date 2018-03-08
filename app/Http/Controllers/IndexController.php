<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Document;
use App\Model\Role;

class IndexController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
       
    }
    public function index(){
        $documents = Document::orderBy('priority', 'desc')->get();
        $roles = Role::select('name', 'priority')->get();
      
        return view('index.index', compact(['documents', 'roles']));
    }
}
