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

        $matches = json_decode($json);
       
        return view('pages.results', compact('matches','team'));
    }
    
    public function week(String $week){
        $client = new Client();
        $res = $client->request('GET', 'http://localhost:8010/selectByWeek/'.$week);
        $json = $res->getBody()->getContents();

        $weeks = json_decode($json);
        
        return view('pages.week', compact('weeks','week'));
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
