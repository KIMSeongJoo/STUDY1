<?php
namespace App\Http\Controllers\Debug;
//...
use App\MongoDoc\User;

class HomeController extends Controller
{
    public function index()
    {
        // ⅰﾝｻｪﾈｪﾃｪｿｪ凜｡
        // $users = User::all();
        // ﾊﾛ豸ﾊ瑟鴕ﾈ?ﾟ罨ｷｪｿｪ凜｡
        $users = User::where('name', 'like', '%ama%')->get();
        dd($user);
        return view('debug.index');
    }
    // ...
}
