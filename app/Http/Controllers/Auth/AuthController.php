<?php
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
        ]);

        $user = auth()->user();

        if ($user->verifyOtp($request->otp)) {
            // اجعل المستخدم "نشطًا" بعد التحقق
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();

            return redirect()->route('home')->with('success', 'OTP verified successfully!');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
