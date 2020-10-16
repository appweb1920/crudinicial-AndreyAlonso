<?php

namespace App\Http\Controllers;

use App\Models\CollectorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Collector;
use App\Models\RecyclingPoint;

class CollectorDetailController extends Controller
{
    public function show(){
        $collector = Collector::all();
        $recyclingPoint = RecyclingPoint::all();
        $collectorDetails = DB::select("
                                            SELECT cd.id as cid,c.name as name, c.days_to_pick_up as days, rp.type_of_garbage as type,
                                                rp.opening_time as opening, rp.closing_time as closing
                                            FROM collector_details cd
                                                INNER JOIN collectors c ON cd.collector_id = c.id
                                                INNER JOIN recycling_points rp ON cd.recycling_point_id = rp.id");
        return view('collectorDetail/collectorDetail')
            ->with('collectors', $collector)
            ->with('recyclingPoints', $recyclingPoint)
            ->with('collectorDetails', $collectorDetails);
    }
    public function create(Request $request){
        $collectorDetail = new CollectorDetail;
        $collectorDetail->collector_id = $request->collector;
        $collectorDetail->recycling_point_id = $request->recyclingPoint;

        $exist = DB::table('collector_details')->select('id')
            ->where('collector_id','=', $collectorDetail->collector_id)
            ->where('recycling_point_id', '=', $collectorDetail->recycling_point_id)
            ->exists();
        if($exist){
            return redirect()->back();
        }
        $collectorDetail->save();

        return redirect('collectorDetails');
    }

    // delete this method deletes a collector in postgres db
    public function delete($id){
        $c = CollectorDetail::find($id);
        $c->delete();

        return redirect('collectorDetails');
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
