<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Place;
use App\Hotel;
use App\Review;
use App\UserSuggestion;
use Auth;

class AdminController extends Controller
{
    public function dashbordshow()
    {
        $countRequest = Place::where('status', '=', 0)->count();
        $countMessage = UserSuggestion::where('status', '=', 0)->count();
        //return view('admin/dashbord')->with('count', $count);
        return view('admin/dashbord',compact('countRequest','countMessage'));

    }

    public function approvepage()
    {
        $places = Place::where('status', '=', 0)->get();
        //dd($places);
        return view('admin/approve')->with('places', $places);

    }

    public function messagelist()
    {
        $messages = UserSuggestion::where('status', '=', 0)->get();
        //dd($places);
        return view('admin/approve')->with('messages', $messages);

    }

    public function deleteMessage( $id)
    {
        
        $messages = UserSuggestion::find($id);

        $messages->delete();
        Session::flash('message','System Improved');
        return redirect()->route('dashbord');
        
        
    }

    
    public function regPage()
    {
        
        return view('reg');

    }

    public function addPlace(Request $request)
    {
        //$mytime = Carbon::now();
        //echo $mytime->toDateTimeString();
        
        $place = new Place;
        
        $place->user_id = $request->user_id;
        $place->cityname = $request->cityname;
        $place->placename = $request->placename;
        $place->overview = $request->placeoverview;
        
        if ( empty ( $request->busrent ) ) {
            $place->bus = "null";
        }else{
            $place->bus = $request->busrent;
        }

        if ( empty ( $request->trainrent ) ) {
            $place->train = "null";
        }else{
            $place->train = $request->trainrent;
        }

        if ( empty ( $request->airrent ) ) {
            $place->air = "null";
        }else{
            $place->air = $request->airrent;
        }

        if ( empty ( $request->shiprent ) ) {
            $place->ship = "null";
        }else{
            $place->ship = $request->shiprent;
        }
        
        
        //$date = $mytime->toDateTimeString();
        $imageName = $request->file('itemImage')->getClientOriginalName();

        $request->file('itemImage')->move(base_path() . '/public/img', $imageName);

        $place->placeimage = $imageName;

        $place->tag = $request->placeType;
        $place->status = "1";

        $place->save();
        //add hotel
        foreach ($request->hotel_name as $key => $name) {
            $hotel =new Hotel;
            $hotel->user_id = $request->user_id;
            $hotel->place_id = $place->id;
            $hotel->hotel_name = $request->hotel_name[$key];
            $hotel->hotel_type = $request->hotel_type[$key];
            $hotel->hotel_price = $request->hotel_price[$key];
            $hotel->save();

        }

        $place = Place::all()->last();

        //Session()->put('name', 'ok');
       
        Session::flash('message','Place Add successfully.');

        //dd($place);
        return redirect()->route('dashbord');
        //return view('admin/dashbord');
        
    }

    public function liveview()
    {
        $place = Place::all()->last();
        $count = Place::where('status', '=', 0)->count();
        
        $ac = new AdminController;
        $countRequest = $ac->dashbordshow()->countRequest;
        $countMessage = $ac->dashbordshow()->countMessage;
        
        //dd($countRequest);
        //return view('admin/dashbord', ['place' => $place, 'count' => $count]);
        return view('admin/dashbord',compact('place','count','countRequest','countMessage'));
    }

    public function viewApprovePlace($id)
    {
        $place = Place::find($id);
        $user_id = Auth::user()->id;
        $reviews = Review::where('user_id',$user_id)->where('place_id',$id)->first();
        $count = Review::where('place_id', $id )->count();
        $avg = Review::where('place_id', $id)->avg('rate');

        return view('user/viewplace')->with('place', $place)->with('count', $count)->with('avg', $avg)->with('reviews', $reviews);
    }

    public function approvePost($id)
    {
        $place = Place::find($id);
        
        $place->status = "1";
        $place->save();

        Session::flash('message','User Request Approved successfully.');

        //return view('admin/approve');
        $ac = new AdminController;
        return $ac->approvepage();

    }

    public function deleteUserPost( $id)
    {
        
        $place = Place::find($id);

        $place->delete();
        Session::flash('message','User Request Deleted successfully...!!!');
        return redirect()->route('dashbord');
        
        
    }

    public function test( )
    {
        
    
        return view('test');
    }
    public function testPost( Request $request)
    {
        return $request->all();
        
    }
}
