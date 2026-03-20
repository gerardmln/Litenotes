<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg space-y-10"> 

                <form action="{{ route('notes.update', $note) }}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="text" name="title" field="title" placeholder="Title" class="w-full" autocomplete="off" value="{{ old('title', $note->title) }}"> </input>
                    @error('title')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <textarea name="text" rows="10" field="text" placeholder="Your note here..." class="w-full mt-6">{{ old('text', $note->text) }}</textarea>
                     @error('text')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="px-4 py-2 bg-indigo-500 text-white rounded mt-6">Save</button>


                </form>
 
            </div>
     
        </div> 
    </div>
</x-app-layout>
