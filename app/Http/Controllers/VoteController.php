<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\VoteStatusUpdated;
use App\Models\Vote;

class VoteController extends Controller
{
    public function update_vote(Array $data){
        $vote = new Vote();
        $vote->question_id = $data['question_id'];
        $vote->vote = $data['isyes'];
        $vote->save();
        VoteStatusUpdated::dispatch($vote);
        return "done";
    }
}
