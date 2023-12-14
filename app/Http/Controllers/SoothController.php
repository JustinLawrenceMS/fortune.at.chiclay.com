<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoothRequest;
use App\Http\Requests\UpdateSoothRequest;
use App\Models\Sooth;

class SoothController extends Controller
{
	/**
	 * retrieve the fortune
     *
     * return @string (json object)
     *
     */
	public function getSooth(){

		$sooth_said = Sooth::find(rand(1,106));

		if(!is_null($sooth_said)){
			
			return response()->json($sooth_said->sooth);

		}
		else{

			$this->getSooth();
		
		}


	}
	public function getAllSooths(){

		$sooth_said = Sooth::all()->pluck('sooth');

		return response()->json($sooth_said);

	}


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$sooth = $this->getSooth();
	return view('welcome')->with('sooth', $sooth);

    }

}
