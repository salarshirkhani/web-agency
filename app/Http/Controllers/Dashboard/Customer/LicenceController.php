<?php
namespace App\Http\Controllers\Dashboard\Customer;
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
        return view('dashboard.customer.license.create',[
            'panels' =>panel::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function CreatePost(Request $request)
    {
        $panel=panel::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->FIRST();

        $this->validate($request, [
            'site' => ['required', 'string', 'max:255'] ,
            'panel_id' => ['required','exists:panels,id'],
        ]);

        $post = new license([
            'name' => $request->input('name'),
            'site' => $request->input('site'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'end_date' => $request->input('end_date'),
            'panel_id' =>  $panel->id,
            'paid' => 'no',
            'token' => Str::random(32),
        ]);

        $post->save();

        return redirect()->route('dashboard.customer.license.manage')->with('info', 'New License created and the name is ' . $request->input('title'));
    }
    
    public function GetManagePost(Request $request)
    {
        $panel=panel::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->FIRST();
        $posts = license::where('panel',$panel->id)->orderBy('created_at', 'desc')->get();
        return view('dashboard.customer.license.manage', [
        'posts' => $posts,  
        'panel' =>$panel,
        ]);
    }


}