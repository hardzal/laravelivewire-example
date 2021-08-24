<div class="p-4">
    <div class="md:grid md:gap-6">
        <div class="mt-5 md:mt-0">
            <div class="flex ml-4 mt-4">
                <div class="flex-auto">
                    <p class="font-bold">Add Post</p>
                </div>
            </div>
            {{ $title }}
            {{ $description }}
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div>
                        <label for="title" class="" />Judul</label>
                        <div>
                            <input wire:model="title" type="text" id="title"
                                class="shadow-sm block w-full rounded-md border-gray-300"
                                placeholder="type your title" />
                        </div>
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>
                        <div class="mt-1">
                            <textarea id="description" name="description" rows="3" wire:model="description"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                placeholder="you@example.com"></textarea>
                        </div>
                    </div>

                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" wire:click="createPost"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo- focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
