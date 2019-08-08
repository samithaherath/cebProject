<?php

namespace App\Http\Controllers;
use App\Sms;
use SoapClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin',['except' =>'test']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = DB::select("select * from users where inRecycle = 0");

        //$designations = DB::select("select * from designations");
       // $workplaces = DB::select("select * from workplaces");

        return view('dashboard.pages.manage_members',['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $designations = DB::select("select * from designations");
        $workplaces = DB::select("select * from workplaces");
        return view('dashboard.pages.add_member',['designations'=>$designations],['workplaces'=>$workplaces]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		  
        //validating membership form fields
            $this-> validate($request,[
            'name' => 'required',
            'lname' => 'required',
            'union_id' => 'required|unique:users,union_id',
            'username' => 'required',
          //   'email' => 'required',
           //  'nic'=> 'unique:users,nic',
            'mobile'=> 'required|unique:users,mobile',
            'address'=> 'required',
            'dob'=> 'required',
           'employee_id'=> 'required|unique:users,employee_id',
            'profile_img' => 'image|max:2048',
            'password' => 'required',
           //  'homephone' => 'required',
             'gender' => 'required',
          //  'designation' => 'required',
          // 'work_place' => 'required',


        ]);

     
       //geting data from  membership field data
      

       $name = $request->get('name');
        $lname = $request->get('lname');
       $union_id = $request->get('union_id');
       $username = $request->get('username');
       $password = Hash::make( $request->get('password'));
       $passwordorginal = $request->get('password');
       $dob = $request->get('dob');
       $nic = $request->get('nic');
      // $profile_img = $request->get('profile_img');
       $homephone = $request->get('homephone');
       $mobile = $request->get('mobile');
       $address = $request->get('address');
       $employee_id = $request->get('employee_id');
       $designation = $request->get('designation');
       $gender = $request->get('gender');
       $email = $request->get('email');
       $work_place = $request->get('work_place');
       $status = 1;
       $timestamp = now();
       if(empty($request->file('profile_img'))){ 
		     $checkrecordexxists = DB::select('select * from users where nic=? ',[$nic]);

        $rowcount= count($checkrecordexxists);

       if($rowcount==0){ 
        $member = DB::insert('insert into users(name,lname,status,username,email,nic,mobile,address, union_id,employee_id,password,homephone,gender,designation,work_place,dob,created_at) value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$name,$lname,$status,$username,$email,$nic,$mobile,$address,$union_id,$employee_id,$password,$homephone,$gender,$designation,$work_place,$dob,$timestamp]);
       $message=$union_id.'You are now added CEBTU Online Database  Username: '.$username.'  Password:'.$passwordorginal.'Please Log in to http://www.cebtu.lk/login';


        if($member){
              $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();


            $session=$sms->createSession('',$username,$password,''); 

            $alias='CEBTU';

 

            $sms->sendMessages($session,$alias,$message,array($mobile), 0); 

            $sms->closeSession($session); 
            $red = redirect('admin/members/add')->with('success','Member succefully added');

        }else {
            $red = redirect('members/add')->with('danger','Input data failed ');
        }
	   }else {
		    $red = redirect('members/add')->with('danger','nic already exists ');
	   }
		 
      }else{
         
          $image =$request->file('profile_img');
       $new_name = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path('members/profileimg'),$new_name);
          $checkrecordexxists = DB::select('select * from users where nic=? ',[$nic]);

        $rowcount= count($checkrecordexxists);

       if($rowcount==0){ 
          $member = DB::insert('insert into users(name,lname,status,username,email,nic,mobile,address, union_id,employee_id,profile_img,password,homephone,gender,designation,work_place,dob,created_at) value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$name,$lname,$status,$username,$email,$nic,$mobile,$address,$union_id,$employee_id,$new_name,$password,$homephone,$gender,$designation,$work_place,$dob,$timestamp]);
       $message=$union_id.'You are now added successfully to  CEBTU Online Database  Username: '.$username.'  Password:'.$passwordorginal.'Please Log in to http://www.cebtu.lk/login';


        if($member){
              $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();


            $session=$sms->createSession('',$username,$password,''); 

            $alias='CEBTU';

 

            $sms->sendMessages($session,$alias,$message,array($mobile), 1); 

            $sms->closeSession($session); 
            $red = redirect('admin/members/add')->with('success','Member succefully added');

        }else {
            $red = redirect('members/add')->with('danger','Input data failed ');
        }
	   }else{
		    $red = redirect('members/add')->with('danger','nic already exists ');
	   }
      }

        return $red;
 

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $members = DB::select('select * from users where id=? ',[$id]);

         $designations = DB::select("select * from designations");
         $workplaces = DB::select("select * from workplaces");
        return view('dashboard.pages.member_profile',compact('members','designations','workplaces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = DB::select('select * from users where id=?',[$id]);
        $designations = DB::select("select * from designations");
        $workplaces = DB::select("select * from workplaces");
        //['members'=> $members],['workplaces'=>$workplaces],['designations'=>$designations]

        return view('dashboard.pages.edit_member',compact('members','designations','workplaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validating membership form fields
            $this-> validate($request,[
            'name' => 'required',
            'lname' => 'required',
            'union_id' => 'required',
            'username' => 'required',
           // 'email' => 'required',
          // 'nic'=> 'numeric|min:10|max:50',
            'mobile'=> 'required',
            'address'=> 'required',
            'dob'=> 'required',
           'employee_id'=> 'required',
            'profile_img' => 'image|max:2048',
            //'password' => 'required',
           //  'homephone' => 'required',
             'gender' => 'required',
           // 'designation' => 'required',
         //'work_place' => 'required',
        ]);

       
      

       $name = $request->get('name');
        $lname = $request->get('lname');
       $union_id = $request->get('union_id');
       $username = $request->get('username');
	  $passwordorginal=$request->get('password');
	   if(!empty($request->get('password'))){
       $password = Hash::make( $request->get('password'));
	   }else{
		   
	    $password = "";
	   }
       $dob = $request->get('dob');
       $nic = $request->get('nic');
       $profile_img = $request->get('profile_img');
       $homephone = $request->get('homephone');
       $mobile = $request->get('mobile');
       $address = $request->get('address');
       $employee_id = $request->get('employee_id');
       $designation = $request->get('designation');
       $gender = $request->get('gender');
       $email = $request->get('email');
       $work_place = $request->get('work_place');
       $status = $request->get('status');;
       $timestamp = now();
		
		/* if these records still exists these fields set to null becuse that fields are uinque*/
		   $checkrecordexxistsem = DB::select('select * from users where  email=?',[$email]);

        $rowcountunionem= count($checkrecordexxistsem);

        if($rowcountunionem==0){
		  
		 $email = $request->get('email');
			
		}else{
		 
		  $result = DB::table('users')->select('email')->where('id', $id)->first();
      
         $email= $result->email;
      
		}
		
		   $checkrecordexxistsun = DB::select('select * from users where  union_id=?',[$union_id]);

        $rowcountunionid= count($checkrecordexxistsun);

        if($rowcountunionid==0){
		  
		 $union_id = $request->get('union_id');
			
		}else{
		 
		  $result = DB::table('users')->select('union_id')->where('id', $id)->first();
        // $result2 = DB::table('users')->select('mobile')->where('union_id', $unionid)->first();
         $union_id= $result->union_id;
       
		
		
			
		}
	   $checkrecordexxists = DB::select('select * from users where  nic=?',[$nic]);

        $rowcountnic= count($checkrecordexxists);

        if($rowcountnic==0){
		  
		 $nic = $request->get('nic');
			
		}else{
		 
		  $result = DB::table('users')->select('nic')->where('id', $id)->first();
        // $result2 = DB::table('users')->select('mobile')->where('union_id', $unionid)->first();
         $nic= $result->nic;
       
		
		
			
		}
		
		 $checkrecordexxistsmobile = DB::select('select * from users where  mobile=?',[$mobile]);
		 $rowcountmobile= count($checkrecordexxistsmobile);

        if($rowcountmobile==0){
			
			  $mobile = $request->get('mobile');
		  
			
		}else{
		  
		 $result = DB::table('users')->select('mobile')->where('id', $id)->first();
        // $result2 = DB::table('users')->select('mobile')->where('union_id', $unionid)->first();
         $mobile= $result->mobile;
		
		
			
		}
		
		 $checkrecordexxistsempid = DB::select('select * from users where  employee_id=?',[$employee_id]);
		 $rowcountempid= count($checkrecordexxistsempid);

        if($rowcountempid==0){
		   $employee_id = $request->get('employee_id');
			
		}else{
	    
		$result = DB::table('users')->select('employee_id')->where('id', $id)->first();
        // $result2 = DB::table('users')->select('mobile')->where('union_id', $unionid)->first();
         $employee_id= $result->employee_id;
		  
		
		
		
			
		}

         if(empty($request->file('profile_img'))){
			 
			 if(empty($request->get('password'))){
			    $members = DB::update('update users set name= ? , lname=? , union_id =? , username = ? , dob = ? , nic = ? , homephone = ? , mobile = ? , address = ? , employee_id = ? , designation = ? , gender = ? , email = ? , work_place = ? , status = ? , updated_at = ? where id = ? ',
        [$name,$lname,$union_id,$username,$dob,$nic,$homephone,$mobile,$address,$employee_id,
            $designation,$gender,$email,$work_place,$status,$timestamp,$id]);

       if($members) {
            $red = redirect('admin/members')->with('success','Data has been updated');
          

       }else {

         $red = redirect('members/edit/',$id)->with('danger','Error update please try again');
		   
       }
		 return $red;
			 }else{
				 
				 
				
			    $members = DB::update('update users set name= ? , lname=? , union_id =? , username = ? , password=? , dob = ? , nic = ? , homephone = ? , mobile = ? , address = ? , employee_id = ? , designation = ? , gender = ? , email = ? , work_place = ? , status = ? , updated_at = ? where id = ? ',
        [$name,$lname,$union_id,$username,$password,$dob,$nic,$homephone,$mobile,$address,$employee_id,
            $designation,$gender,$email,$work_place,$status,$timestamp,$id]);
				  $message=$union_id.'Your password changed succesfully CEBTU Online Database. Username: '.$username.' ,      Password:'.$passwordorginal.'Please Log in to http://www.cebtu.lk/login';

       if($members) {
		     $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();


            $session=$sms->createSession('',$username,$password,''); 

            $alias='CEBTU';

 

            $sms->sendMessages($session,$alias,$message,array($mobile), 0); 

            $sms->closeSession($session); 
            $red = redirect('admin/members')->with('success','Data has been updated');

           

       }else {

         $red = redirect('members/edit/',$id)->with('danger','Error update please try again');
		   
		   
       }
				return $red; 
				 
			 
			 
			  
      

       
        
			 
			 
			 }
			 
		 }else {
				 
			 if(empty($request->get('password'))){
				 
				 
          //geting data from  membership field data
       $image =$request->file('profile_img');
       $new_name = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path('members/profileimg'),$new_name);
      // $new_name="test.jpg";
          $members = DB::update('update users set name= ? , lname=? , union_id =? , username = ?  , dob = ? , nic = ? , profile_img = ? , homephone = ? , mobile = ? , address = ? , employee_id = ? , designation = ? , gender = ? , email = ? , work_place = ? , status = ? , updated_at = ? where id = ? ',
        [$name,$lname,$union_id,$username,$dob,$nic,$new_name,$homephone,$mobile,$address,$employee_id,
            $designation,$gender,$email,$work_place,$status,$timestamp,$id]);

       if($members) {
            $red = redirect('admin/members')->with('success','Data has been updated');



       }else {

         $red = redirect('members/edit/',$id)->with('danger','Error update please try again');
       }
			 }else{
				 
				 
				   //geting data from  membership field data
       $image =$request->file('profile_img');
       $new_name = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path('members/profileimg'),$new_name);
      // $new_name="test.jpg";
          $members = DB::update('update users set name= ? , lname=? , union_id =? , username = ? , password=? , dob = ? , nic = ? , profile_img = ? , homephone = ? , mobile = ? , address = ? , employee_id = ? , designation = ? , gender = ? , email = ? , work_place = ? , status = ? , updated_at = ? where id = ? ',
        [$name,$lname,$union_id,$username,$password,$dob,$nic,$new_name,$homephone,$mobile,$address,$employee_id,
            $designation,$gender,$email,$work_place,$status,$timestamp,$id]);
				  $message=$union_id.'Your password changed succesfully CEBTU Online Database  Username: '.$username.'    Password:'.$passwordorginal.'Please Log in to http://www.cebtu.lk/login';

       if($members) {
		     $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();


            $session=$sms->createSession('',$username,$password,''); 

            $alias='CEBTU';

 

            $sms->sendMessages($session,$alias,$message,array($mobile), 0); 

            $sms->closeSession($session); 
            $red = redirect('admin/members')->with('success','Data has been updated');

             

       }else {

         $red = redirect('members/edit/',$id)->with('danger','Error update please try again');
       }
				 
				 
				 
			 }

          return $red;
        }


       



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members = DB::delete('delete from users where id =?',[$id]);
        $red = redirect('admin/members');
        return $red;
    }
   
      /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function deleteAll(Request $request){
         $this-> validate($request,[
            'ids' => 'required',

        ]);

        $ids = $request->get('ids');
        $dbs = DB::delete('delete from users where id in ('.implode(",",$ids).')');
        return redirect('admin/home');

    }
	
	    public function recycleAll(Request $request){
         $this-> validate($request,[
            'ids' => 'required',

        ]);

        $ids = $request->get('ids');
        $dbs = DB::update('update  users set inRecycle = 1  where id in ('.implode(",",$ids).')');
        return redirect('admin/members');

    }

       public function restoreall(Request $request){
         $this-> validate($request,[
            'ids' => 'required',

        ]);

        $ids = $request->get('ids');
        $dbs = DB::update('update  users set inRecycle = 0  where id in ('.implode(",",$ids).')');
        return redirect('admin/home');

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recycle($id)
    {
        $members = DB::update('update users set inRecycle = 1  where id =?',[$id]);
        $red = redirect('admin/members');
        return $red;
    }

     public function restore($id)
    {
        $members = DB::update('update users set inRecycle = 0  where id =?',[$id]);
        $red = redirect('admin/members');
        return $red;
    }


      public function showTrash()
    {
        $members = DB::select('select * from users where inRecycle=1');

        return view('dashboard.pages.member_trash',compact('members'));
    }

     
}
