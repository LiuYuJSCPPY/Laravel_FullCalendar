<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Illuminate\Support\Facades\Auth;

class FullCalenderController extends Controller
{
    //
    public function index(Request $request){

        if(Auth::user()){
            if($request->ajax()){

                $data = event::whereDate('start','>=',$request->start)->whereDate('end','<=',$request->end)->where('user_id','=',Auth::user()->id)->get();
                return response()->json($data);
            }
            return view('index');
        }else{
            return redirect()->route('login');
        }

    }

    public function action(Request $request){

        if(Auth::user()){
            if($request->ajax()){
                if($request->type == 'add'){
                    $event = event::create([
                        'title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end,
                        'user_id' => Auth::user()->id,
                    ]);

                    return response()->json($event);
                }

                if($request->type == 'update'){
                    $event = event::find($request->id)->update([
                        'title' => $request->title,
                        'start' => $request->start,
                        'end' => $request->end,
                    ]);
                    return response()->json($event);

                }

                if($request->type == 'delete'){
                    $event = event::find($request->id)->delete();

                    return response()->json($event);
                }
            }
        }

    }
}
