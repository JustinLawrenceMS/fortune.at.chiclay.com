<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoothRequest;
use App\Http\Requests\UpdateSoothRequest;
use App\Models\Sooth;

class SoothController extends Controller
{

    public $soothCount;

	/**
	 * retrieve the fortune
	 *
	 * @return string
	 *
	 */
    public function getSooth()
    {
        $sooth = Sooth::rand();

	    return $sooth;
    }

    /**
	 * retrieve all fortunes
	 *
	 * @return Collection
	 *
	 */
	public function getAllSooths()
	{
		return Sooth::all()->pluck('sooth');
	}

    /**
     * show the fortune
     *
     * @return \Illuminate\Http\Response
     *
     */
	public function showSooth()
	{
		$sooth = $this->getSooth();
		return response()->json($sooth);
	}

    /**
     * show all fortunes
     *
     * @return \Illuminate\Http\Response
     *
     */
	public function showAllSooths()
	{
		$sooths = $this->getAllSooths();
		return response()->json($sooths);
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
