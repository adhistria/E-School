<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use Image;
use Session;
use Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Gambar;
use Auth;
class SekolahController extends Controller
{
    /**
                 * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $sekolahs = Sekolah::all();
        $status=Auth::user()->status;
        //buat view 
        // 
//        if($status == 1 ){
//            echo "bla";
//        }else{
            return view('sekolahs.index')->withSekolahs($sekolahs)->withGambars($gambars); 
 //       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('sekolahs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,array(
            'nama'=>'required',
            'alamat'=>'required',
            'kategori'=>'required',
            'deskripsi'=>'required'
            ));
        $sekolah = new Sekolah();
        $sekolah->user_id = $request->userId;
        $sekolah->nama=$request->nama;
        $sekolah->alamat=$request->alamat;
        $sekolah->kategori=$request->kategori;
        $sekolah->deskripsi=$request->deskripsi;
        $sekolah->save();
        //multiple upload

        $school = Sekolah::orderby('created_at','desc')->first();        
        $picture = '';
        $files = $request->file('image');
        $file_count = count($files);
        $uploadcount=0;
        foreach ($files as $file) {
            $image1 = new Gambar();
            $image1->sekolah_id = $school->id;
            $filename =  time()  . $uploadcount . '.' . $file->getClientOriginalExtension();
            $location=public_path('images/' . $filename);
            Image::make($file)->resize(800,400)->save($location);
            $image1->image= $filename;
            $image1->save();
            $uploadcount++;
        }
        return redirect()->route('sekolahs.show',$sekolah->id);

        //
        //single upload file
        // if ($request->hasFile('image')) {
        //     $image=$request->file('image');
        //     $filename =  time() . '.' . $image->getClientOriginalExtension();
        //     $location=public_path('images/' . $filename);
        //     Image::make($image)->resize(800,400)->save($location);
        //     $sekolah->image= $filename;
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $sekolah=Sekolah::find($id);

        $gambar=Gambar::all();
        return view('sekolahs.show')->withSekolah($sekolah)->withGambar($gambar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sekolah=Sekolah::find($id);
        return view('sekolahs.edit')->withSekolah($sekolah);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $sekolah=Sekolah::find($id);
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'kategori'=>'required',
            'deskripsi'=>'required'
            ]);
        $sekolah->user_id = $request->userId;
        $sekolah->nama=$request->nama;
        $sekolah->alamat=$request->alamat;
        $sekolah->kategori=$request->kategori;
        $sekolah->deskripsi=$request->deskripsi;
        $semuagambar = Gambar::all();
        foreach ($semuagambar as $gambar) {
            if($gambar->sekolah_id==$id){
                Storage::delete($gambar->image);
                $gambar->delete();
            }
        }
        //upload image
        $picture = '';
        $files = $request->file('image');
        $file_count = count($files);
        $uploadcount=0;
        foreach ($files as $file) {
            $image1 = new Gambar();
            $image1->sekolah_id = $sekolah->id;
            $filename =  time()  . $uploadcount . '.' . $file->getClientOriginalExtension();
            $location=public_path('images/' . $filename);
            Image::make($file)->resize(800,400)->save($location);
            $image1->image= $filename;
            $image1->save();
            $uploadcount++;
        }
        $sekolah->save();
        return redirect()->route('sekolahs.show',$sekolah->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sekolah=Sekolah::find($id);
        $semuagambar = Gambar::all();
        foreach ($semuagambar as $gambar) {
            if($gambar->sekolah_id == $id){
                echo $gambar->sekolah_id;
                Storage::delete($gambar->image);
                $gambar->delete();
            }
        }
        $sekolah->delete();
        return redirect()->route('sekolahs.index');
    }
    public function adminUpdate($id){
        $sekolah= Sekolah::find($id);
        $gambar = Gambar::all();
        return view('pages.update')->withSekolah($sekolah)->withGambar($gambar);

    }

    public function saveAdminUpdate(Request $request,$id){
        $sekolah= Sekolah::find($id);
        $sekolah->status = $request->status;
        $sekolah->save();
        return redirect()->route('pages.single',$sekolah->id);
    }
}
