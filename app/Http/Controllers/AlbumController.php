<?php

namespace App\Http\Controllers;

use App\Models\albumsModel;
use App\Models\logsModel;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use LastFmApi\Api\AuthApi;
use LastFmApi\Api\AlbumApi;

class AlbumController extends Controller
{
    private $apiKey;
    private $albumApi;

    public function __construct()
    {
        $this->middleware('auth');
/*
        $this->apiKey = '6b34282b8690d1c982c5dfe6ff94d705';
        $auth = new AuthApi('setsession', array('apiKey' => $this->apiKey));
        $this->albumApi = new AlbumApi($auth);
*/
    }

    public function homepage(){
        $album = new albumsModel();
        return view('homepage', ['albums'=>$album->all()]);
    }
    public function create(){
        return view('create');
    }



    public function create_check(Request $request ){


        $response = Http::get("http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=6b34282b8690d1c982c5dfe6ff94d705&artist={$request->input('author')}&album={$request->input('Name')}&format=json");
        $image = $response['album']['image'][4]['#text'];

       // $lastfm = new LastFm(new Client(), '6b34282b8690d1c982c5dfe6ff94d705');
        //$name=$image->getClientOriginalName();
        //$path=$request->file('file')->storeAs('', $name, 'public');
        /*Записываем данные в основную таблицу*/
        $album = new albumsModel();
        $user=auth()->user()->name;
        $album-> name = $request->input('Name');
        $album-> author = $request->input('author');
        $album-> descr = $request->input('descr');
        $album-> user_name = $user;
        $album-> file=$image;
        $album->save();
        /*Записываем данные в логи*/
        $logs = new logsModel();
        $logs-> name = $request->input('Name');
        $logs-> author = $request->input('author');
        $logs-> descr = $request->input('descr');
        $logs-> user_name = $user;
        $logs-> file=$image;
        $logs->save();

        return redirect()->route('homepage')->with('success', 'Успешно добавлено');
    }
    public function change($id){
        $album = new albumsModel();
        return view('change', ['albums'=>$album->find($id)]);
    }

    public function change_id($id, Request $request ){


        $response = Http::get("http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=6b34282b8690d1c982c5dfe6ff94d705&artist={$request->input('author')}&album={$request->input('Name')}&format=json");
        $image = $response['album']['image'][4]['#text'];
        //$name=$request->file('file')->getClientOriginalName();
        //$path=$request->file('file')->storeAs('', $name, 'public');

        $album = albumsModel::find($id);
        /*Изменяем запись в главной таблице*/
        $user=auth()->user()->name;
        $album-> name = $request->input('Name');
        $album-> author = $request->input('author');
        $album-> descr = $request->input('descr');
        $album-> user_name = $user;
        $album-> file=$image;
        $album->save();
        /*Заносим новую запись в логи*/
        $logs = new logsModel();
        $logs-> name = $request->input('Name');
        $logs-> author = $request->input('author');
        $logs-> descr = $request->input('descr');
        $logs-> user_name = $user;
        $logs-> file=$image;
        $logs->save();

        return redirect()->route('homepage')->with('success', 'Успешно изменено');
    }
    public function delete($id){
        albumsModel::find($id)->delete();
        return redirect()->route('homepage')->with('success', 'Успешно удалено');
    }
}
