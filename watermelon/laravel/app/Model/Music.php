<?php

namespace App\Model;

use Jenssegers\Mongodb\Model as Eloquent;

class Music extends Eloquent
{
    protected $table = 'sj_music';

    public function getMusicList(){
        $res = $this->all()->toArray();
        return $res;
    }

    public function setNewMusic( array $input_info ){
        $this->user_id      = $input_info['user_id'];
        $this->singer       = $input_info['singer'];
        $this->album_name   = $input_info['album_name'];
        $this->title        = $input_info['title'];
        $this->ganre        = $input_info['ganre'];
        $this->file_name    = $input_info['file_name'];
        $this->jacket_name  = $input_info['jacket_name'];

        return $this->save();
    }
}
