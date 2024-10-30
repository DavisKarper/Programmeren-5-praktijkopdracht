<div class="max-w-sm mx-auto bg-white rounded-lg shadow-md flex">
    <div class="px-4 py-6">
        <div id="image-preview"
            class="hidden max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
        </div>
        <div id="image-input"
            class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
            <input id="image" type="file" name="image" class="hidden" accept="image/*" />
            <label for="image" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                </svg>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload image</h5>
                <p class="font-normal text-sm text-gray-400 md:px-6">Chosen image size should be less than
                    <b class="text-gray-600">2mb</b>
                </p>
                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG or
                        PNG</b> format.</p>
                <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
            </label>
        </div>
        <div class="flex items-center justify-center">
            @error('image')
                <span>
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const uploadInput = document.getElementById('image');
            const filenameLabel = document.getElementById('filename');
            const imagePreview = document.getElementById('image-preview');
            const imageInput = document.getElementById('image-input');

            uploadInput.addEventListener('change', (event) => {
                const file = event.target.files[0];

                if (file) {
                    filenameLabel.textContent = file.name;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imagePreview.innerHTML =
                            `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                        imagePreview.classList.remove('hidden', 'border-dashed', 'border-2',
                            'border-gray-400');
                        imageInput.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Maak de preview klikbaar
            imagePreview.addEventListener('click', () => {
                uploadInput.click(); // Opent de bestandskiezer
            });
        });
    </script>
</div>
