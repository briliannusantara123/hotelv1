<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datatamu;

class DatatamuController extends Controller
{
   public function index(Request $request)
    {
        $datatamu = Datatamu::all();
       
        
        if($request->ajax()){
            return datatables()->of($datatamu)
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

        return view('datatamu.index',['datatamu' => $datatamu]);

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
        
        $post   =   Datatamu::updateOrCreate(['id' => $id],
                    [
                       'nama' => $request->nama,
                        'room' => $request->room,
                        'arrival_date' => $request->arrival_date,
                        'departure_date' => $request->departure_date,
                        'jumlah_orang' => $request->jumlah_orang,
                        'market' => $request->market,
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
        $post  = Datatamu::where($where)->first();
     
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
        $post = Datatamu::where('id',$id)->delete();
     
        return response()->json($post);
    }
   public function create (){
      $datatamu = Datatamu::all();
  
     return view('datatamu.create',['datatamu' => $datatamu])->with('sukses','data berhasil disimpan');
   }
   public function stores(Request $request)
   {
    

       
         $this->validate($request, [
                        'nama' => 'required',
                        'room' => 'required',
                        'arrival_date' => 'required',
                        'departure_date' => 'required',
                        'jumlah_orang' => 'required',
                        'market' => 'required',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        
        ]);

        $image = $request->file('image');
        $new_image = time().$image->getClientOriginalName();
       
       

        $kamar = Datatamu::create([
                         'nama' => $request->nama,
                        'room' => $request->room,
                        'arrival_date' => $request->arrival_date,
                        'departure_date' => $request->departure_date,
                        'jumlah_orang' => $request->jumlah_orang,
                        'market' => $request->market,
                        'image' => 'storage/'.$new_image,
        ]);


        $image->move('storage/', $new_image);
        return redirect()->back()->with('success','Foto anda berhasil disimpan'); 
   }
}
