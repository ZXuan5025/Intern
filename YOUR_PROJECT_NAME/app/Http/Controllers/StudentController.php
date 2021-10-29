<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Session;
use Crypt;


class StudentController extends Controller
{
    /**
     * Display a listing of the students.
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

    public function show()
    {
        return view('student.signin');
    }

    public function signin()
    {
       return view('student.signin');
    }

    public function register()
    {
        return view('student.register');
    }
    
    public function home()
    {
        return view('student.home');
    }

    public function contact()
    {
        return view('student.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function store(Request $req){
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
        $students->ic = $data['ic'];
        $students->name = $data['name'];
        $students->email = $data['email'];
        $students->phoneno = $data['phoneno'];
        $encrypted_password = crypt::encrypt($data['password']);
        $students->password = $encrypted_password;
        $students->save();
        $req->session()->flash('register_status','User has been registered successfully');
        return redirect()->route('student.signin')->with('success', 'Data Added');
        }
        else{
        $req->session()->flash('register_status','This IC already exists.');
        return redirect()->route('student.register');
        }
        }

        function accept(Request $req){
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
            return redirect('/');
            }
            else{
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
            if($decrypted_password==$req->input('password')){
            echo "You are logged in Successfully";
            $req->session()->put('students',$result[0]->name);
            return redirect()->route('student.home');
            }
            else{
            $req->session()->flash('error','Password Incorrect!!!');
            echo "IC Does not Exist.";
            return redirect()->route('student.signin')->with('error', 'Please try again');
            }
            }
            }
}
