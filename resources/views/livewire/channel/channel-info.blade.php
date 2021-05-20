<div>
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ $channel->picture }}" class="img-thumbnail rounded-circle" height="90px" width="90px" alt="">

            <div class="ml-2">
                <h4>{{ $channel->name }}</h4>
                <p class="gray-text text-sm"> {{ $channel->subscribers() }} Subscribers</p>
            </div>
        </div>
        <div class="">
            <button wire:click.prevent="toggle"
                class="btn btn-lg text-uppercase {{$userSubscribed ? 'genric-btn danger radius' : 'genric-btn success radius'}} ">
                {{$userSubscribed ? 'Unsubscrribe' : 'Subscribe'}}
            </button>
        </div>
    </div>
</div>