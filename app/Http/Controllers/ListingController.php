<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    public function index(){
        return view('listings.index', [
            'heading' => ' Latest listing',
            'listing' =>Listing::latest()->filter(request(['tag']))->paginate(4)
        ]);

    }

    public function show( Listing $listing){ 
        return view('listings.show',[
            'listings' => $listing]);
         
    }

    public function create (){
        return view('listings.create');
    }

    public function store(Request $request){
        $formField = $request->validate(
            [ 
                'title' => 'required',
                'company' => ['required', Rule::unique('listings','company')],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required','email'],
                'tags' => 'required',
                'description' =>'required'


            ]);

            if($request->hasFile('logo')){
                $formField['logo'] = $request->file('logo')->store('logos','public');
            }
            $formField['user_id'] = auth()->id();

            Listing::create($formField);
            
            return redirect('/')->with('message', 'listing created');
    }

    public function edit(Listing $listing){
        
        return view('listings.edit',['listing'=>$listing]);
    }


    public function update(Request $request, listing $listing){
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized action');
        }
        $formField = $request->validate(
            [ 
                'title' => 'required',
                'company' => 'required',
                'location' => 'required',
                'website' => 'required',
                'email' => ['required','email'],
                'tags' => 'required',
                'description' =>'required'


            ]);

            if($request->hasFile('logo')){
                $formField['logo'] = $request->file('logo')->store('logos','public');
            }
            $listing->update($formField);
            
            return back()->with('message', 'listing updated successfully');
    } 

    public function delete(Listing $listing){
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized action');
        }
        $listing->delete();
         return redirect('/')->with('message', 'listing deleted successfully');
    }

    public function manage() {
        return view('listings.manage', ['listings'=> auth()->user()->listings()->get()]);
    }
}