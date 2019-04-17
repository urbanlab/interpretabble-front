<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ItemController extends Controller
{
    // Gets all items from API
    public function listItems()
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/items');
        
        $items = json_decode($response->getBody()->getContents());
        //var_dump($items);
        return view('scenarioManager', ['items' => $items]);
    }

    // Delete an item from API
    public function deleteItem($id)
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET', env('API_URL').'api/item/delete/'.$id);
        return redirect('scenarios');
    }

    // Create an item trought the API
    public function createItem(Request $request)
    {

        $client = new Client(); //GuzzleHttp\Client

        // Maps values from the form-data
        $result = $client->post(env('API_URL').'api/item/new', [
           'multipart' => [
                [
                    'name' => 'name',
                    'contents' => $request->name,
                ],
                [
                    'name' => 'card_id',
                    'contents' => $request->card_id
                ],
                [
                    'name'     => 'zone1',
                    'contents' => fopen( $request->file('zone1')->getPathname(), 'r' ),
                    'filename' => $request->file('zone1')->getClientOriginalName()
                ],
                [
                    'name'     => 'zone2',
                    'contents' => fopen( $request->file('zone2')->getPathname(), 'r' ),
                    'filename' => $request->file('zone2')->getClientOriginalName()

                ],
                [
                    'name'     => 'zone3',
                    'contents' => fopen( $request->file('zone3')->getPathname(), 'r' ),
                    'filename' => $request->file('zone3')->getClientOriginalName()
                ],
                [
                    'name'     => 'zone4',
                    'contents' => fopen( $request->file('zone4')->getPathname(), 'r' ),
                    'filename' => $request->file('zone4')->getClientOriginalName()
                ],
           ]
        ]);
        return redirect('scenarios');
    }
}
