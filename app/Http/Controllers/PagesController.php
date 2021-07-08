<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.index');
    }
    public function team(String $team)
    {
        $client = new Client();
        $res = $client->request('GET', 'http://localhost:8010/selectByName/'.$team);
        $json = $res->getBody()->getContents();

        // $json = '[{"matchDate":"06/07/2021","week":"1","team1":"Llapi","team2":"Feronikeli","matchResult":"1:1","id":"1","time":"18:30"},{"matchDate":"04/04/2021","week":"3","team1":"Prishtina","team2":"Llapi","matchResult":"2:3","id":"12","time":"14:30"}]';
        $matches = json_decode($json);
       // var_dump($matches);
        return view('pages.results', compact('matches','team'));
    }



    public function about()
    {
        return view('pages.about');
    }



    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
