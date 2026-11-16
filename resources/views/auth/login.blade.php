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

                <h1 class="text-2xl font-bold mb-2 text-center text-slate-900">
                    Welcome Back
                </h1>

                <p class="text-gray-500 mb-6 text-sm text-center">
                    Log into E-Sports account
                </p>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Email Address
                        </label>
                        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                            class="w-full border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-md px-3 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                            required>

                        @error('email')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-1 font-medium text-sm text-gray-700">
                            Password
                        </label>

                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Enter your password"
                                class="w-full border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-md px-3 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                                required>

                            <button type="button" onclick="
                                    const password = document.getElementById('password');
                                    const eye = document.getElementById('eye-icon');
                                    const eyeOff = document.getElementById('eye-off-icon');
                            
                                    if (password.type === 'password') {
                                        password.type = 'text';
                                        eye.classList.remove('hidden');
                                        eyeOff.classList.add('hidden');
                                    } else {
                                        password.type = 'password';
                                        eye.classList.add('hidden');
                                        eyeOff.classList.remove('hidden');
                                    }
                                "
                                class="absolute inset-y-0 right-3 flex items-center text-gray-600 hover:text-gray-900">
                                {{-- Eye without crossout: visible --}}
                                <svg id="eye-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="22"
                                    height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>

                                {{-- Eye with crossout: hidden --}}
                                <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 3l18 18" />
                                    <path d="M2 12s3.5-7 10-7c2 0 3.8.6 5.3 1.5" />
                                    <path d="M22 12s-3.5 7-10 7c-2 0-3.8-.6-5.3-1.5" />
                                </svg>
                            </button>
                        </div>

                        @error('password')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit"
                        onclick="this.disabled = true; this.innerText = 'Logging in...'; this.form.submit();"
                        class="w-full bg-slate-900 text-white py-2.5 rounded-md font-semibold hover:bg-slate-700 transition disabled:opacity-50">
                        Log in
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