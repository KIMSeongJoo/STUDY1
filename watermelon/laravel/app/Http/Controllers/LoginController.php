<?php

namespace App\Http\Controllers;

use Illuminate\Http\Input;
use Illuminate\Http\Request;
use App\Model\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    // private variable user db object
    private $_user_obj;

    // make singleton object
    private function getInstanceUser(){
        if( strlen( $this->_user_obj ) === 0 ){
            $this->_user_obj = new User;
        }
        return $this->_user_obj;
    }

    /**
     * construct
     *
     * login check & make session variable
     *
     */
    public function __construct(){
        $login_chk  = session('login_chk');
        $login_auth = session('login_auth');
        $login_info = array('login_chk'  => $login_chk,
                            'login_auth' => $login_auth );
        view()->share( 'login_info' , $login_info );
    }

    /**
     *
     *  show login index page
     *
     */
    public function index()
    {
        return view('login.index');
    }

    public function login( Request $request ){
        $req = $request->all();
        $req_login_info = array();

        if( strlen( $req['id'] ) > 0 && strlen( $req['pw'] ) > 0 ){
            $req_login_info['user_id'] = $req['id'];
            $req_login_info['user_pw'] = $req['pw'];
        }

        $usr = $this->getInstanceUser();

        $login_chk = $usr->getLoginUserInfo( $req_login_info );

        // data get clear
        if( count($login_chk) === 1 ){
            session(['login_chk'  => $login_chk[0]['user_id']  ]);
            session(['login_auth' => $login_chk[0]['user_auth']]);
        }
        return redirect('/');
    }

    /**
     *  logout
     *
     */
    public function logout()
    {
        // session clear
        session()->flush();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function new_mem(){
        return view('login.new_mem');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function Regist( Request $request ){
        $req = $request->all();
        $new_mem_info = array();

        $new_mem_info['user_name']      = strlen( $req['user_name'] )     > 0 ? $req['user_name']     : '';
        $new_mem_info['user_id']        = strlen( $req['user_id'] )       > 0 ? $req['user_id']       : '';
        $new_mem_info['user_mail_add']  = strlen( $req['user_mail_add'] ) > 0 ? $req['user_mail_add'] : '';
        $new_mem_info['user_pw']        = strlen( $req['user_pw'] )       > 0 ? $req['user_pw']       : '';
        $new_mem_info['user_auth']      = strlen( $req['user_auth'] )     > 0 ? $req['user_auth']     : '';
        $new_mem_info['user_memo']      = strlen( $req['user_memo'] )     > 0 ? $req['user_memo']     : '';

        $usr = $this->getInstanceUser();
        $res = $usr->setNewMember( $new_mem_info );

        if( $res === true ){
            return redirect('/');
        }else{
            echo "member regist fail";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function chk_inputval( Request $request ){
        $req = $request->all();

        $cmd        = $req['cmd'];
        $target_val = $req['value'];
        $usr = $this->getInstanceUser();

        $res = $usr->checkDuplicateUserInputValue( $cmd, $target_val );

//         if( count( $res ) === 0 ){
//             return "false";
//         }else{
//             json_encode( $res );
//             return $res;
//         }
        $res = [ "result" => $res ];
        json_encode( $res );
        return $res;

        exit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function mem_list()
    {
        $usr = $this->getInstanceUser();
        $mem_list = $usr->getMemList();
        return view('login.users')->with( 'mem_list', $mem_list );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function modify_mem( Request $request )
    {
        $req = $request->all();
        $usr = $this->getInstanceUser();

        $res = $usr->getUserDetail( $req['user_id'] );
        return view('login.modify')->with('user_info', $res[0]);
    }
}
