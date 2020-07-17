<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Notifications\NewQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
Use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use Symfony\Component\Console\Input\Input;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index(Request $request)
    {
        //dd($request->user()->status);
        if($request->user()->status==0){
            Auth::logout();
         return redirect('/')->with('message','You are not yet activated');

        }

        else{

            $small = Str::of($request->user()->name)->words(1, ' ');
            $assign = DB::table('announcements')->where('date', NOW()->format('Y-m-d'))->get();
            //dd($assign);
            //$ann = \App\Announcement::all();

            return view('home',compact('request','small','assign'));
        }

    }

    public function edit(Request $request){
        //dd($request->image);
       $user = \App\User::findOrFail($request->user()->id);
       $user->name=$request->name;
       $user->email=$request->email;
       $user->phone=$request->phone;
       $user->address=$request->address;




       if($request->hasFile('image')){
//           $data= request()->validate([
//               'image'=>'file|image|max:1000'
//           ]);
           $cover = $request->file('image');
           $extension = $cover->getClientOriginalExtension();
           Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
           $cover->image = $cover->getFilename().'.'.$extension;
           //dd("aa");
           //$cover->save();
           DB::table('users')->where('id',$user->id)->update(['image'=>$cover->image]);
       }

       DB::table('users')->where('id',$user->id)->update(['name'=>$user->name]);
       DB::table('users')->where('id',$user->id)->update(['email'=>$user->email]);
       DB::table('users')->where('id',$user->id)->update(['phone'=>$user->phone]);
       DB::table('users')->where('id',$user->id)->update(['address'=>$user->address]);



        return redirect()->back();


    }

    public function post(){
        $data=\request()->validate([
            'question'=>'required',
        ]);
    $admins = Admin::all();
    foreach ($admins as $admin){
        $admin->notify(new NewQuestion($data));
    }
    $ques= auth()->user()->question()->create($data);
    //return redirect('/home');

    }

    public function answers(){
        $ans=DB::table('questions')->where([['user_id',auth()->user()->id],['answered',1]])->orderBy('created_at','desc')->get();
        return view('/home/qa',compact('ans'));
    }
}
