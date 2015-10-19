<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Music;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class FileController extends Controller
{

    private $_music;

    public function __construct(){
        $login_chk  = session('login_chk');
        $login_auth = session('login_auth');
        $login_info = array('login_chk'  => $login_chk,
                            'login_auth' => $login_auth );
        view()->share( 'login_info' , $login_info );
    }

    private function getInstanceMusic(){
        if( strlen( $this->_music ) === 0 ){
            $this->_music = new Music;
        }
        return $this->_music;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $file_dbh  = $this->getInstanceMusic();
        $file_list = $file_dbh->getMusicList();
        return view('file.index')->with( 'music_list', $file_list );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input_data = array();
        $req = $request->all();
        if( count( $req ) === 0 ){
            return view('file.music');
        }

        $music_dbh = $this->getInstanceMusic();

        if( $request->file( 'album_jacket' ) ){
            $img_type = $request->file('album_jacket')->guessExtension();
            $new_img_name   = session('login_chk') . "_" . $req['title'] . "_." . $img_type;
            $request->file( 'album_jacket' )->move( base_path() . "/public/photos", $new_img_name );
        }

        if( $request->file('music_file') ){
            $tmp_name = $request->file( 'music_file' )->getClientOriginalName();
            $tmp_name = explode('.', $tmp_name );
            foreach( $tmp_name as $val ){
                preg_match( "/^mp3$|^wma/", $val, $match );
                if( count( $match ) != 0 ){
                    $music_type = $match[0];
                    break;
                }
            }
            $new_music_name = session('login_chk') . "_" . $req['title'] . "_." . $music_type;
            $request->file( 'music_file' )->move( base_path() . "/public/music", $new_music_name );
        }

        $input_data['user_id']      = session('login_chk');
        $input_data['singer']       = $req['singer'];
        $input_data['album_name']   = $req['album_name'];
        $input_data['title']        = $req['title'];
        $input_data['ganre']        = $req['ganre'];
        $input_data['file_name']    = isset( $new_music_name ) ? $new_music_name : "";
        $input_data['jacket_name']  = isset(  $new_img_name)   ? $new_img_name   : "";

        $res = $music_dbh->setNewMusic( $input_data );

        return view('file.upload')->with('result', $res);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
