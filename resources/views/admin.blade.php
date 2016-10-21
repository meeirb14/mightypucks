@extends('layouts.app')

@section('content')
<div>
    <h1>Welcome, {{ $user->firstName }}</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a season</div>
                <div class="panel-body">
                    <div>
                        <form action="/seasons" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="seasonName" maxlength="100" />
                            <input type="submit" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add a game</div>
                        <div class="panel-body">
                            <div class="col-md-6">
                                <table border="0">
                                    <tr>
                                        <td>Youtube link:</td>
                                        <td><input id="youtubeLink" type="text" name="youtubeLink" /></td>
                                    </tr>
                                    <tr>
                                        <td>Game date:</td>
                                        <td><input id="date" type="text" name="date" /></td>
                                    </tr>
                                    <tr>
                                        <td>Season:</td>
                                        <td>
                                            <select id="season_id" name="season_id">
                                                <option selected>Chose season</option>
                                                @foreach($seasons as $season)
                                                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Team:</td>
                                        <td><input id="vsTeam" type="text" name="vsTeam" /></td>
                                    </tr>
                                    <tr>
                                        <td>Win/Loss:</td>
                                        <td>
                                            <select id="winLoss" name="winLoss">
                                                <option value="W">W</option>
                                                <option value="L">L</option>
                                                <option value="T">T</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Goals for:</td>
                                        <td><input id="goalsFor" type="number" name="goalsFor" /></td>
                                    </tr>
                                    <tr>
                                        <td>Goals against:</td>
                                        <td><input id="goalsAgainst" type="number" name="goalsAgainst" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <h4 id="teamHeader">Mighty Pucks</h4>
                                <div id="teamGoalTimes">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <h4 id="vsTeamHeader">vs Team</h4>
                                <div id="vsTeamGoalTimes">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer"><input id="gameSubmitBtn" type="button" class="btn btn-info" value="Submit" /></div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->role === 'Sysadmin')
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <form action="/users" method="POST">
                            <div class="panel-heading">Add a user</div>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    {{ csrf_field() }}
                                    <table border="0">
                                        <tr>
                                            <td>E-mail:</td>
                                            <td><input type="email" name="email" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td><input type="password" name="password" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>First Name:</td>
                                            <td><input type="text" name="firstName" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td><input type="text" name="lastName" maxlength="100" /></td>
                                        </tr>
                                        <tr>
                                            <td>Role:</td>
                                            <td>
                                                <select name="role">
                                                    <option selected disabled>Chose role</option>
                                                    <option val="admin">Admin</option>
                                                    <option val="user">User</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sysadmin password:</td>
                                            <td><input type="password" name="sysadminPassword" /></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-footer"><input class="btn btn-danger" type="submit" value="Submit" /></div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){

            var teamGoals = 0;
            var vsTeamGoals = 0;
            var vsTeamName = "";


            $( "#date" ).datepicker();


            //on input change, if number, add the number of boxes to the right for away and home team
            $("#goalsFor").change(function(){
                if(this.value >= 0 && this.value <= 99){
                    items = "";
                    teamGoals = parseInt(this.value); //get goals value
                    $("#teamHeader").empty();
                    $("#teamHeader").append("Mighty Pucks <span class='badge'>"+ teamGoals +'</span>'); //add badge to table header team name
                    for(i = 0; i < teamGoals; i++){ //create string for adding dynamic amount of inputs for goal times
                        items += '<input id="teamGoalTime-' + i + '" name="vsTeamGoalTime-' + i + '" type="text" class="form-control" placeholder="Goal time"/>';
                    }
                    $("#teamGoalTimes").empty();
                    $("#teamGoalTimes").append(items);
                }

            });

            $("#goalsAgainst").change(function(){
                if(this.value >= 0 && this.value <= 99){
                    vsTeamGoals = parseInt(this.value);
                    items = "";
                    $("#vsTeamHeader").empty();
                    $("#vsTeamHeader").append(vsTeamName + " <span class='badge'>"+ vsTeamGoals +'</span>'); //add badge to table header team name
                    for(i = 0; i < vsTeamGoals; i++){ //create string for adding dynamic amount of inputs for goal times
                        items += '<input id="vsTeamGoalTime-' + i + '" name="vsTeamGoalTime-' + i + '" type="text" class="form-control" placeholder="Goal time"/>';
                    }
                    console.log("test");
                    $("#vsTeamGoalTimes").empty();
                    $("#vsTeamGoalTimes").append(items);
                }

            });

            $("#vsTeam").change(function(){
                vsTeamName = this.value;
                $("#vsTeamHeader").html(vsTeamName + " ");
            });

            $("#gameSubmitBtn").click(function(event){

                var game;
                var teamGoalTimes = [];
                var vsTeamGoalTimes = [];

                //get all the times entered for each goal
                for(i = 0; i < teamGoals; i++) { //create string for adding dynamic amount of inputs for goal times
                    teamGoalTimes.push($("#teamGoalTime-" + i).val());
                }

                for(i = 0; i < vsTeamGoals; i++) { //create string for adding dynamic amount of inputs for goal times
                    vsTeamGoalTimes.push($("#vsTeamGoalTime-" + i).val());
                }


                game = {
                    youtubeLink: $("#youtubeLink").val(),
                    date: $("#date").val(),
                    season_id: $("#season_id").find(":selected").val(),
                    vsTeam: $("#vsTeam").val(),
                    winLoss: $("#winLoss").find(":selected").val(),
                    goalsFor: $("#goalsFor").val(),
                    goalsAgainst: $("#goalsAgainst").val(),
                    teamGoalTimes: teamGoalTimes,
                    vsTeamGoalTimes: vsTeamGoalTimes
                }

                $.ajax({
                    type: "POST",
                    url: "/games",
                    data: {
                        game:  game
                    },
                    dataType: "json",
                    success:function(data) {
                       // alert("New game added");
                    }
                });


                console.log(game);

            });




        });
    </script>
@endsection