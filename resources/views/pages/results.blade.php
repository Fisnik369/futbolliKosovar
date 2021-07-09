@extends('layouts.app')

@section('content')
    
    <div class="jumbotron text-center bg-success">

        <table class="table">
            
            <h1>Lojet e ekipes {{$team}} ne superliges Kosovare per sezonin 2020/21</h1>
            <thead>
              <tr>
                <th scope="col">Ekipi vendas</th>
                <th scope="col">Rezultati</th>
                
                <th scope="col">Ekipi mysafir</th>
                <th scope="col">Data</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($matches as $match)
              <tr class="">
                <td> <b>{{$match->team1}}</b></td>
                <td> <b>{{$match->matchResult}}</b> </td>
                <td> <b> {{$match->team2}} </b> </td>
                <td> <b>{{$match->matchDate}}</b> </td>
                
                
              </tr>
                
              @endforeach
              
             
            </tbody>
           
          </table>
    
    </div>
 @endsection

