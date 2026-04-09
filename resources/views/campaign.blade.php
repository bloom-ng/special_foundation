<x-guest-layout
    :title="$campaign->title"
    page="campaign"
>

    @foreach ($campaign->content ?? [] as $block)

        @includeIf('campaign.blocks.' . $block['type'], [
            'data' => $block['data'],
            'campaign' => $campaign
        ])

    @endforeach

</x-guest-layout>