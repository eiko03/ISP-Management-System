<?php

namespace App\Http\Controllers;

use App\Notifications\Announcement;
use App\Notifications\Newsteller;
use App\Notifications\QuesAnswered;
use App\Notifications\WelcomeUser;
use \Illuminate\Notifications\Notifiable;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=DB::table('users')->orderBy('created_at','desc')->get();
//         $a=count($users);
//        $c = DB::table('users')->where('status', '=', 1)->get();
//         $b=count($c);
        return view('admin',compact('users'));
    }
    public function status(Request $request, $id){
        $data= \App\User::findOrFail($id);
        if($data->status==0){
            $data->status=1;
            $data->activated_at= NOW()->format('Y-m-d H:i:s') ;
            $data->notify(new WelcomeUser());



        } else{
            $data->status=0;
        }
        $data->save();
        return redirect('admin')->with('message',$data->name.'Status Has Been Changed.');
    }
    public function announcement(){
        return view('admin.announcement');

    }
    public function question(){
        $ques = \DB::table('questions')->where('answered', '=', 0)->orderBy('created_at','desc')->get();
        return view('admin.question',compact('ques'));
    }
    public function questionsingle ($id){
        //$ques = \DB::table('questions')->where('id', '=', $id)->get();
        //dd($ques);
        return view("admin.questionsingle",compact('id'));

    }
    public function answer (Request $request){
        $ques = DB::table('questions')->where('id', '=', $request->id)->update(['answer'=>$request->answer]);
        $ques = DB::table('questions')->where('id', '=', $request->id)->update(['answered'=>true]);
        //dd($ques->user()->id);
        //$ques->notify(new QuesAnswered());
        return \redirect('admin/question');

    }
    public function statics(){
        $u = \App\User::all();
        $users=count($u);
        //$active= \App\User::where('status',1)-get();
        $a = DB::table('users')->where('status', '=', 1)->get();
        $active=count($a);
        $bb= DB::table('users')->where('status', '=', 1)->sum('package_speed');
        $stat=count(\App\Newsteller::all());

        return view('admin.statics',compact('users','active','bb','stat'));
    }
     public function storeannouncement(){
        $data = request()->validate([
            'announcement'=>'required',
        ]);
        $data['date'] = NOW();
        $users = \App\User::all();

         DB::table('announcements')->insert($data);

         foreach($users as $user){
             $user->notify(new Announcement($data));
         }


     }

     public function user($id){
         $user = DB::table('users')->where('id', '=', $id)->first();
         //dd($user->name);
         return view('admin/user',compact('user'));
     }
     public function package(Request $request){
       // dd($request->id);
         DB::table('users')->where('id', '=', $request->id)->update(['package'=>$request->package]);
         DB::table('users')->where('id', '=', $request->id)->update(['package_id'=>$request->package_id]);
         DB::table('users')->where('id', '=', $request->id)->update(['package_pass'=>$request->package_pass]);
         DB::table('users')->where('id', '=', $request->id)->update(['package_speed'=>$request->package_speed]);
        return \redirect('/admin');

     }

     public function destroysingle(Request $request){
         DB::table('users')->where('id', $request->id)->delete();
         return \redirect('/admin');

     }
     public function deletealldeactivated(){

         DB::table('users')->where('status', '=', 0)->delete();
         return \redirect('/admin');
     }
     public function ticket(){
        $all=DB::table('ticket')->orderBy('created_at', 'desc')->get();
        //dd($all);
         return view('admin/ticket',compact('all'));
     }
     public function news(Request $request){
         $news=\App\Newsteller::all();
         //dd($news);
         $data=$request;
         //$a=$news->token;
         foreach ($news as $email){
             $email->notify(new Newsteller([$data,$email->token]));
         }
     }
}
