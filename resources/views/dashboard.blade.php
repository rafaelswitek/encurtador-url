<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">URLs encurtadas</li>
                        @foreach ($urls as $url)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <p><strong>URL Original: </strong>{{ $url->url_original }}</p>
                                <p><strong>URL Encurtada: </strong>{{ $url->url_encurtada }}</p>
                                <p><strong>Data expiração: </strong>{{ \Carbon\Carbon::parse($url->data_expiracao)->format('d/m/Y')}}</p>
                            </div>
                            <a href="{{ $url->url_encurtada }}" target="_blank" type="button" class="btn btn-primary">Acessa</a>
                        </li>
                        @endforeach
                    </ul>

                    {{ $urls->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>