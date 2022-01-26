<?php
namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\Models\User;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Dashboard\Admin\ProductStoreRequest;
use App\Http\Requests\Dashboard\Admin\ProductUpdateRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(product::class, 'product');
    }

    public function GetCreatePost()
    {
        return view('dashboard.admin.product.create',[
        ]);
    }

    public function CreatePost(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'] ,
        ]);

        $post = new product([
            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        $post->save();

        return redirect()->route('dashboard.admin.product.manage')->with('info', 'New Product created and the name is ' . $request->input('title'));
    }
    
    public function GetManagePost(Request $request)
    {
        $posts = product::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.product.manage', [
       'posts' => $posts,  
        ]);
    }

    public function DeletePost($id){
        $post = product::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.product.manage')->with('info', 'Product deleted');
    }

    public function GetEditPost($id)
    { 
        $post = product::find($id);
        return view('dashboard.admin.product.updatepost', [
        'post' => $post, 
         ]);
    }

    public function UpdatePost(Request $request)
    {
        $post = product::find($request->input('id'));
        if (!is_null($post)) {
            
            $post->name = $request->input('title');
            $post->description = $request->input('description');
            $post->price = $request->input('price');
            
            $post->save();
        }
        return redirect()->route('dashboard.admin.product.manage',$post->id)->with('info', 'Product edited');
    }
}