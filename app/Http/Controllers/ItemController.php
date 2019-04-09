<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ItemController extends Controller
{
    public function listItems()
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/items');
        
        $items = json_decode($response->getBody()->getContents());
        //var_dump($items);
        return view('scenarioManager', ['items' => $items]);
    }


    public function deleteItem($id)
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/item/delete/'.$id);
        return redirect('scenarios');
    }


    public function createItem(Request $request)
    {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->post(env('API_URL').'api/item/new', [
            'form_params' => [
                'name' => $request->name,
                'medias' => $request->medias,
                'children' => $request->children
            ]
        ]);
        return redirect('scenarios');
    }
}
