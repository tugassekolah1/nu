<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit News') }}
            </h2>
            <a href="{{ route('admin.news.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">
                &larr; Back to News
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">
                <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $news->title)" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- Current Image Preview & Input --}}
                    <div>
                        <x-input-label for="image" :value="__('Featured Image')" />
                        
                        @if($news->image)
                            <div class="my-3">
                                <p class="text-xs text-gray-500 mb-1 font-medium">Current Image:</p>
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-32 h-24 object-cover rounded-md border border-gray-200 shadow-sm">
                            </div>
                        @endif

                        <input id="image" name="image" type="file" accept="image/*" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-300 rounded-md cursor-pointer" />
                        <p class="mt-1 text-xs text-gray-500">Leave blank if you don't want to change the image.</p>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    {{-- Content --}}
                    <div>
                        <x-input-label for="content" :value="__('News Content')" />
                        <textarea id="content" name="content" rows="10" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('content', $news->content) }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    {{-- Status --}}
                    <div>
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="published" {{ old('status', $news->status) == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    {{-- Submit & Cancel Buttons --}}
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.news.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <x-primary-button>
                            {{ __('Update News') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>