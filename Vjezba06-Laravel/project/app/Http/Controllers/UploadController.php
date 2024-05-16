<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UploadController extends Controller
{
    public function index(){
        try{
            $uploadedFiles = UploadedFile::all();
            return view('uploads.index', compact('uploadedFiles'));
        }catch(\Exception $e){
            return view('uploads.create');
        }
        
        

    }

    public function create(){
        return view('uploads.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'file_upload' => 'required|mimes:docx,doc,txt|max:5120',
        ]);

        
        $file = $request->file('file_upload');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        
        $uploadedFile = new UploadedFile();
        $uploadedFile->filename = $fileName;
        $uploadedFile->original_name = $file->getClientOriginalName();
        $uploadedFile->file_path = $filePath;
        $uploadedFile->save();

        
        return redirect()->route('uploads.index')
            ->with('success', "File `{$uploadedFile->original_name}` uploaded successfully.");
    }

    // https://laracoding.com/making-a-file-upload-form-in-laravel-a-step-by-step-guide/
    // https://laravel-news.com/uploading-files-laravel
}
