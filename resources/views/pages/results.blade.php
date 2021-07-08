@extends('layouts.app')

@section('content')
    
    <div class="jumbotron text-center">

        <table class="table">
            
            <h1>Lojet e ekipes {{$team}} ne superliges Kosovare per sezonin 2020/21</h1>
            <thead>
              <tr>
                <th scope="col">Ekipi vendas</th>
                <th scope="col">Rezultati</th>
                
                <th scope="col">Ekipi mysafir</th>
                <th scope="col">Data</th>
                <th scope="col">Ora</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($matches as $match)
              <tr class="">
                <td> <b>{{$match->team1}}</b></td>
                <td>{{$match->matchResult}}</td>
                <td>{{$match->team2}}</td>
                <td>{{$match->matchDate}}</td>
                <td>{{$match->time}}</td>
              </tr>
                
              @endforeach
              
             
            </tbody>

           
          </table>
    

    
    </div>
 @endsection

