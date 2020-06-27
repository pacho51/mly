<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PhoneBookController extends Controller
{
    //
    public function index()
    {
        //
        //

        $clients = "";
        try {
            $response = Http::get(config('my.url_api'));
            $clients = json_decode($response->json());
        } catch (\Exception $e) {
            Log::channel('customlog')->info(__LINE__ . ' - ' . __FILE__ . ' error in open file ' . "-" . $e->getMessage());
            $path = storage_path() . "/json/" . config('my.file');
            $clients = json_decode(file_get_contents($path));
        }



        $clients = $this->paginate($clients);

        return view('phonebook')->with('clients', $clients);
    }

    public function paginate($items, $perPage = 3, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
