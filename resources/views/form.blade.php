<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaires HTTP</title>
    <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto space-y-8">
        
        <!-- Formulaire POST -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">📝 Formulaire POST</h2>
            <form action="{{ route('submit') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Votre nom" 
                       class="border px-4 py-2 rounded w-full mb-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">
                    Envoyer (POST)
                </button>
            </form>
        </div>

        <!-- Formulaire PUT -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">🔄 Formulaire PUT</h2>
            <form action="{{ route('update', ['id' => 123]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="data" placeholder="Nouvelles données" 
                       class="border px-4 py-2 rounded w-full mb-4">
                <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded">
                    Mettre à jour (PUT)
                </button>
            </form>
        </div>

        <!-- Formulaire DELETE -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">🗑️ Formulaire DELETE</h2>
            <form action="{{ route('delete', ['id' => 456]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Confirmer la suppression ?')"
                        class="bg-red-500 text-white px-6 py-2 rounded">
                    Supprimer (DELETE)
                </button>
            </form>
        </div>

    </div>
</body>

</html>