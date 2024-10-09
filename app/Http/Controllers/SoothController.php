<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoothRequest;
use App\Http\Requests\UpdateSoothRequest;
use App\Models\Sooth;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;

class SoothController extends Controller
{

    public $soothCount;

	/**
	 * retrieve the fortune
	 *
	 * @return string
	 *
	 */
    public function getSooth(): Sooth
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
	public function getAllSooths(): Collection
	{
		return Sooth::select('id', 'sooth', 'updated_at')->get();
	}

    /**
     * format lists of sooth for json 
     * response
     */

    public function formatSoothsList($sooths): array
    {
	    return $sooths->toArray();
    }

    /**
     * show the fortune
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
	public function showSooth(): JsonResponse
	{
		try {
			$sooth = $this->getSooth();
		} catch (\Throwable $e) {
			$error = $e->message;
			\Log::error('error in SoothController::showSooth ' . $error);
		}

		if (!isset($error)) {
			return response()->json([
				'data' => [
					'id' => $sooth->id,
					'sooth' => $sooth->sooth,
					'updated_at' => $sooth->updated_at,
				],
				'meta' => [],
				'error' => null,
			], 200);
		} else {
			return response()->json([
				'data' => [],
				'meta' => [],
				'error' => 'Something is foul in the State of Denmark. Check the logs.',
			], 500);
		}
	}

    /**
     * show all fortunes
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
	public function showAllSooths(): JsonResponse
	{
		$sooths = $this->getAllSooths();
		$sooths = $this->formatSoothsList($sooths);
		return response()->json([
			'data' => $sooths,
			'meta' => [],
			'error' => null
		], 200);
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
