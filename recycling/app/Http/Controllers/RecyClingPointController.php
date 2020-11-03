<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RecyclingPoint;

use App\Models\Collector;


class RecyClingPointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(){
        $rp = RecyclingPoint::all();

        return view('recyclingPoint/recyclingPoint')->with('recyclingPoints', $rp);
    }
    public function create(Request $request){
        $recyclingPoint = new RecyclingPoint;
        $recyclingPoint->type_of_garbage = $request->type;
        $recyclingPoint->opening_time = $request->opening;
        $recyclingPoint->closing_time = $request->closing;
        $recyclingPoint->created_at = now();
        $recyclingPoint->updated_at = null;
        $recyclingPoint->save();

        return redirect('recyclingPoints');
    }

    // delete this method deletes a recyclingPoint in postgres db
    public function delete($id){
        $recyclingPoint = RecyclingPoint::find($id);
        $recyclingPoint->delete();

        return redirect('recyclingPoints');
    }


    public function select(Request $request){
        $recyclingPoint = RecyclingPoint::find($request->id);
        $s = RecyclingPoint::all();
        if(!is_null($recyclingPoint)){
            return view('recyclingPoint/update')
                ->with('recyclingPoint', $recyclingPoint) //recyclingPoint to edit
                ->with('recyclingPoints', $s); // al recyclingPoints
        }

        return redirect('recyclingPoints');
    }

    public function update(Request $request){
        $recyclingPoint = RecyclingPoint::find($request->id);
        if(is_null($recyclingPoint)){
            return redirect('recyclingPoints');
        }

        $recyclingPoint->type_of_garbage = $request->type;
        $recyclingPoint->opening_time = $request->opening;
        $recyclingPoint->closing_time = $request->closing;
        $recyclingPoint->created_at = now();
        $recyclingPoint->updated_at = now();
        $recyclingPoint->save();

        return redirect('recyclingPoints');
    }
}
