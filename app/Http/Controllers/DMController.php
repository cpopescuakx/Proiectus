<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DMController extends Controller
{
    public function index(){
      return view('dm.index');
    }






  // /*
  // File upload
  // */
  // public function fileupload(Request $request){
  //
  //    if($request->hasFile('file')) {
  //
  //      // Upload path
  //      $destinationPath = 'files/';
  //
  //      // Create directory if not exists
  //      if (!file_exists($destinationPath)) {
  //         mkdir($destinationPath, 0755, true);
  //      }
  //
  //      // Get file extension
  //      $extension = $request->file('file')->getClientOriginalExtension();
  //
  //      // Valid extensions
  //      $validextensions = array("jpeg","jpg","png","pdf");
  //
  //      // Check extension
  //      if(in_array(strtolower($extension), $validextensions)){
  //
  //        // Rename file
  //        $fileName = str_slug(Carbon::now()->toDayDateTimeString()).rand(11111, 99999) .'.' . $extension;
  //
  //        // Uploading file to given path
  //        $request->file('file')->move($destinationPath, $fileName);
  //
  //      }
  //
  //    }
  //  }



   public function fileCreate(){
        return view('dm.index');
   }

    public function fileStore(Request $request){
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        $imageUpload = new DM();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request){
        $filename =  $request->get('f_name');
        DM::where('f_name',$filename)->delete();
        $path=public_path().'/dm/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
