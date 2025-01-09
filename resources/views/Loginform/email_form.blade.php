<form action="{{ route('verify.email.post') }}" method="POST">
    @csrf
    <label for="email">Enter your email to verify:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Verify</button>
</form>
