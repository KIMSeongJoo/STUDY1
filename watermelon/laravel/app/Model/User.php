<?php

namespace App\Model;

use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent
{
    // set useing collection
    protected $table = 'sj_users';

    private $_chk_value_target = [ "user_id", "user_nickname" ];

    /**
     *  login check
     *
     * @param unknown $user_info
     * @return boolean
     */
    public function getLoginUserInfo( $user_info ){
        if( count( $user_info ) === 0 ){
            return false;
        }
        return $this->where('user_id', $user_info['user_id'])->where('user_pw', $user_info['user_pw'])->get()->toArray();
    }

    // insert new user
    public function setNewMember( array $user_info ){
        if( count( $user_info ) === 0 ){
            return false;
        }

        $this->user_name  = $user_info['user_name'];
        $this->user_id    = $user_info['user_id'];
        $this->user_mail  = $user_info['user_mail_add'];
        $this->user_pw    = $user_info['user_pw'];
        $this->user_auth  = $user_info['user_auth'];
        $this->user_memo  = $user_info['user_memo'];

        return $this->save();
    }


    public function chkUserId( $user_id ){
        return $this->where('user_id', $user_id)->lists('user_id')->toArray();
    }

    public function getMemList(){
        return $this->get()->toArray();
    }

    public function getUserDetail( $user_id ){
        return $this->where('user_id', $user_id)->get()->toArray();
    }

    // users input value search, check
    public function checkDuplicateUserInputValue( $cmd, $value ){
        // users command check
        if( !in_array(  $cmd, $this->_chk_value_target ) ){
            return false;
        }

        return $this->where( $cmd, $value )->lists( $cmd )->toArray();
    }

}
