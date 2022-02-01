<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Models\license;
use App\Models\panel;
use DirapeToken;
use Illuminate\Support\Str;

class LicenseController extends Controller
{

    public function index()
    {
        $posts = license::orderBy('created_at', 'desc')->get();
        return  $posts;
    }


    public function Create(Request $request)
    {
        $this->validate($request, [
            'site' => ['required', 'string', 'max:255'] ,
            'panel_id' => ['required','exists:panels,id'],
        ]);
        $token=Str::random(32);
        $post = new license([
            'name' => $request->input('name'),
            'site' => $request->input('site'),
            'price' => $request->input('price'),
            'status' => 'active',
            'end_date' => $request->input('end_date'),
            'panel_id' => $request->input('panel_id'),
            'paid' => 'no',
            'token' => $token,
        ]);

        $saved = $post->save();

        if(!$saved){

            return response(['info' => 'invalid']);
        }
        else{
            return response(['info' => 'success','token'=>$token]);
        }

        return response(['info' => 'error in validating']);
    }


    public function show($id)
    {
        return license::find($id);
    }


    public function update(Request $request, $id)
    {
        $license=license::find($id);
        $license->update($request->all);
        return $license;
    }


    public function destroy($id)
    {
        return license::destroy($id);
    }
}
