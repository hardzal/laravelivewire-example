<div>
    <div class="p-16">
        <div class="grid md:grid-cols-3 sm:grid-cols-1 lg:grid-cols-3 m-5 mb-10">
            @foreach($posts as $post)
            <div class="bg-white overflow-hidden hover:bg-green-100 border border-gray-200 p-3">
                <div class="m-2 text-justify text-sm">
                    <div class="grid md:grid-cols-2">
                        <span class="text-left text-xs">{{ $post->user->name }}</span>
                        <span class="text-right text-xs">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="font-bold text-lg h-2 mb-8">{{ $post->title }}</h2>
                    @if($this->updateStateId !== $post->id)
                    <p class="text-xs">
                        {{ $post->body }}
                    </p>
                    @else
                    <textarea wire:model="body" id="description" name="description" rows="3" wire:model="description"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="you@example.com"></textarea>

                    <button type="submit" wire:click="updatePost({{ $post->id }})"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo- focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                    @endif
                </div>
                <div class="grid md:grid-cols-2 mt-4">
                    <button wire:click="showUpdateForm({{ $post->id }})"
                        class="inline-flex justify-center border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo- focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
                    <button onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')"
                        wire:click="deletePost({{ $post->id }})"
                        class="inline-flex justify-center border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo- focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
