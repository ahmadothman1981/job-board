<x-layout>
    <x-card>
        <form action="{{route('employer.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :required="true">Company Name</x-label>
                <x-text-input name="company_name" />
                <x-button class="w-full">Create</x-button>
            </div>
        </form>
    </x-card>
</x-layout>