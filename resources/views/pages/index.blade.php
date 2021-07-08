@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center bg-success">
        <h1>Miresevini ne faqen tone! </h1>
        <p>Ketu flitet, parashikohet dhe bisedohet vetem per futbollin Kosovar.</p>
        {{-- <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Sign in</a></p> --}}
    </div>

    <div class="jumbotron text-center">

        <table class="table">
            
            <h1>Tabela perfundimtare e superliges Kosovare per sezonin 2020/21</h1>
            <thead>
              <tr>
                <th scope="col">Pozita</th>
                <th scope="col">Ekipet</th>
                <th scope="col">Fitore</th>
                <th scope="col">Humbje</th>
                <th scope="col">Piket</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-success">
                
                <th scope="row">1</th>
                <td> <a href="{{route('team.getTeamResult',['Prishtina'])}}"><b>Prishtina</b> </a></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
               
              </tr>
              <tr class="bg-success">
                <th scope="row">2</th>
                <td> <a href="{{route('team.getTeamResult',['Drita'])}}"><b>Drita</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td> <a href="{{route('team.getTeamResult',['Ballkani'])}}"><b>Ballkani</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td> <a href="{{route('team.getTeamResult',['Gjilani'])}}"><b>Gjilani</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td><a href="{{route('team.getTeamResult',['Ferronikeli'])}}"> <b>Ferronikeli</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td> <a href="{{route('team.getTeamResult',['Llapi'])}}"><b>Llapi</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td> <a href="{{route('team.getTeamResult',['Drenica'])}}"><b>Drenica</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr class="bg-warning">
                <th scope="row">8</th>
                <td><a href="{{route('team.getTeamResult',['Trepca'])}}"> <b>Trepca '89</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr class="bg-danger">
                <th scope="row">9</th>
                <td> <a href="{{route('team.getTeamResult',['Arberia'])}}"><b>Arberia</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
              <tr class="bg-danger">
                <th scope="row">10</th>
                <td> <a href="{{route('team.getTeamResult',['Besa'])}}"><b>Besa</b></td>
                <td>15</td>
                <td>6</td>
                <td>64</td>
              </tr>
            </tbody>

            <caption style="color:green;"> <b>Ngjyra e gjelbert - Kualifikim ne garat Evropiane</b> </caption>
            <caption style="color:orange;"> <b>Ngjyra e verdhe - Playout</b> </caption>
            <caption style="color: red;"> <b>Ngjyra e kuqe - Renie nga liga</b> </caption>
          </table>
    

    
    </div>
 @endsection

