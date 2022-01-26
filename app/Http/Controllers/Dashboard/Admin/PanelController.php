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

class PanelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(panel::class, 'panel');
    }

    public function GetCreatePost()
    {
        return view('dashboard.admin.panel.create',[
            'users' =>User::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function CreatePost(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'] ,
            'site' => ['required', 'string', 'max:255'] ,
            'email' => ['required', 'string', 'max:255'] ,
            'phone' => ['required', 'string', 'max:255'] ,
        ]);

        $post = new panel([
            'name' => $request->input('name'),
            'site' => $request->input('site'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'percent' => $request->input('percent'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user'),
        ]);

        $post->save();

        return redirect()->route('dashboard.admin.panel.manage')->with('info', 'New Panel created and the name is ' . $request->input('name'));
    }
    
    public function GetManagePost(Request $request)
    {
        $posts = panel::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.panel.manage', [
       'posts' => $posts,  
       'users' =>User::orderBy('created_at', 'desc')->get(),
    ]);
    }

    public function DeletePost($id){
        $post = panel::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.panel.manage')->with('info', 'Panel deleted');
    }

    public function GetEditPost($id)
    { 
        $post = panel::find($id);
        return view('dashboard.admin.panel.updatepanel', [
        'post' => $post, 
        'users' =>User::orderBy('created_at', 'desc')->get(),

         ]);
    }

    public function UpdatePost(Request $request)
    {
        $post = panel::find($request->input('id'));
        if (!is_null($post)) {
            
            $post->name = $request->input('name');
            $post->site = $request->input('site');
            $post->email = $request->input('email');
            $post->phone = $request->input('phone');
            $post->percent = $request->input('percent');
            $post->status = $request->input('status');
            $post->user_id = $request->input('user_id');
           
            $post->save();
        }
        return redirect()->route('dashboard.admin.panel.manage',$post->id)->with('info', 'Panel edited');
    }
}