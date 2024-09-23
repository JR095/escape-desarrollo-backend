<!-- resources/views/auth/reset.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-blue-600 p-8 rounded-lg shadow-lg">
        <h2 class="text-white text-2xl font-bold mb-6 text-center">Reset Password</h2>
        <form method="POST" action="{{ url('http://localhost/escape-desarrollo-backend/public/api/reset/password') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <input type="email" name="email" placeholder="Email" required
                       class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            </div>
            <div>
                <input type="password" name="password" placeholder="New Password" required
                       class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm New Password" required
                       class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            </div>
            <button type="submit" class="w-full py-2 px-4 mt-4 bg-orange-500 text-white font-semibold rounded-md cursor-pointer transition delay-150 duration-300 ease-in-out hover:bg-white hover:text-orange-500">
                Reset Password
            </button>
        </form>
    </div>
</body>
</html>
