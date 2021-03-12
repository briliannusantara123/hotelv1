<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\Tipekamar;

class KamarController extends Controller
{
     public function index(Request $request)
    {
        $kamar = Kamar::all();
        $tipekamar = Tipekamar::all();
        
        if($request->ajax()){
            return datatables()->of($kamar)
                        ->addColumn('action', function($data){

                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('kamar.index',['kamar' => $kamar,'tipekamar' => $tipekamar]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $id = $request->id;
        
        $post   =   Kamar::updateOrCreate(['id' => $id],
                    [
                       'namakamar' => $request->namakamar,
                        'id_tipekamar' => $request->id_tipekamar,
                        'jumlahkamar' => $request->jumlahkamar,
                        'id_fasilitaskamar' => $request->id_fasilitaskamar,
                        'deskripsi' => $request->deskripsi,
                        'hargakamar' => $request->hargakamar,
                    ]); 

        return response()->json($post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function edit($id)
    {
        $where = array('id' => $id);
        $post  = Kamar::where($where)->first();
     
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Kamar::where('id',$id)->delete();
     
        return response()->json($post);
    }
   public function create (){
      $kamar = Kamar::all();
       $tipekamar = Tipekamar::all();
     return view('kamar.create',['kamar' => $kamar,'tipekamar' => $tipekamar])->with('sukses','data berhasil disimpan');
   }
   public function stores(Request $request)
   {
    

       
         $this->validate($request, [
                        'namakamar' => 'required',
                        'id_tipekamar' => 'required',
                        'jumlahkamar' => 'required',
                        'id_fasilitaskamar' => 'required',
                        'hargakamar' => 'required',
                        'deskripsi' => 'required',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        
        ]);

        $image = $request->file('image');
        $new_image = time().$image->getClientOriginalName();
       
       

        $kamar = Kamar::create([
                        'namakamar' => $request->namakamar,
                        'id_tipekamar' => $request->id_tipekamar,
                        'jumlahkamar' => $request->jumlahkamar,
                        'id_fasilitaskamar' => $request->id_fasilitaskamar,
                        'deskripsi' => $request->deskripsi,
                        'hargakamar' => $request->hargakamar,
                        'image' => 'storage/'.$new_image,
        ]);


        $image->move('storage/', $new_image);
        return redirect()->back()->with('success','Foto anda berhasil disimpan'); 
   }
}
