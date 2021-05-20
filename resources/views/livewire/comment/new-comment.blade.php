<div>
    <div class="d-flex align-items-center">
        <img src="{{ auth()->user()->channel->picture }}" alt="" class="rounded-img pr-3" style="height: 40px;">


        <input type="text" wire:model="body" class="my-2 comment-form-control" placeholder="Add a public Commnet">
    </div>

    <div class="d-flex justify-content-end align-items-center">
        @if($body)
        <a href="" class="genric-btn primary small" wire:click.prevent="resetForm"> Cancle</a>
        <a href="" wire:click.prevent="addComment" class="mx-2 genric-btn success small"> Comment</a>
        @endif
    </div>
</div>