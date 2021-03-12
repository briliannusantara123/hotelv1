<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipekamar;

class TipekamarController extends Controller
{
     public function index(Request $request)
    {
        $tipekamar = Tipekamar::all();
        
        
        if($request->ajax()){
            return datatables()->of($tipekamar)
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

        return view('tipekamar.index',['tipekamar' => $tipekamar]);

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
        
        $post   =   Tipekamar::updateOrCreate(['id' => $id],
                    [
                       'tipekamar' => $request->tipekamar,
                       'fasilitaskamar' => $request->fasilitaskamar,
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
        $post  = Tipekamar::where($where)->first();
     
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
        $post = Tipekamar::where('id',$id)->delete();
     
        return response()->json($post);
    }
   public function create (){
      $tipekamar = Tipekamar::all();
     return view('tipekamar.create',['tipekamar' => $tipekamar])->with('sukses','data berhasil disimpan');
   }
   public function stores(Request $request)
   {
    

       
         $this->validate($request, [
                        
                        'tipekamar' => 'required',
                      
                        
                     
                        
        ]);

        $tipekamar = Tipekamar::create([
                       
                        'tipekamar' => $request->tipekamar,
                       
                       
                       
                       
        ]);
        return redirect()->back()->with('success','Foto anda berhasil disimpan'); 
   }
}
