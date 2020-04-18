<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Galeria;

class GaleriaController extends Controller
{
  public function index()
 {
   //$imagenes = Galeria::get();
   return view('galeria');
 }


 /**
  * Upload image function
  *
  * @return \Illuminate\Http\Response
  */
 public function upload(Request $request)
 {
   $this->validate($request, [
     'titulo' => 'required',
         'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);


     $input['imagen'] = time().'.'.$request->imagen->getClientOriginalExtension();
     $request->imagen->move(public_path('imagenes'), $input['imagen']);


     $input['titulo'] = $request->titulo;
     Galeria::create($input);


   return back()
     ->with('La imagen fue subida correctamente');
 }


 /**
  * Remove Image function
  *
  * @return \Illuminate\Http\Response
  */
 public function destroy($id)
 {
   Galeria::find($id)->delete();
   return back()
     ->with('La imagen fue eliminada correctamente.');
 }


 public function sow(){
   $imagenes = Galeria::get();
   return view('fotos',compact('imagenes'));
 }
}
