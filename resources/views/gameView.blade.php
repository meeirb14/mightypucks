@extends('layouts.app')


@section('css')
.vid {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px; height: 0; overflow: hidden;
}

.vid iframe,
.vid object,
.vid embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

@endsection

@section('content')

<div class="page-header">
    <h1>Game vs<small> {{ $game->vsTeam }}</small></h1>
</div>


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Game date: </strong>{{ $game->date }}</li>
                            <li class="list-group-item"><strong>Season: </strong>{{ $game->season->name }}</li>
                            <li class="list-group-item"><strong>Score: </strong>{{ $game->winLoss }}  {{ $game->goalsFor }} - {{ $game->goalsAgainst }}</li>
                        </ul>
                        <ul class="list-group">
                            @foreach($game->goals as $goal)
                                @if($goal->team == 'Mighty Pucks')
                                <li class="list-group-item"><button id="goal-{{ $goal->id }}" type="button" class="btn btn-success">{{ $goal->team }}</button></li>
                                @else
                                <li class="list-group-item"><button id="goal-{{ $goal->id }}" type="button" class="btn btn-danger">{{ $goal->team }}</button></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="vid">
                            <div id="player"></div>
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
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;


    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: '{{ $game->getVideoId() }}',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        //event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            //setTimeout(stopVideo, 6000);
            done = true;
        }
    }
    function stopVideo() {
        player.stopVideo();
    }

    /*
        control youtube videos tutorial
        http://tutorialzine.com/2015/08/how-to-control-youtubes-video-player-with-javascript/
    */
    $(document).ready(function() {
        @foreach($game->goals as $goal)
        $('#goal-{{ $goal->id }}').on('click', function () {
            var time = getSecondsFromGameTime("{{ $goal->time }}");
            player.seekTo(time);
        });
        @endforeach
    });

    function getSecondsFromGameTime(time){
        array = time.split(':');
        min = parseInt(array[0]);
        sec= parseInt(array[1]);

        return min * 60 + sec;
    }

</script>
@endsection
