<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\Document;
use Illuminate\Http\Response;


class DownloadController extends Controller {

    public function __construct() {
        $this->middleware('auth');
       
    }
    public function download(Document $document) {
        
      
            
            if(auth()->user()->role->priority < $document->priority){
                abort(403, 'page not found');
            }else{
                $path  = storage_path($document->document) ;
                
                return response()->download($path);
            }
            
        

        
        return redirect()->route('homepage');
    }
     
}
