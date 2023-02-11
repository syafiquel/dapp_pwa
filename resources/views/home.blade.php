<x-guest-layout>
    @livewire('home', [ 'http' => app(App\Services\HttpClient::class) ] )
</x-guest-layout>