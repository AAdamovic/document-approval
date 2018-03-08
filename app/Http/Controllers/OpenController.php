<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class OpenController extends Controller
{
    public function page(Page $page){
        
        if($page->visible == 0){
            abort(404, "Page not found");
        }
        
        return view('open.page', compact('page'));
    }
    
    public function contactForm(){
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ]);
        
        // send email to user
        Mail::to(request('email'))->send(new ContactForm(request('name'), request('email'), request('text')));
        
        // send email to admin
        Mail::to('aleksandar.stanojevic@cubes.rs')->send(new ContactForm(request('name'), request('email'), request('text')));
        
        
        session()->flash('message', [
            'status' => 'success',
            'text' => "Thank you for your contact."
        ]);
        
        return back();
    }
}
