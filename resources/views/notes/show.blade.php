<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-alert-success>{{ session('success') }}</x-alert-success>
        <div class="flex items-center gap-6">
            <p class="opacity-70">
                <strong >Created: </strong> {{ $note->created_at->diffForHumans() }}
            </p>

            <p class="opacity-70">
                <strong >Updated at: </strong> {{ $note->updated_at->diffForHumans() }}
            </p>
            <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto">Edit Note</a>
            <form action="{{ route('notes.destroy', $note) }}" method="POST" class="ml-4">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you wish to delete this note?')">
            Delete Note
    </button>
</form>
        </div>

        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-4xl">
                {{ $note->title }}
            </h2>

            <div class="mt-6 text-gray-800 break-words leading-relaxed"> {!! nl2br(e($note->text)) !!} </div>


        </div>
    </div>
</div>
</x-app-layout>