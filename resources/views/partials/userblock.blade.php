<div class="media">
    <a class="pull-left" href="{{ route('profile.index', ['id' => $user->id]) }}">
        <img src="{{ $user->getAvatarUrl() }}" class="media-object" alt="{{ $user->firstname }} {{ $user->lastname }}">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="{{ route('profile.index', ['id' => $user->id]) }}" style="font-weight: bold; color: #3B5999;">{{ $user->firstname }} {{ $user->lastname }}</a></h4>
        @if($user->currentcity)
            <p>{{ $user-currentcity }}</p>
        @endif
    </div>
</div>