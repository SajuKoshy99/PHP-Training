<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class FrondEndController extends Controller
{
    public function homePage(){
        //$name='Aswathy';
        //$users = User::all();    //select * from users
        //$user = User::find(43);  //select * from users where user_id = 43;
        //$user = User::where('user_id',43)->first();
        // $user = User::where('email','beverly.mayert@example.net')->first();  //select * from users where user_id = 43;
        // $users = User::WhereIn('user_id',[43,23])->get();
        //$users = User::Where('status',1)->get();
        //return $user;
        $users = User::withTrashed()->active()->latest()->paginate(10);
        return view('home',compact('users'));    
        //session()->put('user_name','Saju Kurian');
        //session()->put('user_id',45);
       
        //Log::info('Query executed');
        //select * from customers where deleted_at NULL
        
        //return $user->created_at->format('d-M-Y');
    
    }

    public function create(){
        //session()->decrement('user_id');
        return view('users.create');
    }
    public function save(){
        // $name = request('name');
        // $email = request('email');
        // $dob = request('date_of_birth');
        // $status = request('status');
        
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'date_of_birth' => request('date_of_birth'),
            'status' => request('status'),
        ]);

        // $user = User::firstOrCreate([
        //     'email' => request('email')
        // ],[
        //      'name' => request('name'),
        //      'date_of_birth' => request('date_of_birth'),
        //      'status' => request('status'),
        // ]);

        // $user = User::updateOrCreate([
        //     'email' => request('email')
        // ],[
        //      'name' => request('name'),
        //      'date_of_birth' => request('date_of_birth'),
        //      'status' => request('status'),
        // ]);

        return redirect()->route('home')
               ->with('message','User Created Successfully !!!');
    }
    public function edit($userId){
        $user = User::find(decrypt($userId));
        return view('users.edit',compact('user'));
    }
    
    public function update(){
        //return request()->only('_token',"status");
        $userId = decrypt(request('user_id'));
        $user = User::find($userId)->update([
            'name' => request('name'),
            'email' => request('email'),
            'date_of_birth' => request('date_of_birth'),
            'status' => request('status'),
        ]);
        session()->flush();
        session()->flash('date',date('d-M-Y'));
        return redirect()->route('home')
               ->with('message','User Updated Successfully !!!');
    }
    public function delete($userId){
        User::find(decrypt($userId))->delete();
        return redirect()->route('home')
               ->with('message','User Deleted Successfully !!!');
    }
    public function forceDelete($userId){
        User::find(decrypt($userId))->forceDelete();
        return redirect()->route('home')
               ->with('message','User Force Deleted Successfully !!!');
    }
    public function activate($userId){
        $user = User::withTrashed()->find(decrypt($userId))->restore();;  //select * from users where deleted_at IS NULL and user_id=86;
        return redirect()->route('home')
               ->with('message','User Activated Successfully !!!');
    }
}

