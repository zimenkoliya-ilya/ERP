<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Validator;
use File;
use App\Models\Doc_category;
class FileManagementController extends Controller
{
    public function index(){
        $files = Document::where('field', 1)->paginate(16);
        $category = Doc_category::all();
        return view('admin.file_management.index',
        compact('files','category'))
        ->with('active', 'file_management')
        ->with('sidebar_active', 'file_management')
        ->with('file', 'image');    
    }

    public function image_upload(Request $request){
        $v = Validator::make($request->all(), [
            'file_name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $size = $request->image->getSize();
        $files = new Document();
        if($request->image) {
            $extension = $request->image->extension();
            $imageName = time().'.'.$extension;  
            $request->image->move(public_path('employee/files'), $imageName);
            $pic = 'employee/files/'.$imageName;
            $files->file = $pic;
        }
        $files->name = $request->file_name;
        $files->extension = $extension;
        $files->size = $size;
        $files->field = 1;
        $files->category_id = $request->category_id;
        $files->save();
        return back()->with("Uploaded Successfully");
    }
    public function video(){
        $files = Document::where('field', 2)->paginate(16);
        $category = Doc_category::all();
        return view('admin.file_management.video',
        compact('files','category'))
        ->with('active', 'file_management')
        ->with('sidebar_active', 'file_management');    
    }

    public function video_upload(Request $request){
        $v = Validator::make($request->all(), [
            'file_name' => 'required',
            'image' => 'required|mimes:mp4,mov,ogg',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $size = $request->image->getSize();
        $files = new Document();
        if($request->image) {
            $extension = $request->image->extension();
            $imageName = time().'.'.$extension;  
            $request->image->move(public_path('employee/files'), $imageName);
            $pic = 'employee/files/'.$imageName;
            $files->file = $pic;
        }
        $files->name = $request->file_name;
        $files->extension = $extension;
        $files->size = $size;
        $files->field = 2;
        $files->category_id = $request->category_id;
        $files->save();
        return back()->with("Uploaded Successfully");
    }
    public function shared_active(Request $request){
        $video = Document::find($request->user_id);
        if($video->shared == 1){
            
            $video->shared = 0;
        }else{
            $video->shared = 1;
        }
        $video->save();
    }
    public function document(){
        $files = Document::where('field', 3)->paginate(16);
        $category = Doc_category::all();
        return view('admin.file_management.document',
        compact('files','category'))
        ->with('active', 'file_management')
        ->with('sidebar_active', 'file_management');    
    }

    public function document_upload(Request $request){
        $v = Validator::make($request->all(), [
            'file_name' => 'required',
            'image' => 'required|mimes:txt,pdf,doc,xls,doc.docx,pptx',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        $size = $request->image->getSize();
        $files = new Document();
        if($request->image) {
            $extension = $request->image->extension();
            $imageName = time().'.'.$extension;  
            $request->image->move(public_path('employee/files'), $imageName);
            $pic = 'employee/files/'.$imageName;
            $files->file = $pic;
        }
        $files->name = $request->file_name;
        $files->extension = $extension;
        $files->size = $size;
        $files->field = 3;
        $files->category_id = $request->category_id;
        $files->save();
        return back()->with("Uploaded Successfully");
    }
    public function shared(){
        $files = Document::where('shared', 1)->paginate(16);
        return view('admin.file_management.shared',
        compact('files'))
        ->with('active', 'file_management')
        ->with('sidebar_active', 'file_management');    
    }

    public function destroy(Request $request){
        $file = Document::find($request->user_id);
        File::delete($file->file);
        $file->delete();
        echo(1);
    }

    public function all_delete(Request $request){
        $files = $request->file_id;
        
        if($files == null){
            return back()->with('destroy', 'Please select Item.');
        }else{
            $i = 0;
            for($i=0;$i<count($files);$i++){
                $document = Document::find($files[$i]);
                File::delete($document->file);
                $document->delete();
            }
            return back()->with('success','Deleted Successfully');
        }
        return back()->with('destroy', 'Something went wrong.');
    }

    public function all_shared(Request $request){
        $files = $request->file_id;
        
        if($files == null){
            return back()->with('destroy', 'Please select Item.');
        }else{
            $i = 0;
            for($i=0;$i<count($files);$i++){
                $document = Document::find($files[$i]);
                $document->shared =1;
                $document->save();
            }
            return back()->with('success','Deleted Successfully');
        }
        return back()->with('destroy', 'Something went wrong.');
    }
}
