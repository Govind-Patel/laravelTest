<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Advertisement;
class AdvertisementController extends Controller
{
    function savedata(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "description"=>"required"
        ]);
      
        $save = [
            "name"=>$request->name,
            "description"=>$request->description,
            "image"=>'',
            "created_by"=>auth()->user()->id
        ];
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();  
            $save['image']=$imageName;
            $request->image->move(public_path('images'), $imageName);
        }
        
        
        Advertisement::create($save);
       return redirect('add_list')->with('success','Advertisement created'); 

    }
    function add_list(){ 
       $getdata['data'] = Advertisement::where("created_by",auth()->user()->id)
       ->where('active','true')
       ->get();
        return view('list',$getdata);
    }
    function edit(Request $request){
        $getdata['data'] = Advertisement::where("id",$request->id)->first();
        return view('edit',$getdata);
    }
    function updateData(Request $request){
        $this->validate($request,[
            "name"=>"required",
            "description"=>"required"
        ]);
      
        $save = [
            "name"=>$request->name,
            "description"=>$request->description,
            "image"=>'',
            "updated_by"=>auth()->user()->id
        ];
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();  
            $save['image']=$imageName;
            $request->image->move(public_path('images'), $imageName);
        }
        
        
        Advertisement::where('id',$request->id)->update($save);
       return redirect('add_list')->with('success','Advertisement Updated'); 

    }
    function delete(Request $request){
        Advertisement::where("id",$request->id)->update(['active'=>'false']);
        return redirect('add_list')->with('success','Advertisement deleted'); 
    }
    
}
