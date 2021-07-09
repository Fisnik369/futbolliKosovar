@extends('layouts.app')

@section('content')
    
    <div class="jumbotron text-center bg-success">

        <table class="table">
            
            <h1>Java {{$week}}</h1>
            <thead>
              <tr>
                <th scope="col">Ekipi vendas</th>
                <th scope="col">Rezultati</th>
                
                <th scope="col">Ekipi mysafir</th>
                <th scope="col">Data</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($weeks as $week)
              <tr class="">
                
                <td> <b>{{$week->team1}}</b></td>
                <td> <b>{{$week->matchResult}}</b> </td>
                <td> <b> {{$week->team2}} </b> </td>
                <td> <b>{{$week->matchDate}}</b> </td>
                
                
              </tr>
                
              @endforeach
              
             
            </tbody>

          </table>
    
    </div>
 @endsection

