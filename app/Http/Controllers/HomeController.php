<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    public function index(){

      $brander = DB::table('webalps')->select(
          'webalps.*'
          )
          ->orderBy('id', 'asc')
          ->get();


          $dupli = DB::table('webalps')->select(
              'webalps.izic_id'
              )
              ->groupBy('izic_id')
              ->havingRaw('count(*) > 1')
              ->get();


            //  dd($dupli);

        $data['objs'] = $brander;
        $data['dupli'] = $dupli;

      return view('welcome', $data);

    }
}
