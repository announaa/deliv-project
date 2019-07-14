<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\address;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   /* protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }*/

    protected function create(array $data)
    {
        $users = empty(user::whereRaw('Id = (select max(Id) from users)')->first()->id)?  1000: user::whereRaw('Id = (select max(Id) from users)')->first()->id + 1 ;
        $a_id =  empty(Address::whereRaw('Address_Id = (select max(Address_Id) from Addresses)')->first()->Address_id)?  1000: Address::whereRaw('Address_Id = (select max(Address_Id) from Addresses)')->first()->Address_id + 1 ;
     
        
        
        
        $the_user = User::create([
            'id' => $users,
            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['Phone'],
            'img' => './img/uploads/'.$users."--img" ,
            'password' => Hash::make($data['password']),
            ]);
        move_uploaded_file($_FILES["pic"]["tmp_name"], './img/uploads/'.$users."--img");
            

            address::create([
                'Address_Id' => $a_id  ,
                'Address_line1' => $data['adl1'] , 
                'Address_line2' => $data['adl2'] ,
                'Address_City' => $data['city'],
                'Address_State' => 'nabatieh',
                'Address_PostalCode' => 1700,
                'Address_Country' => 'lebanon'
            ]);
            
            DB::table('Users_Addresses')->insert([
    
                'Customer_id' => $users ,
                'Address_id' => $a_id ,
                'Address_Type_Code' => 1,
                'Date_from' => '2016-12-18 00:00:00' ,
    
            ]);
            
        return $the_user;
    }

    public function validateprofpic()
    {
        $target_dir = "img/uploads/";
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["pic"]["tmp_name"]);
            if($check !== false) {
                $msg[0] =  "File is an image - " . $check["mime"] . ".";
                $msg[1]= $uploadOk = 1;
                return $msg;
            } else {
                $msg[0] = "File is not an image.";
                $msg[1]= $uploadOk = 0;
                return $msg;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $msg[0] = "Sorry, file already exists.";
            $msg[1]= $uploadOk = 0;
            return $msg;
        }
        // Check file size
        if ($_FILES["pic"]["size"] > 500000) {
            $msg[0] = "Sorry, your file is too large.";
            $msg[1]= $uploadOk = 0;
            return $msg;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $msg[0] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $msg[1]= $uploadOk = 0;
            return $msg;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg[0] = "Sorry, your file was not uploaded.";
            $msg[1] = $uploadOk = 0; 
            return $msg;
        // if everything is ok, try to upload file
        } else {
            if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
                $msg[0] = "The file ". basename( $_FILES["pic"]["name"]). " can be uploaded.";
                $msg[1]= $uploadOk = 1;
                return $msg;
            } else {
                $msg[0] = "Sorry, there was an error uploading your file.";
                $msg[1]= $uploadOk = 0;
                return $msg;
            }
        }
    }
    

}
