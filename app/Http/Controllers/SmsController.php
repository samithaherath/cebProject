<?php

namespace App\Http\Controllers;

use App\Sms;
use SoapClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SmsController extends Controller
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
      $singlemesseges = DB::select("select * from messages ");
      $groupmessages = DB::select("select * from sent_group_messeges ");
        


      // return view('dashboard.pages.manage_members',['members'=>$members]);
        return view('dashboard.pages.manage_sms',['groupmessages'=>$groupmessages],['singlemesseges'=>$singlemesseges]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createsinglemessage()
    {
         return view('dashboard.pages.create_message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Send  a single created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storesinglemessage(Request $request)
    {
        //validating membership form fields
            $this-> validate($request,[
            'union_id' => 'required',
             'mobile_number' => 'required',
              'message' => 'required',

        ]);

              $member_id = $request->get('union_id');
               $mobile_number = $request->get('mobile_number');
                $message = $request->get('message');
        $timestamp = now();
         $messages = DB::insert('insert into messages(mobile_number,msg_body,created_at) value(?,?,?)',[$mobile_number,$message,$timestamp]);

         $oldmsgid = DB::table('messages')->latest()->first();

         $oldid=$oldmsgid->msg_id;
       

         $newmsgid = $oldid;
         $sentmesseges = DB::insert('insert into sentmesseges(member_id,msg_id,msg_body,created_at) value(?,?,?,?)',[$member_id,$newmsgid,$message,$timestamp]);
            
            $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();


            $session=$sms->createSession('',$username,$password,''); 

            $alias='CEBTU';

 

            $sms->sendMessages($session,$alias,$message,array($mobile_number), 0); 

            $sms->closeSession($session); 

        if($messages){
            $red = redirect('admin/messages/')->with('success','message succefully added');

        }else {
            $red = redirect('admin/messages/singlesend')->with('danger','Input data failed ');
        }

        return $red;
    }

    //method for sent messages to all members in the system
    public function createmultiplemessageusers()
    {
          $members = DB::select("select * from users ");

         return view('dashboard.pages.create_message_for_numbers',['members'=> $members]);
    }

       public function storesmultiplemessageusers(Request $request)
    {
        //validating membership form fields
            $this-> validate($request,[
            'message' => 'required',
            'ids' =>'required',

        ]);
        
        $ids = $request->get('ids');

        

        $mobilenumbers = [];  
          $members = DB::select('select * from users where union_id  in ('.implode(",",$ids).')');
             foreach($members as $member){
                $member_mobile = $member->mobile;
                 array_push($mobilenumbers, $member_mobile);
             }
         $mobile_number =  implode(',', $mobilenumbers);
        $message = $request->get('message');
        $timestamp = now();
        $messages = DB::insert('insert into messages(mobile_number,msg_body,created_at) value(?,?,?)',[$mobile_number,$message,$timestamp]);
        $oldmsgid = DB::table('messages')->latest()->first();
         $oldid=$oldmsgid->msg_id;
         $newmsgid = $oldid;

           $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();

              $session=$sms->createSession('',$username,$password,''); 

        $allusers = DB::select("select * from users");
        // $mobilenumbers = [];
           $members = DB::select('select * from users where union_id  in ('.implode(",",$ids).')');

            foreach($members as $member){
             $member_id = $member->union_id;
             $member_mobile = $member->mobile;
               $checkmsg = DB::select('select * from sentmesseges where msg_id=? and member_id=?  ',[$newmsgid,$member_id]);
                if(empty($checkmsg)){
             $sentmesseges = DB::insert('insert into sentmesseges(member_id,msg_id,msg_body,created_at) value(?,?,?,?)',[$member_id,$newmsgid,$message,$timestamp]);
            
           // $alias='CEBTU';
          //  $sms->sendMessages($session,$alias,$message,array($mobile_number), 1); 
                //array_push($mobilenumbers, $member_mobile);


            }else{

                //not sending message

            }
                
            }
         $mobilenumbersset = implode(', ', $mobilenumbers);
         $lengthofnumberset = count($mobilenumbers);
         if($lengthofnumberset>=500){
         
             $arraysize=450;

               $devidersize= round($lengthofnumberset/$arraysize);

                $mobilenumbers = collect( $mobilenumbers);

          
            $devided = $mobilenumbers->split(ceil($mobilenumbers->count()/$devidersize))->toArray();

            foreach ($devided as $item) {

                  //print_r($item);
 
               // $mobilenumberparts = implode(', ', $item);
                 $alias='CEBTU';
                 $sms->sendMessages($session,$alias,$message,$item, 1); 


               }


         }else {
         
             $alias='CEBTU';
            
            $sms->sendMessages($session,$alias,$message,$mobilenumbers, 1); 

         }

            $sms->closeSession($session); 

         $red = redirect('admin/messages/')->with('success','message succefully sent');

        return $red;
    }
    //method for sent messages to all members in the system
    public function createmultiplemessage()
    {
         return view('dashboard.pages.create_message_all');
    }

       public function storesmultiplemessage(Request $request)
    {
        //validating membership form fields
            $this-> validate($request,[
            'message' => 'required',

        ]);

             
        $mobile_number = 'sent to all' ;
        $message = $request->get('message');
        $timestamp = now();
        $messages = DB::insert('insert into messages(mobile_number,msg_body,created_at) value(?,?,?)',[$mobile_number,$message,$timestamp]);
        $oldmsgid = DB::table('messages')->latest()->first();

         $oldid=$oldmsgid->msg_id;
       

         $newmsgid = $oldid;

           $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();

              $session=$sms->createSession('',$username,$password,''); 

        $allusers = DB::select("select * from users");
         $mobilenumbers = [];

        foreach  ($allusers as $user){

            $member_id= $user->union_id;
            $member_mobile=$user->mobile;

            //check message already sent to the user

            $checkmsg = DB::select('select * from sentmesseges where msg_id=? and member_id=?  ',[$newmsgid,$member_id]);

            if(empty($checkmsg)){
             $sentmesseges = DB::insert('insert into sentmesseges(member_id,msg_id,msg_body,created_at) value(?,?,?,?)',[$member_id,$newmsgid,$message,$timestamp]);
            
            $alias='CEBTU';
           // $sms->sendMessages($session,$alias,$message,array($mobile_number), 1); 
              array_push($mobilenumbers, $member_mobile);


            }else{

                //not sending message

            }


           
        }
         $mobilenumbersset = implode(', ', $mobilenumbers);
         $lengthofnumberset = count($mobilenumbers);
         if($lengthofnumberset>=500){
         
             $arraysize=450;

               $devidersize= round($lengthofnumberset/$arraysize);

                $mobilenumbers = collect( $mobilenumbers);

          
            $devided = $mobilenumbers->split(ceil($mobilenumbers->count()/$devidersize))->toArray();

            foreach ($devided as $item) {

                  //print_r($item);
 
               // $mobilenumberparts = implode(', ', $item);
                 $alias='CEBTU';
                 $sms->sendMessages($session,$alias,$message,$item, 0); 


               }


         }else {
         
             $alias='CEBTU';
            
            $sms->sendMessages($session,$alias,$message,$mobilenumbers, 0); 

         }
       
       //sending messges to all members
          

            $sms->closeSession($session); 

         $red = redirect('admin/messages/')->with('success','message succefully added');

       return $red;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //method for sent messages to all members in the system
    public function creategroupmessage(Request $request)
    {
        /* if(empty(isset($request->group))){
             $groupmembers = DB::select("select * from group_members ");
         return view('dashboard.pages.create_group_message_all',['groupmembers'=>$groupmembers]);
         }*/
            $type = $request->type;
         
          if(isset($request->group)){
            
            $groups = $request->group;

            $groupmembers = DB::table('group_members')
                            ->whereIN('group_id',explode(',',$groups))->get();

          //  dd($groupmembers);
            response()->json($groupmembers);
        return view('dashboard.pages.all_group_members',compact('groups','groupmembers'));

          }else{

            if($type==1){


            }else {

                    $groupmembers = DB::select("select * from group_members ");
          return view('dashboard.pages.create_group_message_all',['groupmembers'=>$groupmembers]);
            
            }

      

          }

    }

        public function storesgroupmessage(Request $request)
    {

        //validating membership form fields
            $this-> validate($request,[
            'message' => 'required',
           'ids'=>'required',

        ]);

       
       

       $mobile_number = 'sent to groups' ;
        $message = $request->get('message');
        $timestamp = now();
        $messages = DB::insert('insert into messages(mobile_number,msg_body,created_at) value(?,?,?)',[$mobile_number,$message,$timestamp]);
        $oldmsgid = DB::table('messages')->latest()->first();

         $oldid=$oldmsgid->msg_id;
       
         $newmsgid = $oldid;

           $username='esmsusr_chl';
            $password='250jpul';
           
            $sms= new Sms();

            $client = $sms->getClient();

              $session=$sms->createSession('',$username,$password,''); 

       $mobilenumbers = [];

       $groupids = $request->get('groupids');
       $memberids = $request->get('ids');

       $puregroupids = array_unique($groupids,SORT_REGULAR);

   


      foreach ( $puregroupids as $id){

       
        $result = DB::table('groups')->select('groupname')->where('id', $id)->first();
        
        $groupname = $result->groupname;

        DB::insert('insert into sent_group_messeges(group_id,msg_id,group_name,msg_body,created_at) value(?,?,?,?,?)',[$id,$newmsgid,$groupname,$message,$timestamp]);
      
       
    }

     $allmembersingroup = DB::select('select * from group_members where member_id in ('.implode(",",$memberids).')');
        
         foreach  ($allmembersingroup as $user){

            $member_id= $user->member_id;
            $member_mobile=$user->member_mobile;

            //check message already sent to the user

            $checkmsg = DB::select('select * from sentmesseges where msg_id=? and member_id=?  ',[$newmsgid,$member_id]);

            if(empty($checkmsg)){
             $sentmesseges = DB::insert('insert into sentmesseges(member_id,msg_id,msg_body,created_at) value(?,?,?,?)',[$member_id,$newmsgid,$message,$timestamp]);
            
            $alias='CEBTU';
            $sms->sendMessages($session,$alias,$message,array($mobile_number), 0); 
              array_push($mobilenumbers, $member_mobile);


            }else{

                //not sending message

            }


           
        }
           $mobilenumbersset = implode(', ', $mobilenumbers);
         $lengthofnumberset = count($mobilenumbers);
         if($lengthofnumberset>=500){
         
             $arraysize=450;

               $devidersize= round($lengthofnumberset/$arraysize);

                $mobilenumbers = collect( $mobilenumbers);

          
            $devided = $mobilenumbers->split(ceil($mobilenumbers->count()/$devidersize))->toArray();

            foreach ($devided as $item) {

                  //print_r($item);
 
               // $mobilenumberparts = implode(', ', $item);
                 $alias='CEBTU';
                 $sms->sendMessages($session,$alias,$message,$item, 0); 


               }


         }else {
         
             $alias='CEBTU';
            
            $sms->sendMessages($session,$alias,$message,$mobilenumbers, 0); 

         }

    
            $sms->closeSession($session); 

         $red = redirect('admin/messages/sendgroupmessage')->with('success','message succefully added');

        return $red;








       }





    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchResponse(Request $request){
        $query = $request->get('term','');
        $users=\DB::table('users');
         if($request->type=='member_id'){
            $users->where('id','LIKE','%'.$query.'%');
        }
        if($request->type=='union_id'){
            $users->where('union_id','LIKE','%'.$query.'%');
        }
        if($request->type=='nic'){
            $users->where('nic','LIKE','%'.$query.'%');
        }
         if($request->type=='mobile'){
            $users->where('mobile','LIKE','%'.$query.'%');
        }
          if($request->type=='employee_id'){
            $users->where('employee_id','LIKE','%'.$query.'%');
        }
		 if($request->type=='name'){
            $users->where('name','LIKE','%'.$query.'%');
        }
           $users=$users->get();        
        $data=array();
        foreach ($users as $user) {
                $data[]=array('union_id'=>$user->union_id,'name'=>$user->name,'mobile'=>$user->mobile,'employee_id'=>$user->employee_id,'nic'=>$user->nic,'member_id'=>$user->id);
        }
        if(count($data))
             return $data;
        else
            return ['union_id'=>'','name'=>'','mobile'=>'','nic'=>'','employee_id'=>'','member_id'=>''];
    }
  /*  public function searchResponse(Request $request){
        $query = $request->get('term','');
        $users=\DB::table('users');
         $users->where('id','LIKE','%'.$query.'%')->orWhere('union_id','LIKE','%'.$query.'%')->orWhere('nic','LIKE','%'.$query.'%')->orWhere('mobile','LIKE','%'.$query.'%')->orWhere('mobile','LIKE','%'.$query.'%')->orWhere('employee_id','LIKE','%'.$query.'%');
         if($request->type=='member_id'){
            $users->where('id','LIKE','%'.$query.'%');
        }
        if($request->type=='union_id'){
            $users->where('union_id','LIKE','%'.$query.'%');
        }
        if($request->type=='nic'){
            $users->where('nic','LIKE','%'.$query.'%');
        }
         if($request->type=='mobile'){
            $users->where('mobile','LIKE','%'.$query.'%');
        }
          if($request->type=='employee_id'){
            $users->where('employee_id','LIKE','%'.$query.'%');
        }
           $users=$users->get();        
        $data=array();
        foreach ($users as $user) {
                $data[]=array('union_id'=>$user->union_id,'name'=>$user->name,'mobile'=>$user->mobile,'employee_id'=>$user->employee_id,'nic'=>$user->nic,'member_id'=>$user->id);
        }
        if(count($data))
             return $data;
        else
            return ['union_id'=>'','name'=>'','mobile'=>'','nic'=>'','employee_id'=>'','member_id'=>''];
    }*/


}
