<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Student;

use Crypt;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all()->toArray();
        return view('student.register', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.register');
    }

    //public function show()
    //{
        //return view('student.signin');
    //}

    //public function signin()
    //{
    //    return view('student.signin');
    //}
    
    public function home()
    {
        return view('student.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function register(Request $req){
        $validateData = $req->validate([
        'ic' => 'required',
        'name' => 'required|regex:/^[a-z A-Z]+$/u',
        'email' => 'required|email',
        'phoneno' => 'numeric|required',
        'password' => 'required',
        'cPassword' => 'required|same:password'
        ]);
        $result = DB::table('students')
        ->where('ic',$req->input('ic'))
        ->get();
        
        $res = json_decode($result,true);
        print_r($res);
        
        if(sizeof($res)==0){
        $data = $req->input();
        $students = new Student;
        $students->name = $data['ic'];
        $students->name = $data['name'];
        $students->email = $data['email'];
        $students->phoneno = $data['phoneno'];
        $encrypted_password = crypt::encrypt($data['password']);
        $students->password = $encrypted_password;
        $students->save();
        $req->session()->flash('register_status','User has been registered successfully');
        return redirect('/register');
        }
        else{
        $req->session()->flash('register_status','This IC already exists.');
        return redirect('/register');
        }
        }

        function signin(Request $req){
            $validatedData = $req->validate([
            'ic' => 'required',
            'password' => 'required'
            ]);
            
            $result = DB::table('students')
            ->where('ic',$req->input('ic'))
            ->get();
            
            $res = json_decode($result,true);
            print_r($res);
            
            if(sizeof($res)==0){
            $req->session()->flash('error','IC does not exist. Please register yourself first');
            echo "IC Does not Exist.";
            return redirect('signin');
            }
            else{
            echo "Hello";
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if($decrypted_password==$req->input('password')){
            echo "You are logged in Successfully";
            $req->session()->put('students',$result[0]->name);
            return redirect('/');
            }
            else{
            $req->session()->flash('error','Password Incorrect!!!');
            echo "IC Does not Exist.";
            return redirect('signin');
            }
            }
            }
}