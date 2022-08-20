<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
        'postId', 'comment', 'url', 
        'approved', 'id',
    ];

    protected $primaryKey = 'postId';

    public $incrementing = false;


    public function User(){
        return $this->hasOne('App\User', 'id');
    }



    public function id_to_name($post){

        foreach ($post as $pt){
            if(isset($pt->driverId_1)){
                $temp1 = DB::table('drivers')->select('forename', 'surname')->where('driverId', '=', $pt->driverId_1)->get();
                $pt->driverId_1 = $temp1[0]->forename.' '.$temp1[0]->surname;
            }
            if(isset($pt->driverId_2)){
                $temp1 = DB::table('drivers')->select('forename', 'surname')->where('driverId', '=', $pt->driverId_2)->get();
                $pt->driverId_2 = $temp1[0]->forename.' '.$temp1[0]->surname;
            }
            if(isset($pt->driverId_3)){
                $temp1 = DB::table('drivers')->select('forename', 'surname')->where('driverId', '=', $pt->driverId_3)->get();
                $pt->driverId_3 = $temp1[0]->forename.' '.$temp1[0]->surname;
            }
            if(isset($pt->constructorId_1)){
                $temp2 = DB::table('constructors')->select('name')->where('constructorId', '=', $pt->constructorId_1)->get();
                $pt->constructorId_1 = $temp2[0]->name;
            }
            if(isset($pt->constructorId_2)){
                $temp2 = DB::table('constructors')->select('name')->where('constructorId', '=', $pt->constructorId_2)->get();
                $pt->constructorId_2 = $temp2[0]->name;
            }
            if(isset($pt->constructorId_3)){
                $temp2 = DB::table('constructors')->select('name')->where('constructorId', '=', $pt->constructorId_3)->get();
                $pt->constructorId_3 = $temp2[0]->name;
            }
            if(isset($pt->circuitId_1)){
                $temp3 = DB::table('circuits')->select('name')->where('circuitId', '=', $pt->circuitId_1)->get();
                $pt->circuitId_1 = $temp3[0]->name;
            }
            if(isset($pt->circuitId_2)){
                $temp3 = DB::table('circuits')->select('name')->where('circuitId', '=', $pt->circuitId_2)->get();
                $pt->circuitId_2 = $temp3[0]->name;
            }
            if(isset($pt->circuitId_3)){
                $temp3 = DB::table('circuits')->select('name')->where('circuitId', '=', $pt->circuitId_3)->get();
                $pt->circuitId_3 = $temp3[0]->name;
            }
            if(isset($pt->raceId_1)){
                $temp4 = DB::table('races')->select('round')->where('raceId', '=', $pt->raceId_1)->get();
                $pt->raceId_1 = $temp4[0]->round;
            }
            if(isset($pt->raceId_2)){
                $temp4 = DB::table('races')->select('round')->where('raceId', '=', $pt->raceId_2)->get();
                $pt->raceId_2 = $temp4[0]->round;
            }
            if(isset($pt->raceId_3)){
                $temp4 = DB::table('races')->select('round')->where('raceId', '=', $pt->raceId_3)->get();
                $pt->raceId_3 = $temp4[0]->round;
            }
            if(isset($pt->id)){
                $temp5 = DB::table('users')->select('name')->where('id', '=', $pt->id)->get();
                $pt->id = $temp5[0]->name;
            }
        }

        return $post;
    }





    public function last_postId(){
        $data = DB::table('posts')->select('postId')->orderBy('postId','desc')->first();
        return $data->postId;
    }




    public function fetch_post_by_tag($thisTags){

        $tags = [];
        $data = collect();
        foreach ($thisTags as $tag){
            // array_push($tags, $tag->postId);
            $data2 = (DB::table('posts')
            ->join('tags', 'posts.postId', '=', 'tags.postId')
            ->select('posts.*', 'tags.*')
            ->where('posts.approved','=', '1')
            ->where('posts.postId','=', $tag->postId)
            ->get());
            if(isset($data2[0])){
                $data->add($data2[0]);
            }
            
        }

        return $data;

    }



    public function embedURL($url){


        $url = str_replace("watch?v=", 'embed/', $url );

        return $url;
        
    }


    
    public function fetch_post_by_approval(){


        $data = DB::table('posts')
        ->select('*')
        ->where(['approved' => '0'])
        ->get();

        return $data;

    }


    public function combinePostToTags($thisPosts){

        $postsId = [];
        foreach ($thisPosts as $posts){
            array_push($postsId, $posts->postId);
        }

        $data = DB::table('tags')
        ->join('posts', 'tags.postId', '=', 'posts.postId')
        ->select('*')
        ->whereIn('posts.postId', $postsId)
        ->get();

        return $data;

    }
}
