<?php

namespace App\Http\Controllers;

use App\Model\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\Role;



class DocumentsController extends Controller {
    public function __construct() {
        $this->middleware('auth');
       
    }
    public function index() {
        $roles = Role::select('name', 'priority')->orderBy('priority', 'asc') ->get();
        $documents = Document::orderBy('priority', 'asc')->get();
        return view('documents.index', compact(['documents', 'roles']));
    }

    public function create(Request $request) {

        $roles = Role::select('name', 'priority')->orderBy('priority', 'asc') ->get();
        
        $possibleValuesInRoles = Role::select('priority')->distinct()->get();
        
        foreach ($possibleValuesInRoles as $role) {

            $rolePriorities[] = $role->priority;
        }
             $possibleValues = implode(',', $rolePriorities);
             //dd($possibleValues);
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'title' => 'required|string|max:191',
                'description' => 'required|string|max:191',
                'priority' => "required|string|max:11|in:$possibleValues",
                'document' => 'required|mimes:doc,docx,txt,pdf,zip',
            ]);

            $document = new Document();
            $document->title = $request->input('title');
            $document->description = $request->input('description');
            $document->priority = $request->input('priority');


            $UploadedDocument = "";
            if ($request->hasFile('document')) {

                  $fileName = str_slug($request->input('title'), '-') . "." . $request->file('document')->getClientOriginalExtension();
                
                $file= $request->file('document');
                Storage::disk('local')->put($fileName, file_get_contents($file));
                $directory = 'uploads'. '/' . $fileName;
                
                
                 $UploadedDocument = $directory;
            }
            $document->document = $UploadedDocument;
            $document->save();

            session()->flash('message', [
                'status' => 'success',
                'text' => "Document: $document->title is created successfully"
            ]);

            return redirect()->route('documents-list');
        }


        return view('documents.create', compact('roles'));
    }
    
    public function delete(Document $document){
         
         Document::where('id', '=', $document->id)->delete();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Document: $document->name is deleted successfully"
        ]);
        
        // redirect to all users table
        return redirect(route('documents-list'));
    }
    

}
