<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\posts;
use App\reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function admin(){

        if(Auth::check()){
            $user = Auth::user();
            if($user->status == 'admin'){
                //fetch posts approval
                $data4 = new posts;
                $thisPosts = $data4->fetch_post_by_approval();
                // return $thisPosts;


                //exchange tag's id numbers to names
                $data = new posts;
                $thisPosts = $data->combinePostToTags($thisPosts);
                // return $thisPosts;


                //exchange tag's id numbers to names
                $data5 = new posts;
                $thisPosts = $data5->id_to_name($thisPosts);
                // return $thisPosts;


                $data6 = new reports;
                $thisReports = reports::select('*')->get();
                // return $thisReports;

                return view('user.admin', compact('thisPosts', 'thisReports'));
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/home');
        }

    }


    public function profile(){

        if(Auth::check()){
            $user = Auth::user();

            $post_counter = new user;
            $thisPostCounter = $post_counter->thisUserNumberOfPosts($user->id);
            $user->postCounter = $thisPostCounter;
    
            
            return view('user.profile', compact('user'));
        }else{
            return redirect('/home');
        }

    }




    public function changeUsername(Request $request){



        $user = Auth::user();

        $pass_check = Hash::check($request->pass_old, $user->password);
        if($pass_check){
            $user->name = $request->uname_name;
            $user->save();   
            return redirect()->back()->with('success', 'Username changed successfully');   
        }else{
            return redirect()->back()->withErrors(['msg' => 'Wrong Password!']);
        }
        
    }



    public function changeMail(Request $request){



        $user = Auth::user();

        $pass_check = Hash::check($request->pass_old, $user->password);
        if($pass_check){
            $user->email = $request->mail_name;
            $user->save();   
            return redirect()->back()->with('success', 'Email changed successfully');  
        }else{
            return redirect()->back()->withErrors(['msg' => 'Wrong Password!']);
        }
        
    }



    public function changePassword(Request $request){



        $user = Auth::user();

        

        $pass_check = Hash::check($request->pass_old, $user->password);
        if($pass_check){
            $user->password = Hash::make($request->pass_name);
            $user->save();   
            return redirect()->back()->with('success', 'Password changed successfully');  
        }else{
            return redirect()->back()->withErrors(['msg' => 'Wrong Password!']);
        }


     
    }




    public function deleteAccount(Request $request){



        $user = Auth::user();

        

        $pass_check = Hash::check($request->pass_del, $user->password);
        if($pass_check){
            $user->forceDelete();   
            return redirect('/home');
        }else{
            return redirect()->back()->withErrors(['msg' => 'Wrong Password!']);
        }
        
    }






}
