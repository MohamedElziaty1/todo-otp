<form method="POST" action="{{ route('verify-otp') }}">
    @csrf
    <label for="otp">Enter OTP:</label>
    <input type="text" name="otp" id="otp" required>
    <button type="submit">Verify</button>
</form>
