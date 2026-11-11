<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Sports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="min-h-screen grid md:grid-cols-2">

        <!-- Left Side: Gaming Design -->
        <div class="bg-slate-900 text-white flex flex-col justify-center px-10 py-12 md:px-16">

            <p class="text-sm font-bold tracking-widest text-cyan-400 mb-4">
                GAMING COMMUNITY
            </p>

            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-5">
                LEVEL UP <br>
                YOUR GAME.
            </h1>

            <p class="text-slate-400 leading-relaxed max-w-md">
                Welcome back to our gaming community.
                Connect with other gamers and continue your gaming journey.
            </p>

            <div class="mt-8">
                <p class="text-slate-300 font-semibold">
                    E-Sports Gamer Management System
                </p>
                <p class="text-slate-500 text-sm mt-1">
                    Play. Connect. Achieve.
                </p>
            </div>

        </div>

        <!-- Right Side: Login Form -->
        <div class="flex items-center justify-center px-6 py-12">

            <div class="bg-white w-full max-w-md p-8 rounded-lg shadow-sm">

                <h1 class="text-2xl font-bold mb-2 text-slate-900">
                    Welcome Back
                </h1>

                <p class="text-gray-500 mb-6 text-sm">
                    Login to your E-Sports account
                </p>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Email Address
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Enter your password"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required>
                    </div>

                    <button type="submit"
                        onclick="this.disabled = true; this.innerText = 'Logging in...'; this.form.submit();"
                        class="w-full bg-slate-900 text-white py-2.5 rounded-md font-semibold hover:bg-slate-700 transition disabled:opacity-50">
                        Login
                    </button>

                </form>

                <p class="text-center text-sm mt-6 text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:underline">
                        Register here
                    </a>
                </p>

            </div>

        </div>

    </div>

</body>

</html>