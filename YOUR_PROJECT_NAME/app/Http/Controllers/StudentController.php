<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Student;


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

    function store(Request $request){
        $this->validate($request, [
            'ic'   => 'required',
            'name'   => 'required',
            'email'   => 'required|email',
            'phoneno'   => 'required',
            'password'  => 'required'
           ]);

        $ic = $request->input('ic');
        $name = $request->input('name');
        $email = $request->input('email');
        $phoneno = $request->input('phoneno');
        $password = $request->input('password');
        $cpassword = $request->input('cPassword');
        
        if($password==$cpassword){
        $data=array('ic'=>$ic,"name"=>$name,"email"=>$email,"phoneno"=>$phoneno,"password"=>$password);
        session_start();
            $_SESSION["signin"] = true;
            $_SESSION["ic"] = $ic; 
        DB::table('students')->insert($data);
        echo "<script>alert('Sign up successfully.');";
            echo 'window.location= "signin/"';
            echo '</script>';
        }
        else{
            echo "<script>alert('Password must match with confirm password.');";
            echo 'window.location= "register/"';
            echo '</script>';
        }
        }
    
        function accept(Request $request){
            $this->validate($request, [
                'ic'   => 'required',
                'password'  => 'required'
               ]);
    
               $ic = $request->input('ic');
    
               $rpassword = DB::table('students')->where('ic', $ic)->value('password');
    
            $password=$request->input('password');
    
            if($password==$rpassword){
                session_start();
                $_SESSION["signin"] = true;
                $_SESSION["ic"] = $ic; 
                echo "<script>alert('Login successfully.');";
                echo 'window.location= "/home"';
                echo '</script>';
            }
            else{
                echo "<script>alert('Invalid username or password.');";
                echo 'window.location= "/signin"';
                echo '</script>';
            }
}
}