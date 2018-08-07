<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Place;
use App\Blog;
use App\User;
use App\UserDetail;
use App\Review;
use App\Hotel;
use App\UserSuggestion;
use Auth;
use App\LikeDislike;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function blogShow()
    {
        $blogs = Blog::inRandomOrder()->paginate(3);
        //dd($places);
        return view('home',['blogs' => $blogs]);
    }

    public function shareBlog()
    {
        return view('user/shareblog');
    }

    public function suggestedPlace()
    {
        //$places = Place::where('status', 1)->paginate(9);
        $userdetail = Auth::user()->userDetails;
        
        //$places = Place::where('status', 0)->paginate(9);
        $places = Place::Where('tag', $userdetail->beach)
        ->orWhere('tag', $userdetail->hill)
        ->orWhere('tag', $userdetail->museum)
        ->orWhere('tag', $userdetail->temple)
        ->orWhere('tag', $userdetail->historical_place)
        ->orWhere('tag', $userdetail->water_fall)
        ->orWhere('tag', $userdetail->natural_place)
        
        ->paginate(9);
        
        //dd($places);
        return view('user/suggestedplace', ['places' => $places]);
    }

    public function viewPlace($id)
    {
       
        $place = Place::find($id);
        $user_id = Auth::user()->id;
        $reviews = Review::where('user_id',$user_id)->where('place_id',$id)->first();

        //$reviews = Auth::user()->reviews->place_id;
        
        $count = Review::where('place_id', $id )->count();
        $avg = Review::where('place_id', $id)->avg('rate');
        //echo $reviews;
        //dd($reviews->place_id);
        
        //return view('user/viewplace', ['reviews' => $reviews]);
        return view('user/viewplace')->with('place', $place)->with('count', $count)->with('avg', $avg)->with('reviews', $reviews);
    }

    public function addBlog(Request $request)
    {
        //return $request->all();
        $blog = new Blog;

        $blog->name = $request->place_name;
        $blog->placelocation = $request->placelocation;
        $blog->placedesc = $request->description;

        $imageName = $request->file('image')->getClientOriginalName();

        $request->file('image')->move(base_path() . '/public/img', $imageName);

        $blog->img = $imageName;

        $blog->save();

        Session::flash('message','Blog Add successfully.');

        //return view('user/shareblog');
        return redirect()->route('home');

    }

    public function cat($cat)
    {
        //echo $cat;
        $places = Place::where('tag',  $cat)->where('status',  1)->paginate(9);
        //dd($place);
       
        return view('user/suggestedplace', ['places' => $places]);
    }

    public function profile($id)
    {
        $user = User::find($id);
        //dd($user);
        //dd($user->userDetails->where());
        return view('user/profile')->with('user', $user);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        //dd($user);
         $user->fname = $request->fname;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role = "User";

        if ( empty ( $request->file('userImg') ) ) {
            $user->user_img = "null";
        }else{
            $imageName = $request->file('userImg')->getClientOriginalName();

            $request->file('userImg')->move(base_path() . '/public/img', $imageName);

            $user->user_img = $imageName;
        }
        
        
        $user->save();
        
        //echo "<script>alert('Course Update')</script>";
        //\Session::flash('message','Update successfully.');
        //\Session::flash('alert-class', 'alert-danger'); 
        Session::flash('message','User info Updated...!!!');
      
        $hc = new HomeController;
        return $hc->profile($id);
        
    }
    public function addDetails(Request $request, $id)
    {
        //echo 'hello';
        //return $request->all();
         $userdetail =new UserDetail;

        $userdetail->user_id = $id;
        $userdetail->beach = $request->beach;
        $userdetail->hill = $request->hill_station;
        $userdetail->museum = $request->museum;
        $userdetail->temple = $request->temple;
        $userdetail->historical_place = $request->historical_place;
        $userdetail->water_fall = $request->water_fall;
        $userdetail->natural_place = $request->natural_place;

        $userdetail->save();

        Session::flash('message','User Details Added...!!!');

        $hc = new HomeController;
        return $hc->suggestedPlace();


    }
    public function UpdateDetails(Request $request)
    {
        
        //return $request->all();
        $userdetail = Auth::user()->userDetails;
        // UserDetails::where('user_id', Auth::user()->id)->get();
        //dd($userdetail);

        $userdetail->beach = $request->beach;
        $userdetail->hill = $request->hill_station;
        $userdetail->museum = $request->museum;
        $userdetail->temple = $request->temple;
        $userdetail->historical_place = $request->historical_place;
        $userdetail->water_fall = $request->water_fall;
        $userdetail->natural_place = $request->natural_place;

        $userdetail->save();

        Session::flash('message','User Details Updated...!!!');

        //$hc = new HomeController;
        //return $hc->profile(Auth::user()->id);
        $id = Auth::user()->id;
        return redirect()->route('profile',$id);


    }

    public function addPostPage()
    {
        return view('user/addPost');
    }

    public function userAddPost( Request $request)
    {
        //add place
        
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
        
        
        $imageName = $request->file('itemImage')->getClientOriginalName();

        $request->file('itemImage')->move(base_path() . '/public/img', $imageName);

        $place->placeimage = $imageName;

        $place->tag = $request->placeType;
        $place->status = "0";

        $place->save();

        //Session()->put('name', 'ok');
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
        Session::flash('message','Place Add successfully.');

        //dd($place);
        //return redirect()->route('dashbord')->with('place', $place);
        //return view('admin/dashbord');
        return view('user/addPost');
    }

    
    public function search(Request $request)
    {
        //return $request->all();
        
        $places = Place::where('placename',  $request->data)->where('status',  1)->paginate(9);
        
        return view('user/suggestedplace', ['places' => $places]);
    }

    public function review(Request $request)
    {
        //return $request->all();
        $review =new Review;

        $review->user_id = $request->user_id;
        $review->place_id = $request->place_id;
        $review->rate = $request->rate;

        $review->save();

        //$id = Auth::user()->id;
        return redirect()->route('viewplace',$request->place_id);

    }

    public function message(Request $request)
    {
        //return $request->all();
        $suggestion = new UserSuggestion;

        $suggestion->user_id = Auth::user()->id;
        $suggestion->user_name = $request->from;
        $suggestion->message = $request->message;
        $suggestion->status = 0;

        $suggestion->save();

        //Session::flash('message','Thank You For Your Suggestion');
        Session::flash('name', $request->from);

        return redirect()->route('home');
        
        
    }

    public function like(Request $request)
    {
        $like = LikeDislike::where('user_id', Auth::user()->id)->where('place_id', $request->id)->first();
        if($like != null){
            $like->like_status = 1;
            $like->save();
        }
        else{
            $like = new LikeDislike;
            $like->user_id = Auth::user()->id;
            $like->place_id = $request->id;
            $like->like_status = 1;
            $like->save();
        }
        // $countLike = LikeDislike::where('like_status', 1 )->where('place_id', $request->id)->count();

        // return $countLike;
    }

    public function dislike(Request $request)
    {
        $like = LikeDislike::where('user_id', Auth::user()->id)->where('place_id', $request->id)->first();
        if($like != null){
            $like->like_status = 0;
            $like->save();
        }
        else{
            $like = new LikeDislike;
            $like->user_id = Auth::user()->id;
            $like->place_id = $request->id;
            $like->like_status = 0;
            $like->save();
        }
        // $countDislike = LikeDislike::where('like_status', 0 )->where('place_id', $request->id)->count();

        // return $countDislike;
    }
}
