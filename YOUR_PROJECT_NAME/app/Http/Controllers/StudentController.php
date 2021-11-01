<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;


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
        $data=array('ic'=>$ic,"name"=>$name,"email"=>$email,"phoneno"=>$phoneno,"password"=>Hash::make($password));
        session_start();
            $_SESSION["signin"] = true;
            $_SESSION["ic"] = $ic; 
        DB::table('students')->insert($data);
        
        $_SESSION["name"] = DB::table('students')->where('ic', $ic)->value('name');
        $_SESSION["email"] = DB::table('students')->where('ic', $ic)->value('email');
        $_SESSION["phoneno"] = DB::table('students')->where('ic', $ic)->value('phoneno');

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
    
            if(Hash::check($password, $rpassword)){
                session_start();
                $_SESSION["signin"] = true;
                $_SESSION["ic"] = $ic; 
                
                $_SESSION["name"] = DB::table('students')->where('ic', $ic)->value('name');
                $_SESSION["email"] = DB::table('students')->where('ic', $ic)->value('email');
                $_SESSION["phoneno"] = DB::table('students')->where('ic', $ic)->value('phoneno');
                
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

    public function update(Request $req){
        session_start();
        $con = mysqli_connect("localhost", "root", "", "laravel");

        if(isset($_POST['update_data'])){
            $c_ic = $_SESSION["ic"];
            $c_name = $_POST['c_name'];
            $c_email = $_POST['c_email'];
            $c_phoneno = $_POST['c_phoneno'];

            $query = "UPDATE students SET name='$c_name', email='$c_email', phoneno='$c_phoneno' WHERE ic='$c_ic'";
            $query_run = mysqli_query($con, $query);

            $_SESSION["name"] = $_POST['c_name'];
            $_SESSION["email"] = $_POST['c_email'];
            $_SESSION["phoneno"] = $_POST['c_phoneno'];

            echo "<script>alert('Successfully Update Information');";
            echo 'window.location= "profile/"';
            echo '</script>';
        }
    }

    public function cpassword(Request $req){
        session_start();
        $con = mysqli_connect("localhost", "root", "", "laravel");

        if(isset($_POST['update_password'])){
            $password = DB::table('students')->where('ic', $_SESSION["ic"])->value('password');
            $opass = $_POST["opass"];
            $npass = $_POST['npass'];
            $cnpass = $_POST['cnpass'];

            if(Hash::check($opass, $password)){
                if($npass==$cnpass){
                    $npass = Hash::make($npass);
                    $query = "UPDATE students SET password='$npass' WHERE password='$password'";
                    $query_run = mysqli_query($con, $query);
                    echo "<script>alert('Password Changed Successfully');";
                    echo 'window.location= "profile/"';
                    echo '</script>';
                }
                else{
                    echo "<script>alert('Password must match with confirm password.');";
                    echo 'window.location= "profile/"';
                    echo '</script>';
                }            
            }                
            else{
                echo "<script>alert('Invalid Old Password');";
                echo 'window.location= "profile/"';
                echo '</script>';
            }
        }
    }

    public function delete(Request $req){
        session_start();
        $con = mysqli_connect("localhost", "root", "", "laravel");

        if(isset($_POST['delete'])){
            $ic = $_SESSION["ic"];

            $query = "DELETE FROM students WHERE ic='$ic'";
            $query_run = mysqli_query($con, $query);

            $_SESSION["signin"] = false;

            echo "<script>alert('Account Deleted');";
            echo 'window.location= "/signin"';
            echo '</script>';
        }
    }

}