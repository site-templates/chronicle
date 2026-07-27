{{-- Dynamic page: one URL per entry of resources/data/collections/journal.json, matched on `slug` — $journal is the entry. Add an entry there to publish a new post; its `content` HTML is the body. --}}
<x-layouts.post
    :title="$journal->title"
    :description="$journal->description"
    :category="$journal->category"
    :date="$journal->date"
    :readTime="$journal->readTime"
    :author="$journal->author"
    :authorRole="$journal->authorRole"
    :authorImage="$journal->authorImage"
    :image="$journal->image"
    :imageAlt="$journal->imageAlt">

    {!! $journal->content !!}

</x-layouts.post>
