{{-- Dynamic page: one URL per entry of resources/data/collections/work.json, matched on `slug` — $work is the entry. Add an entry there to publish a new case study; its `content` HTML is the body. --}}
<x-layouts.case
    :title="$work->title"
    :description="$work->description"
    :category="$work->category"
    :client="$work->client"
    :role="$work->role"
    :services="$work->services"
    :year="$work->year"
    :liveUrl="$work->liveUrl"
    :image="$work->image"
    :imageAlt="$work->imageAlt">

    {!! $work->content !!}

</x-layouts.case>
