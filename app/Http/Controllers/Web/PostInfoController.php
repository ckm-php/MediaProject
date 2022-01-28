<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\PostInfo;
use Illuminate\Support\Str;


class PostInfoController extends Controller
{

    public function postView()
    {
        //dd('ok');
        $posts = PostInfo::latest()->paginate(5);
        //dd($posts);
        return view('auth.client.postindex',compact('posts'))
        ->with('i',(request()->input('page',1)-1)*5);
    }


    public function postCreate()
    {
        return view('auth.client.create');
    }

    public function postAdd(Request $request)
    {
        //dd($request->description);
      // $userid =Auth::user()->id;
        //dd($userid);
        //$input = $request->all();
//dd($input);
//loading the html data from the summernote editor and select the img tags from it
$dom = new \DomDocument();
$dom->loadHtml($request, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
$images = $dom->getElementsByTagName('img');
dd($images);

foreach($images as $k => $img){
    //for now src attribute contains image encrypted data in a nonsence string
    $data = $img->getAttribute('src');
    dd($data);
    //getting the original file name that is in data-filename attribute of img
    $file_name = $img->getAttribute('data-filename');
}

dd('not ok');
        PostInfo::create([
            'user_id' => Auth::user()->id,
            'post_id' => Str::uuid(),
            'post_manage_id' => Str::uuid(),
            'post_title' =>$request->post_title,
            'post_description'=>$request->description,
            'post_imge' => Auth::user()->image,            
            'post_date' => now(),
            'remark' => 'testing'
        ]);

        //dd('ok');
        return redirect()->route('client.list')
        ->with('success','Post created successfully.');

    }

    public function postRealdata(PostInfo $postinfo)
    {
        dd('view');
    }
}