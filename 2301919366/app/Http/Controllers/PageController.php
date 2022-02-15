<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use App\Models\Ebook;
use App\Models\Order;
use Carbon\Carbon;
use Session;

class PageController extends Controller{

    public function user_home(){
        $ebooks = Ebook::all();
        return view('home', ['ebooks'=>$ebooks]);
    }

    public function user_ebook($ebook_id){
        $ebook = Ebook::where('ebook_id', $ebook_id)->first();
        return view('ebook', ['ebook'=>$ebook]);
    }

    public function user_ebook_add($ebook_id){
        $CONST_TIME = new Carbon('1974-05-12');

        $user = Auth::user();
        $orders = Order::where(['account_id' => $user->account_id, 'ebook_id' => $ebook_id, 'order_date' => $CONST_TIME]);
        if($orders->first() == NULL){
            $order = new Order;
            $order->account_id = $user->account_id;
            $order->ebook_id = $ebook_id;
            $order->order_date = $CONST_TIME;
            $order->save();
        }
        return redirect()->route('cart');
    }

    public function user_view_cart(){
        $CONST_TIME = new Carbon('1974-05-12');

        $user = Auth::user();
        $orders = Order::where(['account_id' => $user->account_id, 'order_date' => $CONST_TIME])->get();
        return view('cart', ['ebooks'=>$orders]);
    }

    public function user_cart_checkout(){
        $CONST_TIME = new Carbon('1974-05-12');

        $user = Auth::user();
        $orders = Order::where(['account_id' => $user->account_id, 'order_date' => $CONST_TIME])->update(['order_date'=>Carbon::now()]);
        return redirect()->route('success');
    }

    public function user_cart_delete($ebook_id){
        $CONST_TIME = new Carbon('1974-05-12');

        $user = Auth::user();
        $orders = Order::where(['account_id' => $user->account_id, 'order_date' => $CONST_TIME, 'ebook_id' => $ebook_id])->delete();
        return redirect()->route('cart');
    }

    public function user_success(){
        return view('success');
    }

    public function user_profile_page(){
        $account = Auth::user();
        return view('profile', ['account'=>$account]);
    }

    public function user_profile_update(Request $request){
        $validateData = $request->validate([
            'first_name'   => 'required|alpha|max:25',
            'middle_name'  => 'alpha|max:25',
            'last_name'    => 'required|alpha|max:25',
            'email'       => 'required|email|unique:Users,email',
            'gender'      => 'required|in:Female,Male',
            'password'    => 'min:8|regex:/^\D*\d\D*$/',
            'picture'     => 'image|file|max:10000'
        ]);

        $user = Auth()->user();

        Account::where('account_id', Auth()->user()->account_id)->update([
            'first_name' => $validateData['first_name'],
            'middle_name' => $validateData['middle_name'],
            'last_name' => $validateData['last_name'],
            'email' => $validateData['email'],
            'gender_id' => Gender::where('gender_desc', $validateData['gender'])->first()->gender_id
        ]);

        if($request->filled('password')){
            $hashed = Hash::make($request->password);
            Account::where('account_id', Auth::user()->account_id)->update(['password' => $hashed]);
        }

        if($request->hasFile('picture')){
            $filename = Carbon::now()->toDateString() . $request['picture']->getClientOriginalName();
            $path = $request['picture']->storeas('public/images', $filename);
            Account::where('account_id', Auth::user()->account_id)->update(['display_picture_link' => $filename]);
        }
        return redirect()->route('profile');
    }


    public function admin_acc_maintenance(){
        return view('acc_maintenance', ['users'=>Account::where(['delete_flag'=>0])->get()]);
    }

    public function admin_update_role($account_id){
        return view('update_profile', ['user'=>Account::where(['account_id'=>$account_id])->first()]);
    }

    public function admin_update_role_request(Request $request, $account_id){
        $request->validate([
            'role' => 'required|in:Admin,User'
        ]);
        Account::where('account_id', $account_id)->update(['role_id' => Role::where('role_desc', $request['role'])->first()->role_id]);
        return redirect()->route('acc_maintenance');
    }

    public function admin_delete_account($account_id){
        Account::where('account_id', $account_id)->update(['delete_flag'=>1]);
        return redirect()->route('acc_maintenance');
    }


    public function login_page(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        else{
            return view('login');
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Account::where(['email'=>$credentials['email'], 'delete_flag'=>1])->first() != NULL){
            return view('login', ['message'=>'Invalid credentials']);
        }
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }

        return view('login', ['message'=>'Invalid credentials']);
    }

    public function register_page(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        else{
            return view('register');
        }
    }

    public function register(Request $request){
        $validateData = $request->validate([
            'first_name'   => 'required|alpha|max:25',
            'middle_name'  => 'alpha|max:25',
            'last_name'    => 'required|alpha|max:25',
            'email'       => 'required|email|unique:accounts',
            'gender'      => 'required|in:Female,Male',
            'role'        => 'required|in:Admin,User',
            'password'    => 'required|min:8|regex:/^\D*\d\D*$/',
            'picture'     => 'required|image|file|max:10000'
        ]);

        $user = new Account;
        $user->first_name = $validateData['first_name'];
        $user->middle_name = $validateData['middle_name'];
        $user->last_name = $validateData['last_name'];
        $user->email = $validateData['email'];
        $user->gender_id = Gender::where('gender_desc', $validateData['gender'])->first()->gender_id;
        $user->role_id = Role::where('role_desc', $validateData['role'])->first()->role_id;
        $user->password = Hash::make($validateData['password']);

        $filename = Carbon::now()->toDateString() . $request['picture']->getClientOriginalName();
        $path = $request['picture']->storeas('public/images', $filename);
        $user->display_picture_link = $filename;
        $user->save();

        return redirect()->route('login');
    }

    public function logout(){

        if(Auth::check()){
            Auth::logout();
            Session::forget('user_session');
        }
        
        return view('logout');
    }
}
