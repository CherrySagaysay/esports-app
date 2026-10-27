<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Esports Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-950 text-slate-100">

    <div class="min-h-screen">

        <!-- Header -->
        <header class="border-b border-slate-800 bg-slate-900">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest text-cyan-400">
                        Gaming Community
                    </p>
                    <h1 class="mt-1 text-2xl font-bold">
                        Esports Dashboard
                    </h1>
                </div>

                <div
                    class="rounded-xl border border-cyan-400/20 bg-cyan-400/10 px-4 py-2 text-sm font-medium text-cyan-300">
                    Gamer Records
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-6 py-10">

            <!-- Page Heading -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold tracking-tight">
                    Gamer Relationships
                </h2>
                <p class="mt-2 text-slate-400">
                    Explore gamers, their gaming rigs, achievements, and favorite games.
                </p>
            </div>

            <!-- Summary Cards -->
            <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                    <p class="text-sm text-slate-400">Total Gamers</p>
                    <p class="mt-3 text-3xl font-bold text-white">
                        {{ $gamers->count() }}
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                    <p class="text-sm text-slate-400">Gaming Rigs</p>
                    <p class="mt-3 text-3xl font-bold text-cyan-400">
                        {{ $gamers->filter(fn($gamer) => $gamer->gamingRig)->count() }}
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                    <p class="text-sm text-slate-400">Achievements</p>
                    <p class="mt-3 text-3xl font-bold text-violet-400">
                        {{ $gamers->sum(fn($gamer) => $gamer->achievements->count()) }}
                    </p>
                </div>

                <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                    <p class="text-sm text-slate-400">Game Connections</p>
                    <p class="mt-3 text-3xl font-bold text-emerald-400">
                        {{ $gamers->sum(fn($gamer) => $gamer->games->count()) }}
                    </p>
                </div>

            </div>


            <!-- Add Gamer Form -->
            @if (session('success'))
                <div
                    class="mb-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-5 py-4 text-sm font-medium text-emerald-300">
                    {{ session('success') }}
                </div>
            @endif

            <div
                class="mb-8 overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 shadow-xl shadow-black/20">

                <div class="border-b border-slate-800 px-6 py-5">
                    <h3 class="text-lg font-bold">Register New Gamer</h3>
                    <p class="mt-1 text-sm text-slate-400">
                        Add gamer information and connect their gaming relationships.
                    </p>
                </div>

                <form action="{{ route('gamers.store') }}" method="POST" class="space-y-6 p-6">
                    @csrf

                    @if ($errors->any())
                        <div class="rounded-xl border border-red-400/20 bg-red-400/10 p-4">
                            <p class="mb-2 font-semibold text-red-300">
                                Please check your input:
                            </p>

                            <ul class="list-inside list-disc space-y-1 text-sm text-red-300">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Gamer Information -->
                    <div>
                        <h4 class="mb-4 font-semibold text-cyan-400">
                            01. Gamer Information
                        </h4>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                            <div>
                                <label for="name" class="mb-2 block text-sm font-medium text-slate-300">
                                    Full Name
                                </label>
                                <input type="text" id="name" name="name" placeholder="Enter gamer name"
                                    class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20">
                            </div>

                            <div>
                                <label for="gamer_tag" class="mb-2 block text-sm font-medium text-slate-300">
                                    Gamer Tag
                                </label>
                                <input type="text" id="gamer_tag" name="gamer_tag" placeholder="e.g. CherryPlays"
                                    class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20">
                            </div>

                        </div>
                    </div>

                    <!-- Gaming Rig -->
                    <div class="border-t border-slate-800 pt-6">
                        <h4 class="mb-4 font-semibold text-cyan-400">
                            02. Gaming Rig
                        </h4>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                            <div>
                                <label for="pc_name" class="mb-2 block text-sm font-medium text-slate-300">
                                    PC Name
                                </label>
                                <input type="text" id="pc_name" name="pc_name" placeholder="e.g. My Gaming PC"
                                    class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20">
                            </div>

                            <div>
                                <label for="specs" class="mb-2 block text-sm font-medium text-slate-300">
                                    PC Specifications
                                </label>
                                <input type="text" id="specs" name="specs" placeholder="e.g. Ryzen 5, 16GB RAM"
                                    class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none transition focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20">
                            </div>

                        </div>
                    </div>

                    <!-- Achievements -->
                    <div class="border-t border-slate-800 pt-6">
                        <h4 class="mb-2 font-semibold text-violet-400">
                            03. Achievements
                        </h4>

                        <p class="mb-4 text-sm text-slate-400">
                            Add achievements for this gamer. Leave blank if there are none.
                        </p>

                        <div class="space-y-3">
                            <input type="text" name="achievements[]" placeholder="e.g. Tournament Champion"
                                class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none focus:border-violet-400">

                            <input type="text" name="achievements[]" placeholder="e.g. MVP"
                                class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-3 text-white placeholder-slate-500 outline-none focus:border-violet-400">
                        </div>
                    </div>

                    <!-- Games -->
                    <div class="border-t border-slate-800 pt-6">
                        <h4 class="mb-2 font-semibold text-emerald-400">
                            04. Games
                        </h4>

                        <p class="mb-4 text-sm text-slate-400">
                            Select the games this gamer plays.
                        </p>

                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($games as $game)
                                <label
                                    class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-700 bg-slate-950 p-4 transition hover:border-emerald-400">
                                    <input type="checkbox" name="games[]" value="{{ $game->id }}"
                                        class="h-4 w-4 accent-emerald-400">

                                    <span>
                                        <span class="block font-medium text-white">
                                            {{ $game->title }}
                                        </span>
                                        <span class="mt-1 block text-xs text-emerald-400">
                                            {{ $game->genre }}
                                        </span>
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="border-t border-slate-800 pt-6">
                        <button type="submit"
                            class="rounded-xl bg-cyan-400 px-6 py-3 font-semibold text-slate-950 transition hover:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-slate-900">
                            Save Gamer
                        </button>

                    </div>

                </form>
            </div>

            <!-- Gamers Table -->
            <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900 shadow-xl shadow-black/20">

                <div class="border-b border-slate-800 px-6 py-5">
                    <h3 class="text-lg font-bold">Registered Gamers</h3>
                    <p class="mt-1 text-sm text-slate-400">
                        One-to-One · One-to-Many · Many-to-Many
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[900px] text-left text-sm">

                        <thead class="bg-slate-800/70 text-xs uppercase tracking-wider text-slate-400">
                            <tr>
                                <th class="px-6 py-4">Gamer</th>
                                <th class="px-6 py-4">Gaming Rig</th>
                                <th class="px-6 py-4">Achievements</th>
                                <th class="px-6 py-4">Games</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-800">

                            @forelse ($gamers as $gamer)
                                <tr class="transition hover:bg-slate-800/50">

                                    <!-- Gamer -->
                                    <td class="px-6 py-5 align-top">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-cyan-400/10 font-bold text-cyan-300">
                                                {{ strtoupper(substr($gamer->name, 0, 1)) }}
                                            </div>

                                            <div>
                                                <p class="font-semibold text-white">
                                                    {{ $gamer->name }}
                                                </p>
                                                <p class="mt-1 text-slate-400">
                                                    {{ '@' . $gamer->gamer_tag }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- One-to-One -->
                                    <td class="px-6 py-5 align-top">
                                        @if ($gamer->gamingRig)
                                            <p class="font-medium text-cyan-300">
                                                {{ $gamer->gamingRig->pc_name }}
                                            </p>
                                            <p class="mt-2 max-w-xs whitespace-normal text-slate-400">
                                                {{ $gamer->gamingRig->specs ?? 'No specifications provided' }}
                                            </p>
                                        @else
                                            <span class="text-slate-500">No rig registered</span>
                                        @endif
                                    </td>

                                    <!-- One-to-Many -->
                                    <td class="px-6 py-5 align-top">
                                        <div class="flex flex-col items-start gap-2">
                                            @forelse ($gamer->achievements as $achievement)
                                                <span
                                                    class="rounded-lg border border-violet-400/20 bg-violet-400/10 px-3 py-1.5 text-violet-300">
                                                    {{ $achievement->title }}
                                                </span>
                                            @empty
                                                <span class="text-slate-500">No achievements</span>
                                            @endforelse
                                        </div>
                                    </td>

                                    <!-- Many-to-Many -->
                                    <td class="px-6 py-5 align-top">
                                        <div class="flex flex-col items-start gap-2">
                                            @forelse ($gamer->games as $game)
                                                <div class="rounded-lg bg-slate-800 px-3 py-2">
                                                    <p class="font-medium text-white">
                                                        {{ $game->title }}
                                                    </p>
                                                    <p class="mt-1 text-xs text-emerald-400">
                                                        {{ $game->genre }}
                                                    </p>
                                                </div>
                                            @empty
                                                <span class="text-slate-500">No games connected</span>
                                            @endforelse
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <p class="font-medium text-slate-300">
                                            No gamers found
                                        </p>
                                        <p class="mt-2 text-slate-500">
                                            Gamer records will appear here once registered.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="border-t border-slate-800 px-6 py-4 text-sm text-slate-500">
                    Showing {{ $gamers->count() }} gamer record(s)
                </div>

            </div>

            <!-- Relationship Legend -->
            <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-3">

                <div class="rounded-xl border border-cyan-400/20 bg-cyan-400/5 p-4">
                    <p class="font-semibold text-cyan-300">01 · One-to-One</p>
                    <p class="mt-2 text-sm text-slate-400">
                        Each gamer has one gaming rig.
                    </p>
                </div>

                <div class="rounded-xl border border-violet-400/20 bg-violet-400/5 p-4">
                    <p class="font-semibold text-violet-300">02 · One-to-Many</p>
                    <p class="mt-2 text-sm text-slate-400">
                        Each gamer can earn multiple achievements.
                    </p>
                </div>

                <div class="rounded-xl border border-emerald-400/20 bg-emerald-400/5 p-4">
                    <p class="font-semibold text-emerald-300">03 · Many-to-Many</p>
                    <p class="mt-2 text-sm text-slate-400">
                        Each gamer can be connected to multiple games.
                    </p>
                </div>

            </div>

        </main>

        <footer class="mt-10 border-t border-slate-800 px-6 py-5 text-center text-sm text-slate-500">
            Esports Dashboard · Laravel Eloquent Relationships
        </footer>

    </div>

</body>

</html>