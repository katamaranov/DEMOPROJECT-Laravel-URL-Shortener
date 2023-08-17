<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLinkRequest;
use App\Models\User;
use App\Models\Link;
use Redirect;
use Auth;

class crudController extends Controller
{
    public function index() {
        return view('mainPage.index');
    }

    public function slugCreate(StoreLinkRequest $req) {
        $g = new Link();
        $validatedData = $req->validated();

        if($req->dop != ''){
            $g->slug = $validatedData["dop"];
            $g->link = $validatedData["lnk"];
            $g->creator = $req->ipaddr;
            $g->save();
            return Redirect::back()->with(['slug' => $validatedData["dop"]])->withInput();
        }else{
            $tmp = getRandomString(5); //или ларавеловский Str::random(5)/str_random(5);
            $g->slug = $tmp;
            $g->link = $validatedData["lnk"];
            $g->creator = $req->ipaddr;
            $g->save();
            return Redirect::back()->with(['slug'=>$tmp])->withInput();
        }
    }

    public function adminer() {
        if (Auth::check()) {
            if((Auth::user()->name) == 'admin'){
                $content = require resource_path('views/adminer/adminer-4.8.1-en.php');
                return $content;
            }else{
                return Redirect::back();
            }
        }else{
            return Redirect::back();
        }
    }

}