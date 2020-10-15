<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Collector;

class CollectorController extends Controller
{
    public function show(){
        $c = Collector::all();

        return view('collector/collector')->with('collectors', $c);
    }
    public function create(Request $request){
        $collector = new Collector;
        $collector->name = $request->name;
        $collector->days_to_pick_up = $request->days;
        $collector->created_at = now();
        $collector->updated_at = null;
        $collector->save();

        return redirect('collectors');
    }

    // delete this method deletes a collector in postgres db
    public function delete($id){
        $collector = Collector::find($id);
        $collector->delete();

        return redirect('collectors');
    }


    public function select(Request $request){
        $collector = Collector::find($request->id);
        $s = Collector::all();
        if(!is_null($collector)){
            return view('collector/update')
                ->with('collector', $collector) //collector to edit
                ->with('collectors', $s); // al collectors
        }

        return redirect('collectors');
    }

    public function update(Request $request){
        $collector = Collector::find($request->id);
        if(is_null($collector)){
            return redirect('collectors');
        }

        $collector->name = $request->name;
        $collector->days_to_pick_up = $request->days;
        $collector->updated_at = now();
        $collector->save();

        return redirect('collectors');
    }
}
