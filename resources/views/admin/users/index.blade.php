@extends('layouts.app')

@section('title', 'Gerenciar Administradores')

@section('content')

<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Administradores Registrados</h1>

```
<ul class="space-y-4">
    @foreach($admins as $admin)
    <li class="bg-white p-4 rounded shadow flex justify-between items-center">
        <div>
            <h2 class="font-bold">{{ $admin->name }}</h2>
            <p>Email: {{ $admin->email }}</p>
        </div>

        <div class="space-x-2">
            <a href="{{ route('admin.admins.edit', $admin->id) }}"
               class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
               Editar
            </a>

            <form method="POST" action="{{ route('admin.admins.destroy', $admin->id) }}" class="inline">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                    onclick="return confirm('Tem certeza que deseja remover este admin?')">
                    Remover
                </button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
```

</div>
@endsection
