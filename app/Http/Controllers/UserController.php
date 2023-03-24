<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterPostRequest;
use App\Http\Requests\ProfilUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
   
    public function loginPost(Request $request)
    {
        $remember = $request->remember ? true:false;
        
        if($remember == true){
            setcookie('loginemail',$request->email,time()+60*60*24*365);
            setcookie('loginpassword',$request->password,time()+60*60*24*365);                      
        }        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toastr()->success('Hoşgeldiniz ' . Auth::user()->name,'MSG');           
            $user=User::whereId(Auth::user()->id)->first();
            $user->updated_at=Carbon::now();
            $ip = $request->getClientIp();
            // $data = Location::get('176.54.225.189');
            $user->ip=$ip;
            $user->save();            
            if(Auth::user()->kim==1)
                    return redirect()->route('dashboard');       
                    else if(Auth::user()->kim==0)
                    return redirect()->route('main'); 
                    else
                    return redirect()->back()->withFail('Bu hesap dondurulmuş bizimle ile iletişime geçin');        
          
        }
        $request->flash();
        return redirect()->route('login')->withError('E-Posta Adresiniz veya Şifreniz Hatalı!!');
    }
    public function registerPost(RegisterPostRequest $request)
    {
      
       
            $user = User::create([
                'name' => $request['name'],               
                'email' => $request['email'],
                'password' => Hash::make($request['password']),             
            ]);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user=User::whereId(Auth::user()->id)->first();
                $user->updated_at=Carbon::now();
                $ip = $request->getClientIp();
                // $data = Location::get('176.54.225.189');
                $user->ip=$ip;
                $user->save();
                toastr()->success('Hoşgeldiniz ' . Auth::user()->name,'MSG');
                if(Auth::user()->kim==1)
                    return redirect()->route('dashboard');       
                    else
                    return redirect()->route('main'); 
                
            }
        
        return redirect()->route('login')->withError('Bilgilerinizi Kontrol edip tekrar deneyin!!');
    }

    public function postEmail(Request $request)
    {

      $request->validate([
          'email' => 'required|email|exists:users',
      ]);

      $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        try {

       $mail= Mail::send('auth.verify', ['token' => $token], function($message) use($request){
            $message->from('bilgi@tumgazeteler.com', 'Tüm Gazeteler');
            $message->to($request->email);
            $message->subject('Şifre Değiştirme Doğrulama');
        });

    
            return redirect()->back()->withSuccess('E-Posta Adresinize Link Gönderildi!');
      
        } catch (\Exception $ex) {

            return back()->withFail('Beklenmedik bir hata!');
        }

    }
    public function getPassword($token) {

        return view('auth.reset', ['token' => $token]);
     }
     public function updatePassword(Request $request)
     {

     $request->validate([
         'email' => 'required|email|exists:users',
         'password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required',

     ]);

     $updatePassword = DB::table('password_resets')
                         ->where(['email' => $request->email, 'token' => $request->token])
                         ->first();

     if(!$updatePassword)
         return back()->withFail('Geçersiz Anahtar!');
       $user = User::where('email', $request->email)
                   ->update(['password' => Hash::make($request->password)]);

       DB::table('password_resets')->where(['email'=> $request->email])->delete();


                if( Auth::attempt(['email' => $request->email, 'password' =>$request->password]))
                {
                    // toastr()->info('Şifreniz Güncellendi, Hoşgeldiniz '.Auth::user()->name,'Bilgilendirme');                   
                    if(Auth::user()->kim==1)
                    return redirect()->route('dashboard')->withSuccess('Şifreniz Güncellendi, Hoşgeldiniz '.Auth::user()->name,'Bilgilendirme');       
                    else
                    return redirect()->route('main')->withSuccess('Şifreniz Güncellendi, Hoşgeldiniz '.Auth::user()->name,'Bilgilendirme');       ;         

                }


     }
   
     public function profilguncelle(ProfilUpdateRequest $request)
     {
         try{
       
             
             $kayit=User::whereId(Auth::user()->id)->first();
             if($kayit->email!=$request->email)
             {
                 $ara=User::whereEmail($request->email)->first();
                 if($ara)
                 return back()->withFail('Bu E-Posta Adresi Veritabanında kayıtlı','HATA');
             }
             $kayit->name=Str::title($request->name);
             $kayit->email=Str::lower($request->email);
             $kayit->password=Hash::make($request->password);
             $kayit->save();
             return redirect()->back()->withSuccess('Şifreniz Güncellendi');
         
     } catch (\Exception $e) {
        return redirect()->back()->withError('Beklenmedik hata');
        
     }
     
    
 
     }
    //  public function profilguncelle2(Request $request)
    //  {
        
    //      try{
    //      $request->validate([
    //          'tel' => ['required', 'string', 'max:255'],
    //          'adres' => ['required', 'string', 'max:255'],
    //          'tur' => ['required', 'string', 'max:255'],
    //          'brans' => ['required', 'string', 'max:255'],
    //      ]);
    //         $kayit=Ogretmen::whereTckimlik(Auth::user()->tckimlik)->first();
    //         $kayit->tur=Str::title($request->tur);
    //         $kayit->brans=Str::title($request->brans); 
    //         $kayit->tel=$request->tel;
    //          $kayit->adres=Str::title($request->adres);                     
    //          $kayit->save();
    //      toastr()->success( 'Bilgileriniz Güncellendi','Başarılı');
       
    //  } catch (\Exception $e) {
    //      toastr()->error( 'Beklenmedik bir hata meydana geldi yazılımcınız ile görüşün','Hata');
         
    //  }
    //  return redirect()->back();
    //  }
    public function dashboard()
    {
      
        return view('dashboard');
    }
  
    public function login()
    {
        return view('auth.login');
    }
    public function yapimasamasinda()
    {
        return view('yapim');
    }
    public function logout()
    {
        setcookie('loginemail','');
        setcookie('loginpassword','');
        unset($_COOKIE['loginemail']);
        unset($_COOKIE['loginpassword']);
        // dd($_COOKIE);
        Auth::logout();
        return redirect()->route('main')->withSuccess('Oturum Kapatıldı');
    }
}

