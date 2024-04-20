<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userslist(){

        $Product =User::all();
        return view('admin.userslist')->with('Product', $Product);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('admin.add-user');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
        if(!empty($request->id)){
            $user =User::find($request->id); 
            $request->validate([
                'Username' => 'required|string|max:250',
                // 'email' => 'required|email|max:250|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);
            $msg ='You have successfully Updated!';  
        }else{
            $user =new User();
            $request->validate([
                'Username' => 'required|string|max:250',
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);

            $msg ='You have successfully registered!';
        }
        
            $user->name = $request->Username;
            $user->email = $request->email;
            $user->admin_type = 2;
            $user->password = Hash::make($request->password);
            $user->plan =$request->plan;
            $user->game_name =$request->game_name;
            $user->save();
            $user->id;

        // $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        $Product =User::all();
        if(empty($request->id)){
            return view('admin.add-screenshot')->with('user', $user->id);
        }else{
        return redirect()->route('users.list')->with('Product', $Product)
        ->with('Success', $msg);
        }
        
    }

    public function addscreenshot(Request $request){

        if($request->hasfile('profile')){
            $rand_num = (rand(10,100));
            $product_picture = $request->file('profile')->getClientOriginalExtension(); // getting file extension
            $fileName_product = 'profile'.$rand_num."_".$product_picture; // renameing image
            $upload_success_product =$request->file('profile')->move(public_path('uploads'), $fileName_product); // uploading file to given path
        }else{
            $fileName_product =$request->file_name;
        }
        $user =User::find($request->id);
        $user->screenshot =$fileName_product;
        $user->save();
        $msg ='You have successfully uploaded!';
        $Product =User::all();
        return redirect()->route('users.list')->with('Product', $Product)
        ->with('Success', $msg);
    }

    public function edit($id)
    {
        $Product = User::find($id);
        return view('admin.add-user')->with('Product', $Product);
    }

    public function destroy($id)
    {
      $User = User::where('id', $id)->delete();
      return redirect()->route('users.list')
        ->with('Success', 'User deleted successfully');
    }

    public function addproxy(Request $request){
        $settingspro =\DB::table('settings')->insert(['proxy_id'=>Auth::User()->id, 'proxy_name'=>$request->proxy_name]);
        return redirect()->route('dashboard')->with('Success', 'User deleted successfully');
    }

    public function addips(Request $request){
        $settingsips =\DB::table('settings')->insert(['ip_id'=>Auth::User()->id, 'ip_address'=>$request->ips_name]);
        return redirect()->route('dashboard')->with('Success', 'User deleted successfully');
    }

    public function transaction(){
        return view('admin.transaction-history');
    }
    
}
