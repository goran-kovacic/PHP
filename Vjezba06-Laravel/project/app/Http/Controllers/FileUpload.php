<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileUpload extends Controller
{
    public function createForm(){
        return view('file-upload');
    }

    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:txt,doc,docx|max:5120'
        ]);

        $fileModel = new File;

        if($req->file()){
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = $fileName;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            
            return back()
            ->with('success','File uploaded')
            ->with('file', $fileName);
        }
    }
}
