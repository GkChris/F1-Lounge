<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\tags;
use App\drivers;
use App\constructors;
use App\circuits;
use App\races;


class PostsController extends Controller
{
    public function store(Request $request)
    {

        $forId = new posts;
        $lastPostId = $forId->last_postId();
        
        //[[POST AREA]]
        $post = new posts;

        $post->postId = $lastPostId+1;

        $post->id = $request->postUser;

        $post->title = $request->postTitle;

        $post->comment = $request->postComment;

        $url = new posts;
        $url_embed =  $url->embedURL($request->postURL);
        $post->url = $url_embed;

        $post->approved = 0;

        $post->save();

        
        


        //[[TAG AREA]]
        $tags = new tags;

        $tags->postId = $lastPostId+1;



        //drivers
        if(isset($request->driverTag_1)){
            $data = new drivers;
            $driver_1 = $data->name_to_id($request->driverTag_1);
            $tags->driverId_1 = $driver_1[0]->driverId;
        }
        if(isset($request->driverTag_2)){
            $data = new drivers;
            $driver_2 = $data->name_to_id($request->driverTag_2);
            $tags->driverId_2 = $driver_2[0]->driverId;
        }
        if(isset($request->driverTag_3)){
            $data = new drivers;
            $driver_3 = $data->name_to_id($request->driverTag_3);
            $tags->driverId_3 = $driver_3[0]->driverId;
        }

        //constructors
        if(isset($request->constructorTag_1)){
            $data = new constructors;
            $constructor_1 = $data->name_to_id($request->constructorTag_1);
            $tags->constructorId_1 = $constructor_1[0]->constructorId;
        }
        if(isset($request->constructorTag_2)){
            $data = new constructors;
            $constructor_2 = $data->name_to_id($request->constructorTag_2);
            $tags->constructorId_2 = $constructor_2[0]->constructorId;
        }
        if(isset($request->constructorTag_3)){
            $data = new constructors;
            $constructor_3 = $data->name_to_id($request->constructorTag_3);
            $tags->constructorId_3 = $constructor_3[0]->constructorId;
        }


        //circuits
        if(isset($request->circuitTag_1)){
            $data = new circuits;
            $circuit_1 = $data->name_to_id($request->circuitTag_1);
            $tags->circuitId_1 = $circuit_1[0]->circuitId;
        }
        if(isset($request->circuitTag_2)){
            $data = new circuits;
            $circuit_2 = $data->name_to_id($request->circuitTag_2);
            $tags->circuitId_2 = $circuit_2[0]->circuitId;
        }
        if(isset($request->circuitTag_3)){
            $data = new circuits;
            $circuit_3 = $data->name_to_id($request->circuitTag_3);
            $tags->circuitId_3 = $circuit_3[0]->circuitId;
        }


        //seasons
        if(isset($request->seasonTag_1)){
            $tags->year_1 = $request->seasonTag_1;
        }
        if(isset($request->seasonTag_2)){
            $tags->year_2 = $request->seasonTag_2;
        }
        if(isset($request->seasonTag_3)){
            $tags->year_3 = $request->seasonTag_3;
        }


        //races
        if(isset($request->raceTag_1)){
            $data = new races;
            $race_1 = $data->year_and_round_to_id($request->seasonTag_1, $request->raceTag_1);
            $tags->raceId_1 = $race_1[0]->raceId;
        }
        if(isset($request->raceTag_2)){
            $data = new races;
            $race_2 = $data->year_and_round_to_id($request->seasonTag_2, $request->raceTag_2);
            $tags->raceId_2 = $race_2[0]->raceId;
        }
        if(isset($request->raceTag_3)){
            $data = new races;
            $race_3 = $data->year_and_round_to_id($request->seasonTag_3, $request->raceTag_3);
            $tags->raceId_3 = $race_3[0]->raceId;
        }


        //defaults
        if(isset($request->defaultDriver)){
            $data = new drivers;
            $driver_default = $data->name_to_id($request->defaultDriver);
            $tags->defaultDriver = $driver_default[0]->driverId;
        }
        if(isset($request->defaultConstructor)){
            $data = new constructors;
            $constructor_default = $data->name_to_id($request->defaultConstructor);
            $tags->defaultConstructor = $constructor_default[0]->constructorId;
        }
        if(isset($request->defaultCircuit)){
            $data = new circuits;
            $circuit_default = $data->name_to_id($request->defaultCircuit);
            $tags->defaultCircuit = $circuit_default[0]->circuitId;
        }
        if(isset($request->defaultSeason)){
            $tags->defaultSeason = $request->defaultSeason;
        }
        if(isset($request->defaultRace)){
            $data = new races;
            $race_default = $data->year_and_round_to_id($request->defaultSeason, $request->defaultRace);
            $tags->defaultRace = $race_default[0]->raceId;
        }

        $tags->save();

        return redirect()->back()->with('success', 'Your post has been submitted! State: awaiting approval');   
 
    }



    public function delete(Request $request){

        $post = posts::where('postId',$request->postId)->delete();
        $tag = tags::where('postId',$request->postId)->delete();
        

        return redirect()->back();

    }

    public function approved(Request $request){

        $post = posts::where('postId',$request->postId)->firstOrFail();
        $post->approved = '1';
        $post->save();

        return redirect()->back();
    }
}
