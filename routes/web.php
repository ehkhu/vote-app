<?php

use App\Events\QuestionChange;
use App\Events\VoteStatusUpdated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Models\Question;
use App\Models\Vote;
use GuzzleHttp\Psr7\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//question
Route::get('/', function () {
    return view('welcome');
});

Route::get('/questions',[QuestionController::class,'index']);

Route::get('/questions/{question}',[QuestionController::class,'show']);

Route::get('/next/question/{question}',[QuestionController::class,'next']);

//vote
Route::get('/voter',function(){
    return view('voter');
});

Route::get('/votes',function(){
    return view('votes');
});

Route::get('/update/vote/{quesiton_id}/{isyes}',
function($question_id,$isyes){
    $vote = new Vote();
    $vote->question_id = $question_id;
    $vote->vote = $isyes;
    $vote->save();
    VoteStatusUpdated::dispatch($vote);
    return "done";
});
