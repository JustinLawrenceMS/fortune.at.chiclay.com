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
			
			$sooth = json_encode($sooth_said->sooth);

		}
		else{

			$sooth = $this->getSooth();
		
		}
	
		return $sooth;


	}
	public function getAllSooths(){

		$sooth_said = Sooth::all()->pluck('sooth');

		$sooths = json_encode($sooth_said);

		return $sooths;


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
