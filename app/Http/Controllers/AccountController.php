<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data =Account::all();
        return view('admin.account-list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-account-details')->with('Account', '');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->id)){
            $Account =Account::find($request->id); 
            $msg ='Account Updated Successfully!'; 
        }else{
            $Account =new Account();
            $msg ='Account Saved Successfully!';
        }
    
    
        $Account->holder_name =$request->holder_name;
        $Account->account_no =$request->account_no;
        $Account->ifsc_code =$request->ifsc_code;
        $Account->bank_name =$request->bank_name;
        $Account->upi =$request->upi;
        $Account->user_id =Auth::user()->id;
        $Account->game_name =$request->game_name;
        $Account->agent_name =$request->agent_name;
        $Account->save();
        $data =Account::all();
       
        return redirect('accountlist')
        ->with('Success', 'Account Saved Successfully!')->with('data', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $Account = Account::find($id);
        return view('admin.add-account-details')->with('Account', $Account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
      $post = Account::find($id);
      $post->delete();
      return redirect()->route('account.list')
        ->with('Success', 'Account deleted successfully');
    }

  
    public function editbyuser($id)
    {  
        $Account = Account::find($id);
        return view('admin.add-account-details_added_by_user')->with('Account', $Account);
    }
    public function store_by_user(Request $request)
    {
        if ($request->isMethod('post')) {
            if(!empty($request->id)){
                $Account =Account::find($request->id); 
                $msg ='Account Updated Successfully!'; 
            }else{
                $Account =new Account();
                $msg ='Account Saved Successfully!';
            }
        
            $Account->holder_name =$request->holder_name;
            $Account->account_no =$request->account_no;
            $Account->ifsc_code =$request->ifsc_code;
            $Account->bank_name =$request->bank_name;
            $Account->upi =$request->upi;
            $Account->user_id =Auth::user()->id;
            $Account->game_name =$request->game_name;
            if(isset($request)){
                $Account->amount =$request->amount;
            }else{
                $Account->amount ="";
            }
            $Account->save();
            $data =Account::all();
           
            return redirect('/dashboard')
            ->with('Success', $msg)->with('data', $data);  
        }else{
            return view('admin.add-account-details_added_by_user');
        }
       
    }

    public function adduser()
    {
        return view('admin.add-account-details_added_by_user')->with('Account', '');
    }

}
