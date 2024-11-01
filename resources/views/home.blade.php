<x-app-layout>
    <main class="container mx-auto px-4 py-12">
        <section class="text-center mb-10">
            <h2 class="text-4xl font-bold text-cyan-400 mb-4">Welcome to Arcane Archive</h2>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                Arcane Archive is your gateway to a world of magical items, both official and homebrew, for Dungeons &
                Dragons. Discover powerful artifacts, mysterious relics, and enchanted weapons to enhance your
                adventures.
            </p>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-cyan-700">
                <h3 class="text-2xl font-semibold text-cyan-400 mb-3">Explore Magic Items</h3>
                <p class="text-gray-300">
                    Dive into our vast collection of magical items. From common trinkets to legendary artifacts, find
                    the perfect item to boost your character's abilities and add intrigue to your story. Choose from
                    both official items and creative homebrew options crafted by our community.
                </p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-cyan-700">
                <h3 class="text-2xl font-semibold text-cyan-400 mb-3">Favorite and Save Your Favorites</h3>
                <p class="text-gray-300">
                    Save the items you like for easy access later. With our favorite feature, you can quickly build a
                    collection of your favorite magic items, making it easier to find inspiration for future sessions.
                </p>
            </div>
        </section>

        <section class="text-center">
            <h3 class="text-2xl font-semibold text-cyan-400 mb-4">Get Started</h3>
            <a href="{{ route('items.index') }}"
                class="inline-block bg-cyan-500 text-gray-900 px-6 py-3 rounded-full font-semibold hover:bg-cyan-600 transition">
                Discover Magic Items
            </a>
        </section>
    </main>

    <footer class="bg-gray-800 py-6 mt-16">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2024 Arcane Archive. All rights reserved.</p>
        </div>
    </footer>
</x-app-layout>
