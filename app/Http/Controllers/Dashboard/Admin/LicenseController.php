<?php
namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\license;
use App\Models\panel;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Dashboard\Admin\ProductStoreRequest;
use App\Http\Requests\Dashboard\Admin\ProductUpdateRequest;
use DirapeToken;
use Illuminate\Support\Str;
class LicenseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(license::class, 'license');
    }

    public function GetCreatePost()
    {
        return view('dashboard.admin.license.create',[
            'panels' =>panel::orderBy('created_at', 'desc')->get(),
            'products' =>product::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function CreatePost(Request $request)
    {
        $this->validate($request, [
            'site' => ['required', 'string', 'max:255'] ,
            'panel_id' => ['required','exists:panels,id'],
            'product' => ['required','exists:products,id'],
        ]);

        $post = new license([
            'name' => $request->input('name'),
            'site' => $request->input('site'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'end_date' => $request->input('end_date'),
            'panel_id' => $request->input('panel'),
            'product_id' => $request->input('product'),
            'paid' => 'no',
            'token' => Str::random(32),
        ]);

        $post->save();

        return redirect()->route('dashboard.admin.license.manage')->with('info', 'New License created and the name is ' . $request->input('title'));
    }
    
    public function GetManagePost(Request $request)
    {
        $posts = license::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.license.manage', [
       'posts' => $posts,  
       'panels' =>panel::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function DeletePost($id){
        $post = license::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.license.manage')->with('info', 'License deleted');
    }

    public function GetEditPost($id)
    { 
        $post = license::find($id);
        return view('dashboard.admin.license.updatelicense', [
        'post' => $post, 
        'panels' =>panel::orderBy('created_at', 'desc')->get(),

         ]);
    }

    public function UpdatePost(Request $request)
    {
        $post = license::find($request->input('id'));
        if (!is_null($post)) {
            
            $post->name = $request->input('name');
            $post->site = $request->input('site');
            $post->price = $request->input('price');
            $post->end_date = $request->input('end_date');
            $post->paid = $request->input('paid');
            $post->status = $request->input('status');
            $post->paid = $request->input('paid');
            $post->panel_id = $request->input('panel');
            $post->save();
        }
        return redirect()->route('dashboard.admin.license.manage',$post->id)->with('info', 'License edited');
    }
}