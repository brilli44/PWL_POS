<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelModel;

class LevelController extends Controller
{
  public function index(){
    return LevelModel::all();
  }
  public function store (Request $request){
    $level = LevelModel::create($request->all());
    return response()->json($level,201);
  }
  public function show(LevelModel $level){
    return LevelModel::find($level);
  }
}
