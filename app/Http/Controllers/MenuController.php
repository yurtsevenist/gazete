<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Writer;
use App\Models\Category;
use App\Models\Favorite;
use App\Http\Requests\YazarRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
class MenuController extends Controller
{
    public function index()
    {
    //      $news=Menu::get();
    //      foreach($news as $new)
    //      {
    //          $new->pop=0;
    //          $new->save();
    //      }
    //  $news=Writer::get();
    //     foreach($news as $new)
    //      {
    //      $new->pop=0;
    //         $new->save();
    //      }

        if(Auth::user())
        {
            $favsg=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();
            $favsw=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();
        }
        else
        {
            $favsg=null;
            $favsw=null;
        }
        // $news=Menu::orderBy('pop','DESC')->get();
        $writers=Writer::orderBy('pop','DESC')->get();
        $news=Menu::orderBy('pop','DESC')->get();
        $gazete=null;
        // dd($news);
        return view('main',compact('gazete','writers','favsg','favsw','news'));
    }
    public function hesap()
    {
        $writers=Writer::orderBy('pop','DESC')->get();
        $news=Menu::orderBy('pop','DESC')->get();
        if(Auth::user())
        {
            $favsg=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();
            $favsw=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();
        }
        else
        {
            $favsg=null;
            $favsw=null;
        }
        $gazete=null;
        $user=User::whereId(Auth::user()->id)->first();

        return view('hesap',compact('user','gazete','writers','favsg','favsw','news'));
    }
    public function getir($id)
    {
        $news=Menu::orderBy('pop','DESC')->get();
        $writers=Writer::whereNews_id($id)->orderBy('pop','DESC')->get();
        if($writers->count()==0)
        {
            $writers=Writer::orderBy('pop','DESC')->get();
        }
        foreach($news as $new)
        {
            $new->durum=0;
            $new->save();
        }
        $gazete=Menu::where('id',$id)->first();
        $gazete->durum=1;
        $gazete->pop+=1;
        $gazete->save();
        return view('main',compact('gazete','writers'));
    }
    public function catgetir($id)
    {
        $news=Menu::whereCat_id($id)->orderBy('pop','DESC')->get();



            $writers=Writer::orderBy('pop','DESC')->get();


            if(Auth::user())
            {
                $favsg=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();
                $favsw=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();
            }
            else
            {
                $favsg=null;
                $favsw=null;
            }

        $gazete=null;
        return view('main',compact('gazete','writers','favsg','favsw','news'));
    }
    public function favgetir()
    {
        $news=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();

        $writers=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();

            if(Auth::user())
            {
                $favsg=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();
                $favsw=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();
            }
            else
            {
                $favsg=null;
                $favsw=null;
            }

        $gazete=null;

        return view('main',compact('gazete','writers','favsg','favsw','news'));
    }
    public function yazargetir($id)
    {

        $news=Menu::orderBy('name','ASC')->get();
        $writers=Writer::orderBy('name','ASC')->get();
        $gazete=Writer::where('id',$id)->first();
        $gazete->pop++;
        $gazete->save();
        return view('main',compact('news','gazete','writers'));
    }
    public function yazarGet(Request $request)
    {

        $id = $request->id;
        $yazar = Writer::whereId($id)->first();
        $yazar->pop++;
        $yazar->save();
        if($ara=Menu::whereId($yazar->news_id)->first())
        {
            $ara->pop++;
            $ara->save();
        }
        if(Auth::user())
        {
            if($fav=Favorite::whereUser_idAndTurAndFav_id(Auth::user()->id,0,$request->id)->whereDurum(1)->first() )
            {
                $fav->pop++;
                $fav->save();
            }
        }
        return response()->json($yazar);
    }
    public function gazeteGet(Request $request)
    {

        $id = $request->id;
        $gazete = Menu::whereId($id)->first();
        if(Auth::user())
        {
            if($fav=Favorite::whereUser_idAndTurAndFav_id(Auth::user()->id,1,$request->id)->whereDurum(1)->first() )
            {
                $fav->pop++;
                $fav->save();
            }
        }

         $gazete->pop++;


        $gazete->save();
        return response()->json($gazete);
    }
    public function yazarekle()
    {

        if(Auth::user())
        {
            $favsg=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();
            $favsw=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();
        }
        else
        {
            $favsg=null;
            $favsw=null;
        }

        $news=Menu::orderBy('pop','DESC')->get();
        $writers=Writer::with('getCat')->orderBy('name','ASC')->get();
        $cats=Category::orderBy('name')->get();
        $gazete=null;
        return view('yazarekle',compact('gazete','writers','news','favsg','favsw','cats'));
    }
    public function gazeteekle()
    {
        $cats=Category::orderBy('name')->get();
        $writers=Writer::with('getCat')->orderBy('name','ASC')->get();
        $news=Menu::orderBy('pop','DESC')->get();
        $gazete=null;
        if(Auth::user())
        {
            $favsg=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();
            $favsw=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();
        }
        else
        {
            $favsg=null;
            $favsw=null;
        }

        return view('gazeteekle',compact('gazete','writers','news','favsg','favsw','cats'));
    }
    public function catekle()
    {
        if(Auth::user())
        {
            $favsg=Favorite::whereUser_idAndTur(Auth::user()->id,1)->whereDurum(1)->with('getNews')->get();
            $favsw=Favorite::whereUser_idAndTur(Auth::user()->id,0)->whereDurum(1)->with('getWriters')->get();
        }
        else
        {
            $favsg=null;
            $favsw=null;
        }
        $cats=Category::orderBy('name','ASC')->get();
        $writers=Writer::orderBy('name','ASC')->get();
        $gazete=null;
        $news=Menu::orderBy('pop','DESC')->get();
        return view('catekle',compact('gazete','writers','news','favsg','favsw','cats'));
    }
    public function dosyaUpload(YazarRequest $request)
    {
        try {
              $slug=Str::slug($request->name);
              $ara=Menu::whereId($request->news)->first();
              $cat=Category::whereId($request->tur)->first();
        if($request->yid==null)
        {

            $kayit = Writer::whereSlug($slug)->first();

          if ($request->hasFile('img')) {
             $mimetype = $request->img->extension();
              $newName = $slug . '.' . $mimetype;

              if($kayit and $kayit->img!=null)
              {
                   unlink($kayit->img);

              }
              $request->img->move('yazar', $newName);
          }
          if (!$kayit) {
              $kayit = new Writer;
          }
              $kayit->name =Str::title($request->name);
              $kayit->slug = $slug;
              $kayit->img = 'yazar/' . $newName;
              $kayit->url = $request->url;
              $kayit->news = $ara->name;
              $kayit->news_id = $ara->id;
              $kayit->tur = $cat->name;
              $kayit->cat_id=$cat->id;
              $kayit->save();
        }
        else
        {
            $kayit = Writer::whereId($request->yid)->first();
            if ($request->hasFile('img')) {
                $mimetype = $request->img->extension();
                 $newName = $slug . '.' . $mimetype;

                 if($kayit and $kayit->img!=null)
                 {
                      unlink($kayit->img);

                 }
                 $request->img->move('yazar', $newName);
             }
             $kayit->name =Str::title($request->name);
             $kayit->slug = $slug;
             $kayit->img = 'yazar/' . $newName;
             $kayit->url = $request->url;
             $kayit->news = $ara->name;
             $kayit->news_id = $ara->id;
             $kayit->tur = $cat->name;
             $kayit->cat_id=$cat->id;
             $kayit->save();
        }

                return redirect()->back()->withSuccess('Yazar kaydı eklendi');
            } catch (\Exception $e) {
                return redirect()->back()->withError('Beklenmedik hata');
            }

    }
    public function gazeteUpload(YazarRequest $request)
    {

        try {

            $slug=Str::slug($request->name);
            $cat=Category::whereId($request->tur)->first();
            if($request->gid==null)
            {

                $kayit = Menu::whereSlug($slug)->first();

                if ($request->hasFile('img')) {
                    $mimetype = $request->img->extension();
                    $newName = $slug . '.' . $mimetype;
                    if($kayit and $kayit->logo!=null)
                    {
                         unlink($kayit->logo);
                    }
                    $request->img->move('newslogo', $newName);
                }
                if (!$kayit) {
                    $kayit = new Menu;
                }
                $kayit->name = Str::title($request->name);
                $kayit->slug = $slug;
                if($request->hasFile('img'))
                $kayit->logo = 'newslogo/' . $newName;
                $kayit->url = $request->url;
                $kayit->tur = $cat->name;
                $kayit->cat_id=$cat->id;
                $kayit->save();
                $cat->count++;
                $cat->save();
            }
           else
           {
            $kayit = Menu::whereId($request->gid)->first();
            if ($request->hasFile('img')) {
                $mimetype = $request->img->extension();
                $newName = $slug . '.' . $mimetype;
                if($kayit and $kayit->logo!=null)
                {
                     unlink($kayit->logo);
                }
                $request->img->move('newslogo', $newName);
            }
            $kayit->name = Str::title($request->name);
            $kayit->slug = $slug;
            if($request->hasFile('img'))
            $kayit->logo = 'newslogo/' . $newName;
            $kayit->url = $request->url;
            $kayit->tur = $cat->name;
            $kayit->cat_id=$cat->id;
            $kayit->save();
            $cat->count++;
            $cat->save();

           }
            return redirect()->back()->withSuccess('Gazete kaydı eklendi');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Beklenmedik hata');
        }
    }
    public function catUpload(Request $request)
    {

        try {
                $slug=Str::slug($request->name);
                if($request->cid==null)
                {

                    $kayit = Category::whereSlug($slug)->first();
                    if (!$kayit) {
                        $kayit = new Category;
                    }
                    $kayit->name = Str::title($request->name);
                    $kayit->slug = $slug;
                    $kayit->save();
                }
                else
                {
                    $kayit = Category::whereId($request->cid)->first();
                    $ara = Category::whereSlug($slug)->first();
                    if ($ara) {
                        return redirect()->back()->withInfo('Bu Kategori listenizde mevcut');
                    }
                    $kayit->name = Str::title($request->name);
                    $kayit->slug = $slug;
                    $kayit->save();
                }
            return redirect()->back()->withSuccess('Kategori Eklendi');

        } catch (\Exception $e) {
            return redirect()->back()->withError('Beklenmedik hata');
        }

    }
    public function catDelete(Request $request)
    {
        try {
            $dekont = Category::whereId($request->id)->first();
            $news=Menu::whereCat_id($dekont->id)->get();
            foreach($news as $new)
            {
                $new->cat_id=0;
                $new->save();
            }
            $news=Writer::whereCat_id($dekont->id)->get();
            foreach($news as $new)
            {
                $new->cat_id=0;
                $new->save();
            }
            $dekont->delete();
            return redirect()->back()->withInfo('Kategori silindi');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Beklenmedik bir hata meydana geldi');
        }

    }
    public function catGet(Request $request)
    {

        $id = $request->id;
        $yazar = Category::whereId($id)->first();
        return response()->json($yazar);
    }
    public function yazarDelete(Request $request)
    {
        try {
            $dekont = Writer::whereId($request->id)->first();
            $cat=Category::whereCat_id($dekont->cat_id)->first();
            $dekont->delete();
            return redirect()->back()->withInfo('Yazar silindi');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Beklenmedik bir hata meydana geldi');
        }

    }
    public function gazeteDelete(Request $request)
    {
        try {
            $dekont = Menu::whereId($request->id)->first();
            $cat=Category::whereCat_id($dekont->cat_id)->first();
            if($cat->count>0)
            $cat->count--;
            $cat->save();
            $dekont->delete();
            return redirect()->back()->withInfo('Gazete silindi');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Beklenmedik bir hata meydana geldi');
        }

    }

    public function favorite(Request $request)
    {
        //tur 1 ise gazete 0 ise yazar



        if( $fav=Favorite::whereUser_idAndFav_idAndTur(Auth::user()->id,$request->id,$request->cat)->whereDurum(1)->first())
        {
            $fav->delete();

        }
        else
        {
            $fav=new Favorite;
            $fav->tur=$request->cat;
            $fav->fav_id=$request->id;
            $fav->user_id=Auth::user()->id;
            $fav->durum=1;
            $fav->save();
        }

    }

}
