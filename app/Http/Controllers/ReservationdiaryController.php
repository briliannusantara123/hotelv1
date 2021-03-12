<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservationdiary;

class ReservationdiaryController extends Controller
{
     public function index(Request $request)
    {
        $reservationdiary = Reservationdiary::all();
        
        
        if($request->ajax()){
            return datatables()->of($reservationdiary)
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

        return view('reservationdiary.index',['reservationdiary' => $reservationdiary]);

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
        
        $post   =   Reservationdiary::updateOrCreate(['id' => $id],
                    [
                       'rsv_date' => $request->rsv_date,
                       'name' => $request->name,
                       'adress' => $request->adress,
                       'phone' => $request->phone,
                       'name_guest' => $request->name_guest,
                       'person_guest' => $request->person_guest,
                       'date_in' => $request->date_in,
                       'date_out' => $request->date_out,
                       'room_night' => $request->room_night,
                       'room_no' => $request->room_no,
                       'remarks' => $request->remarks,
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
        $post  = Reservationdiary::where($where)->first();
     
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
        $post = Reservationdiary::where('id',$id)->delete();
     
        return response()->json($post);
    }
   public function create (){
      $reservationdiary = Reservationdiary::all();
     return view('reservationdiary.create',['reservationdiary' => $reservationdiary])->with('sukses','data berhasil disimpan');
   }
   public function stores(Request $request)
   {
    

         $this->validate($request, [
                        
                        'rsv_date' => 'required',
                        'name' => 'required',
                        'adress' => 'required',
                        'phone' => 'required',
                        'name_guest' => 'required',
                        'person_guest' => 'required',
                        'date_in' => 'required',
                        'date_out' => 'required',
                        'room_night' => 'required',
                        'room_no' => 'required',
                        'remarks' => 'required',
                         
                        
                     
                        
        ]);

        $reservationdiary = Reservationdiary::create([
                       
                       'rsv_date' => $request->rsv_date,
                       'name' => $request->name,
                       'adress' => $request->adress,
                       'phone' => $request->phone,
                       'name_guest' => $request->name_guest,
                       'person_guest' => $request->person_guest,
                       'date_in' => $request->date_in,
                       'date_out' => $request->date_out,
                       'room_night' => $request->room_night,
                       'room_no' => $request->room_no,
                       'remarks' => $request->remarks,
                       
                       
                       
                       
        ]);
        return redirect()->back()->with('success','Data anda berhasil disimpan'); 
   }
}
