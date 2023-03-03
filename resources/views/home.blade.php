<x-guest-layout>
    @livewire('home', [ 'http' => app(App\Services\HttpClient::class) ] )
    @livewire('components.dialogbox')
</x-guest-layout>