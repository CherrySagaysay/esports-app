<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Sports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="min-h-screen grid md:grid-cols-2">

        <div class="bg-slate-900 text-white flex flex-col justify-center px-10 py-12 md:px-16">

            <p class="text-sm font-bold tracking-widest text-cyan-400 mb-4">
                GAMING COMMUNITY
            </p>

            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-5">
                LEVEL UP <br>
                YOUR GAME.
            </h1>

            <p class="text-slate-400 leading-relaxed max-w-md">
                Join our gaming community and connect with other gamers.
                Create your account and showcase your gaming journey.
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

        <div class="flex items-center justify-center px-6 py-12">

            <div class="bg-white w-full max-w-md p-8 rounded-lg shadow-sm">

                <h1 class="text-2xl font-bold mb-2 text-slate-900">
                    Create Account
                </h1>

                <p class="text-gray-500 mb-6 text-sm">
                    Register to access the E-Sports system
                </p>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Full Name
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Email Address
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Enter your password"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Confirm Password
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Confirm your password"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required>
                    </div>

                    <button type="submit"
                        onclick="this.disabled = true; this.innerText = 'Registering...'; this.form.submit();"
                        class="w-full bg-slate-900 text-white py-2.5 rounded-md font-semibold hover:bg-slate-700 transition disabled:opacity-50">
                        Register
                    </button>

                </form>

                <p class="text-center text-sm mt-6 text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:underline">
                        Login here
                    </a>
                </p>

            </div>

        </div>

    </div>

</body>

</html>