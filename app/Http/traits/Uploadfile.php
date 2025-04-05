<?php
namespace App\Http\Traits;


trait Uploadfile{

    public function upload($request,$namerequesr,$namefolder)
    {
        if ($request->hasFile($namerequesr)) {
            $file = $request->file($namerequesr);
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $filepath = $file->storeAs($namefolder,$filename); 
            return $filepath; 
        }
        return null; 
    }

}













?>