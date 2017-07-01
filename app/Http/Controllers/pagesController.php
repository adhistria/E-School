<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Gambar;
class pagesController extends Controller
{
    public function index(){
    	$sekolah=Sekolah::orderby('created_at')->limit(4)->get();
    	$gambar=Gambar::all();
    	return view('pages.welcome')->withSekolah($sekolah)->withGambar($gambar);
    }
    public function single($id){
    	$sekolah=Sekolah::find($id);
    	$gambar=Gambar::all();
    	return view('pages.single')->withSekolah($sekolah)->withGambar($gambar);
    }
}
