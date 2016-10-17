@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Find a game</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="gameList" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Season</th>
                                    <th>vs Team</th>
                                    <th>Date</th>
                                    <th>Score (W/L)</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($games as $game)
                                <tr>
                                    <td>{{ $game->season->name }}</td>
                                    <td>{{ $game->vsTeam }}</td>
                                    <td>{{ $game->date }}</td>
                                    <td>{{ $game->goalsFor }} - {{ $game->goalsAgainst }} ({{ $game->winLoss }})</td>
                                    <td><a href="{{ url("/games/$game->id") }}">Watch</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#gameList').DataTable();
    });
</script>
@endsection



