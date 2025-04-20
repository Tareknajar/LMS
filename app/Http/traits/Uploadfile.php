<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

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
    public function deletefile($user,$attribute,$disk){
             $user->$attribute && Storage::disk($disk)->exists($user->$attribute);
                Storage::disk($disk)->delete($user->$attribute);
            
            return 'success';
         }
}













?>