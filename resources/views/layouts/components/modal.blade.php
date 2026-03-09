<div x-data="{ open: false }">
    <button @click="open = true">{{ $buttonText ?? 'Abrir Modal' }}</button>

    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h3 class="text-lg font-bold mb-4">{{ $title ?? 'Título do Modal' }}</h3>
            <div class="mb-4">{{ $slot }}</div>
            <div class="text-right">
                <button @click="open = false" class="bg-gray-300 px-4 py-2 rounded">Fechar</button>
            </div>
        </div>
    </div>
</div>