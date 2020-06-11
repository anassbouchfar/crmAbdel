<?php

namespace App\Http\Controllers;

use App\Audio;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {   
        
        $mytime = Carbon::now();
        
        $mytime1 = Carbon::now();
        //$mytime1->toDateTimeString();
        $appel=DB::table('appels')->where('date','=' ,$mytime1->toDateString())->get();
        //dd($mytime1->toDateString());
        if(sizeof($appel)>0)
        {
            
            $nombre=($appel->first()->nombre);
             
        
        }
        else
        {
            $appel=new \App\Appel();
            $appel->date=$mytime1->toDateString();
            $appel->nombre=0;
            $appel->save();
            $nombre=$appel->nombre;
            
        }
        //dd($nombre);
        
        $clientsa=DB::table('clients')->where('compagne','=' ,"a")->get();
        $clientsb=DB::table('clients')->where('compagne','=' ,"b")->get();
        $clientsc=DB::table('clients')->where('compagne','=' ,"c")->get();
        $counta=0;
        $countb=0;
        $countc=0;
        foreach($clientsa as $clienta)
        {
            $counta=$counta+$clienta->cotisation;
        }
        foreach($clientsb as $clientb)
        {
            $countb=$countb+$clientb->cotisation;
        }
        foreach($clientsc as $clientc)
        {
            $countc=$countc+$clientc->cotisation;
        }
        $ca=($counta+$countb+$countc)*12;

        $ta=0;
        $ia=0;
        foreach($clientsa as $clienta)
        {   $ia=$ia+1;
            if($clienta->status=="ok")
            {
                $ta=$ta+1;
            }
        }
        if($ia>0){

            $ta=$ta*100/$ia;
             
             }
             else{
                 $ta=0;
             }
        $tb=0;
        $ib=0;
        foreach($clientsb as $clientb)
        {   $ib=$ib+1;
            if($clientb->status=="ok")
            {
                $tb=$tb+1;
            }
        }
        if($ib>0){

            $tb=$tb*100/$ib;
             
             }
             else{
                 $tb=0;
         }
        $tc=0;
        $ic=0;
        foreach($clientsc as $clientc)
        {   $ic=$ic+1;
            if($clientc->status=="ok")
            {
                $tc=$tc+1;
            }
        }
        if($ic>0){

       $tc=$tc*100/$ic;
        
        }
        else{
            $tc=0;
        }
        
        $x= \App\Client::with('audios')->get();

        //dd($x[0]->audios);
        $stack = array();
        
        foreach($x as $client)
        {
            
            if($client->date_status==$mytime->toDateString())
            {
                array_push($stack,['nom'=>$client->nom,'prenom'=>$client->prénom,'status'=>$client->status]);
            }
        }
        //return $stack;
        //dd($x);
        $assurances=\App\Assurance::all();
        $commentaires=\App\Commentaire::all();
        return view('dashboard',['clients'=>$x,'assurances'=>$assurances,'commentaires'=>$commentaires,'CA'=>$ca,'prime'=>($ca-0.1327*$ca)*0.3,'ta'=>$ta,'tb'=>$tb,'tc'=>$tc,'notification'=>$stack,'nombre'=>$nombre]); 
      }
    
    
    public function filtrer(Request $request)
    {   $mytime1 = Carbon::now();
        //$mytime1->toDateTimeString();
        $appel=DB::table('appels')->where('date','=' ,$mytime1->toDateString())->get();
        //dd($mytime1->toDateString());
        if(sizeof($appel)>0)
        {
            
            $nombre=($appel->first()->nombre);
             
        
        }
        else
        {
            $appel=new \App\Appel();
            $appel->date=$mytime1->toDateString();
            $appel->nombre=0;
            $appel->save();
            $nombre=$appel->nombre;
            
        }
        
        
        $clientsa=DB::table('clients')->where('compagne','=' ,"a")->get();
        $clientsb=DB::table('clients')->where('compagne','=' ,"b")->get();
        $clientsc=DB::table('clients')->where('compagne','=' ,"c")->get();
        $counta=0;
        $countb=0;
        $countc=0;
        foreach($clientsa as $clienta)
        {
            $counta=$counta+$clienta->cotisation;
        }
        foreach($clientsb as $clientb)
        {
            $countb=$countb+$clientb->cotisation;
        }
        foreach($clientsc as $clientc)
        {
            $countc=$countc+$clientc->cotisation;
        }

        $ca=($counta+$countb+$countc)*12;
        
            if($request->input('status')=="tout")
            {$ta=0;
                $ia=0;
                foreach($clientsa as $clienta)
                {   $ia=$ia+1;
                    if($clienta->status=="ok")
                    {
                        $ta=$ta+1;
                    }
                }
                if($ia>0){
        
                    $ta=$ta*100/$ia;
                     
                     }
                     else{
                         $ta=0;
                     }
                $tb=0;
                $ib=0;
                foreach($clientsb as $clientb)
                {   $ib=$ib+1;
                    if($clientb->status=="ok")
                    {
                        $tb=$tb+1;
                    }
                }
                if($ib>0){
        
                    $tb=$tb*100/$ib;
                     
                     }
                     else{
                         $tb=0;
                 }
                $tc=0;
                $ic=0;
                foreach($clientsc as $clientc)
                {   $ic=$ic+1;
                    if($clientc->status=="ok")
                    {
                        $tc=$tc+1;
                    }
                }
                if($ic>0){
        
               $tc=$tc*100/$ic;
                
                }
                else{
                    $tc=0;
                }
                $mytime =Carbon::now();
                $x= \App\Client::all();
                $stack = array();
        
            foreach($x as $client)
            {
                
                if($client->date_status==$mytime->toDateString())
                {
                    array_push($stack,['nom'=>$client->nom,'prenom'=>$client->prénom,'status'=>$client->status]);
                }
            }
                $clients= DB::table('clients')->where('compagne','=' ,$request->input('compagne'))->get();
                //dd($x);
                $assurances=\App\Assurance::all();
                $commentaires=\App\Commentaire::all();
                //dd(['clients'=>$x,'assurances'=>$assurances,'commentaires'=>$commentaires]);
                return view('dashboard',['clients'=>$clients,'assurances'=>$assurances,'commentaires'=>$commentaires,'CA'=>$ca,'prime'=>($ca-0.1327*$ca)*0.3,'ta'=>$ta,'tb'=>$tb,'tc'=>$tc,'notification'=>$stack,'nombre'=>$nombre]); 
            }
            else{

            
            $clients= DB::table('clients')->where('status','=' ,$request->input('status'))->where('compagne','=',$request->input('compagne'))->get();
        
            $assurances=\App\Assurance::all();
            $commentaires=\App\Commentaire::all();
            $ta=0;
            $ia=0;
            foreach($clientsa as $clienta)
            {   $ia=$ia+1;
                if($clienta->status=="ok")
                {
                    $ta=$ta+1;
                }
            }
            if($ia>0){
    
                $ta=$ta*100/$ia;
                 
                 }
                 else{
                     $ta=0;
                 }
            $tb=0;
            $ib=0;
            foreach($clientsb as $clientb)
            {   $ib=$ib+1;
                if($clientb->status=="ok")
                {
                    $tb=$tb+1;
                }
            }
            if($ib>0){
    
                $tb=$tb*100/$ib;
                 
                 }
                 else{
                     $tb=0;
             }
            $tc=0;
            $ic=0;
            foreach($clientsc as $clientc)
            {   $ic=$ic+1;
                if($clientc->status=="ok")
                {
                    $tc=$tc+1;
                }
            }
            if($ic>0){
    
           $tc=$tc*100/$ic;
            
            }
            else{
                $tc=0;
            }
            $mytime =Carbon::now();
            $x= \App\Client::all();
            $stack = array();
        
        foreach($x as $client)
        {
            
            if($client->date_status==$mytime->toDateString())
            {
                array_push($stack,['nom'=>$client->nom,'prenom'=>$client->prénom,'status'=>$client->status]);
            }
        }
            
            return view('dashboard',['clients'=>$clients,'assurances'=>$assurances,'commentaires'=>$commentaires,'CA'=>$ca,'prime'=>($ca-0.1327*$ca)*0.3,'ta'=>$ta,'tb'=>$tb,'tc'=>$tc,'notification'=>$stack,'nombre'=>$nombre]);
        }
    }
    public function chercher(Request $request)
    {       

        $mytime1 = Carbon::now();
        //$mytime1->toDateTimeString();
        $appel=DB::table('appels')->where('date','=' ,$mytime1->toDateString())->get();
        //dd($mytime1->toDateString());
        if(sizeof($appel)>0)
        {
            
            $nombre=($appel->first()->nombre);
             
        
        }
        else
        {
            $appel=new \App\Appel();
            $appel->date=$mytime1->toDateString();
            $appel->nombre=0;
            $appel->save();
            $nombre=$appel->nombre;
            
        }

        $clientsa=DB::table('clients')->where('compagne','=' ,"a")->get();
        $clientsb=DB::table('clients')->where('compagne','=' ,"b")->get();
        $clientsc=DB::table('clients')->where('compagne','=' ,"c")->get();
        $counta=0;
        $countb=0;
        $countc=0;
        foreach($clientsa as $clienta)
        {
            $counta=$counta+$clienta->cotisation;
        }
        foreach($clientsb as $clientb)
        {
            $countb=$countb+$clientb->cotisation;
        }
        foreach($clientsc as $clientc)
        {
            $countc=$countc+$clientc->cotisation;
        }

        $ca=($counta+$countb+$countc)*12;
        $ta=0;
        $ia=0;
        foreach($clientsa as $clienta)
        {   $ia=$ia+1;
            if($clienta->status=="ok")
            {
                $ta=$ta+1;
            }
        }
        if($ia>0){

            $ta=$ta*100/$ia;
             
             }
             else{
                 $ta=0;
             }
        $tb=0;
        $ib=0;
        foreach($clientsb as $clientb)
        {   $ib=$ib+1;
            if($clientb->status=="ok")
            {
                $tb=$tb+1;
            }
        }
        if($ib>0){

            $tb=$tb*100/$ib;
             
             }
             else{
                 $tb=0;
         }
        $tc=0;
        $ic=0;
        foreach($clientsc as $clientc)
        {   $ic=$ic+1;
            if($clientc->status=="ok")
            {
                $tc=$tc+1;
            }
        }
        if($ic>0){

       $tc=$tc*100/$ic;
        
        }
        else{
            $tc=0;
        }
        
        $clients= DB::table('clients')->where('nom','like' ,'%'.$request->input('nom').'%')->get();
        //dd($clients);
        //dd($x);
        $assurances=\App\Assurance::all();
        $commentaires=\App\Commentaire::all();


        $mytime =Carbon::now();
            $x= \App\Client::all();
            $stack = array();
        
        foreach($x as $client)
        {
            
            if($client->date_status==$mytime->toDateString())
            {
                array_push($stack,['nom'=>$client->nom,'prenom'=>$client->prénom,'status'=>$client->status]);
            }
        }
    
        //dd(['clients'=>$x,'assurances'=>$assurances,'commentaires'=>$commentaires]);
        return view('dashboard',['clients'=>$clients,'assurances'=>$assurances,'commentaires'=>$commentaires,'CA'=>$ca,'prime'=>($ca-0.1327*$ca)*0.32,'ta'=>$ta,'tb'=>$tb,'tc'=>$tc,'notification'=>$stack,'nombre'=>$nombre]);
    }
    public function cherchertelephone(Request $request)
    {       

        $mytime1 = Carbon::now();
        //$mytime1->toDateTimeString();
        $appel=DB::table('appels')->where('date','=' ,$mytime1->toDateString())->get();
        //dd($mytime1->toDateString());
        if(sizeof($appel)>0)
        {
            
            $nombre=($appel->first()->nombre);
             
        
        }
        else
        {
            $appel=new \App\Appel();
            $appel->date=$mytime1->toDateString();
            $appel->nombre=0;
            $appel->save();
            $nombre=$appel->nombre;
            
        }
        $clientsa=DB::table('clients')->where('compagne','=' ,"a")->get();
        $clientsb=DB::table('clients')->where('compagne','=' ,"b")->get();
        $clientsc=DB::table('clients')->where('compagne','=' ,"c")->get();
        $counta=0;
        $countb=0;
        $countc=0;
        foreach($clientsa as $clienta)
        {
            $counta=$counta+$clienta->cotisation;
        }
        foreach($clientsb as $clientb)
        {
            $countb=$countb+$clientb->cotisation;
        }
        foreach($clientsc as $clientc)
        {
            $countc=$countc+$clientc->cotisation;
        }

        $ca=($counta+$countb+$countc)*12;
        $ta=0;
        $ia=0;
        foreach($clientsa as $clienta)
        {   $ia=$ia+1;
            if($clienta->status=="ok")
            {
                $ta=$ta+1;
            }
        }
        if($ia>0){

            $ta=$ta*100/$ia;
             
             }
             else{
                 $ta=0;
             }
        $tb=0;
        $ib=0;
        foreach($clientsb as $clientb)
        {   $ib=$ib+1;
            if($clientb->status=="ok")
            {
                $tb=$tb+1;
            }
        }
        if($ib>0){

            $tb=$tb*100/$ib;
             
             }
             else{
                 $tb=0;
         }
        $tc=0;
        $ic=0;
        foreach($clientsc as $clientc)
        {   $ic=$ic+1;
            if($clientc->status=="ok")
            {
                $tc=$tc+1;
            }
        }
        if($ic>0){

       $tc=$tc*100/$ic;
        
        }
        else{
            $tc=0;
        }
        
        $clients= DB::table('clients')->where('télephone','like' ,'%'.$request->input('télephone').'%')->get();
        //dd($clients);
        //dd($x);
        $assurances=\App\Assurance::all();
        $commentaires=\App\Commentaire::all();
        $mytime =Carbon::now();
            $x= \App\Client::all();
            $stack = array();
        
        foreach($x as $client)
        {
            
            if($client->date_status==$mytime->toDateString())
            {
                array_push($stack,['nom'=>$client->nom,'prenom'=>$client->prénom,'status'=>$client->status]);
            }
        }
        //dd(['clients'=>$x,'assurances'=>$assurances,'commentaires'=>$commentaires]);
        return view('dashboard',['clients'=>$clients,'assurances'=>$assurances,'commentaires'=>$commentaires,'CA'=>$ca,'prime'=>($ca-0.1327*$ca)*0.3,'ta'=>$ta,'tb'=>$tb,'tc'=>$tc,'notification'=>$stack,'nombre'=>$nombre]);
    }
















    public function update(Request $request)
    {   
        
        $mytime1 = Carbon::now();
        //dd($mytime1->toDateString());
        $appel=\App\Appel::where('date','=',$mytime1->toDateString())->get();
        //$appel=::
        //$appel->first()->nombre= $appel->first()->nombre+1;
        
        //$appel->save();
        $x=$appel->first()->nombre;
        $appel->first()->nombre=$x+1;
        $appel->first()->save();
        //dd($x);

        $nom=$request->input('id');
        $client=\App\Client::find($request->input('id'));
        $client->nom=$request->input('nom');
        $client->prénom=$request->input('prénom');
        $client->email=$request->input('email');
        $client->date_naissance=$request->input('date_naissance');
        $client->date_naissance=$request->input('date_naissance');
        $client->iban=$request->input('iban');
        $client->régime=$request->input('régime');
        $client->status=$request->input('status');
        $client->ss=$request->input('ss');
        $client->cotisation=$request->input('cotisation');
        $client->ville=$request->input('ville');
        $client->adresse=$request->input('adresse');
        $client->codepostal=$request->input('codepostal');
        $client->assurance_vendu=$request->input('assurance_vendu');
        $client->assurance_actuelle=$request->input('assurance_actuelle');
        $client->télephone=$request->input('telephone');
        $client->télephone1=$request->input('telephone1');
        
        $client->save();
        $request->session()->flash('status','votre client est modifié');
        return redirect('/dashboard');
        
        //return 1;
        //return ['clients'=>$clients];
        //return view('dashboard',['clients'=>$clients]);
    }
    public function addcommentaire(Request $request)
    {
        $id=$request->input('id');
        $com=$request->input('commentaire');

        $commentaire = new \App\Commentaire;
        $commentaire->commentaire=$com;
        $commentaire->client_id=$id;
        $commentaire->save();
        $request->session()->flash('status','Commentaire ajouté');
        return redirect('/dashboard');

        
        //dd($commentaire);
    }

    public function statistique(Request $request)
    {   $mytime1 = Carbon::now();
        //$mytime1->toDateTimeString();
        $appel=DB::table('appels')->where('date','=' ,$mytime1->toDateString())->get();
        //dd($mytime1->toDateString());
        if(sizeof($appel)>0)
        {
            
            $nombre=($appel->first()->nombre);
             
        
        }
        else
        {
            $appel=new \App\Appel();
            $appel->date=$mytime1->toDateString();
            $appel->nombre=0;
            $appel->save();
            $nombre=$appel->nombre;
            
        }
        $a=$request->input('a');
        $b=$request->input('b');
        $c=$request->input('c');
        $clientsa=DB::table('clients')->where('compagne','=' ,$request->input('a'))->get();
        $clientsb=DB::table('clients')->where('compagne','=' ,$request->input('b'))->get();
        $clientsc=DB::table('clients')->where('compagne','=' ,$request->input('c'))->get();
        $counta=0;
        $countb=0;
        $countc=0;
        foreach($clientsa as $clienta)
        {
            $counta=$counta+$clienta->cotisation;
        }
        foreach($clientsb as $clientb)
        {
            $countb=$countb+$clientb->cotisation;
        }
        foreach($clientsc as $clientc)
        {
            $countc=$countc+$clientc->cotisation;
        }
        $ta=0;
        $ia=0;
        foreach($clientsa as $clienta)
        {   $ia=$ia+1;
            if($clienta->status=="ok")
            {
                $ta=$ta+1;
            }
        }
        if($ia>0){

            $ta=$ta*100/$ia;
             
             }
             else{
                 $ta=0;
             }
        $tb=0;
        $ib=0;
        foreach($clientsb as $clientb)
        {   $ib=$ib+1;
            if($clientb->status=="ok")
            {
                $tb=$tb+1;
            }
        }
        if($ib>0){

            $tb=$tb*100/$ib;
             
             }
             else{
                 $tb=0;
         }
        $tc=0;
        $ic=0;
        foreach($clientsc as $clientc)
        {   $ic=$ic+1;
            if($clientc->status=="ok")
            {
                $tc=$tc+1;
            }
        }
        if($ic>0){

       $tc=$tc*100/$ic;
        
        }
        else{
            $tc=0;
        }

        $x= \App\Client::all();
        //dd($x);
        $assurances=\App\Assurance::all();
        $commentaires=\App\Commentaire::all();
        $ca=($counta+$countb+$countc)*12;
        $mytime =Carbon::now();
            $x= \App\Client::all();
            $stack = array();
        
        foreach($x as $client)
        {
            
            if($client->date_status==$mytime->toDateString())
            {
                array_push($stack,['nom'=>$client->nom,'prenom'=>$client->prénom,'status'=>$client->status]);
            }
        }


        return view('dashboard',['clients'=>$x,'assurances'=>$assurances,'commentaires'=>$commentaires,'CA'=>$ca,'prime'=>($ca-0.1327*$ca)*0.32,'ta'=>$ta,'tb'=>$tb,'tc'=>$tc,'notification'=>$stack,'nombre'=>$nombre]);


        
        //dd($commentaire);
    }
    

    public function add_associe(Request $request)
    {
        $client=new \App\Client();
        $client->civilité=$request->input('civilité_associe');
        $client->nom=$request->input('nom_associe');
        $client->prénom=$request->input('prenom_associe');
        $client->régime=$request->input('régime_associe');
        $client->ss=$request->input('ss_associe');

        $client->save();
        return redirect('/dashboard');
        
    }


    public function add_audio(Request $request){
          $file = $request->audio;
          $audio = file_get_contents($file->getRealPath());
          $newAudio= Audio::create(['client_id'=>$request->client_id,'audio'=>$audio]);;
      
          return response()->json(['data'=>$newAudio->id]);
    }

    public function play($id){
       $audio  = Db::select('select LENGTH("audio") as len,audio as audio from audio where id = '.$id);
       $size=$audio[0]->len;
       header("Content-Length: {{$size}}");
      header("Content-Type: audio/wav");
      echo $audio[0]->audio;
    }
}
