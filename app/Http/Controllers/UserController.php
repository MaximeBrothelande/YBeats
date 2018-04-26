<?php

namespace App\Http\Controllers;

use App\Music;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use falahati\PHPMP3;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $music=DB::table('musics')
            ->join('users','musics.author','=','users.id')
            ->where('musics.author','=',$user->id)
            ->get();

        return view('User.create',compact('user','music'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = Auth::user()->id;
        $rules = array(
            'title'=>'required',
            //'link'=>'required',
            'price'=>'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);
        $title = Input::get('title');
        $preview = PHPMP3\MpegAudio::fromFile(Input::get('link'))->trim(0,30)->saveFile('prev'.$title.'.mp3');


        if ($validator->fails()) {
            return Redirect::to('user')
                ->withErrors($validator);
        } else {
            // store
            $music = new Music;
            $music->author = $author;
            $music->dispo = '1';
            $music->title = Input::get('title');
            $music->descrip = Input::get('descrip');
            $music->price = Input::get('price');
            $music->link = '../'.Input::get('link');
            $music->preview='../prev'.$title.'.mp3';
            $music->save();
            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('user/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $music=DB::table('musics')
        ->join('users','musics.author','=','users.id')
        ->where('musics.author','=',$id)
        ->get();

        return view('User.show',compact('user','music'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music=Music::all();
        $user = User::find($id);

        return view('User.edit',compact('user','music'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->name       = Input::get('name');
            $user->email      = Input::get('email');
            $user->biograph   = Input::get('biograph');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated!');
            return Redirect::to('music');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
