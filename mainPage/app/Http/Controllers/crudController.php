<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLinkRequest;
use App\Models\User;
use App\Models\Link;
use Redirect;
use Auth;
use Gate;

class crudController extends Controller
{
    public function index() {
        return view('mainPage.index');
    }

    public function slugCreate(StoreLinkRequest $req) {
        
        $validatedData = $req->validated();

        if($req->dop != ''){
            $g = new Link();
            $g->slug = $validatedData["dop"];
            $g->link = $validatedData["lnk"];
            $g->creator = $req->ipaddr;
            $g->save();
            return Redirect::back()->with(['slug' => $validatedData["dop"]])->withInput();
        }else{

            $chunks = config('constants.chunks');

            for ($i=0; $i < count($chunks); $i++) {

                $get_token = true;
                $errorcount = 0;
                
                while ($get_token === true) {
                $errorcount++;
                $tmp = getRandomString(5); //или ларавеловский Str::random(5)/str_random(5);
                $s = $i . $tmp;
                $entity = "App\Models\\" . $chunks[$i] . 'link';
                $g = new $entity();
                $get_token = $g::where('slug', $s)->exists();
                if($get_token === false){
                    break 2;
                }
                if($errorcount == 10){
                    break;
                }
                }

            }

            if($get_token === true){
                abort(500); //если заполнены все коллекции
            }

            $g->slug = $s;
            $g->link = $validatedData["lnk"];
            $g->creator = $req->ipaddr;
            $g->save();
            return Redirect::back()->with(['slug'=>$s])->withInput();

        }
    }

    public function adminer() {
        if (Auth::check()) {

            if (! Gate::allows('isAdm')) {
                return Redirect::back();
            }else{
                $content = require resource_path('views/adminer/adminer-4.8.1-en.php');
                return $content;
            }

        }else{
            return Redirect::back();
        }
    }

}