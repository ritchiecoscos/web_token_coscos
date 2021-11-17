<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TravelPostController extends Controller {
    public $successStatus = 200;

    public function getAllPosts(Request $request){
        $token = $request['t']; //t is for token
        $userid = $request['u'];//u is for userid


        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if($user != null){
        $travel = Travel::all();

        return response()->json($travel, $this->successStatus);
            

        }else {
        return response()->json(['response' => 'Bad Call'], 501);

        }

    }

    public function getPost(Request $request){
        $id = $request['pid'];//pid is for post id
        $token = $request['t']; //t is for token
        $userid = $request['u'];//u is for userid


        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if($user != null){
        $travel = travel::where('id', $id)->first();

        if($user != null){
            return response()->json($travel, $this->successStatus);

        }else{
            return response()->json(['response' => 'Post not Found!'], 404);
        }

        }else {
        return response()->json(['response' => 'Bad Call'], 501);

        }

    }

    public function searchPost(Request $request){
        $params = $request['p'];//p is for parameters 
        $token = $request['t']; //t is for token
        $userid = $request['u'];//u is for userid


        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if($user != null){
        $travel = travel::where('country', 'LIKE', '%' . $params . '%')
        ->orWhere('place', 'LIKE', '%' . $params . '%')
            ->get();

        // SELECT * FROM posts WHERE country LIKE '%params%' OR place LIKE '%params%' 
        if($user != null){
            return response()->json($travel, $this->successStatus);

        }else{
            return response()->json(['response' => 'Travel not found !'], 404);
        }

        }else {
        return response()->json(['response' => 'Bad Call'], 501);

        }

    }
}
