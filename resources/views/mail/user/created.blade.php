<x-mail::message>
# 🎉 Congratulations, {{ $user->name }}! 🎉

You have been successfully registered on {{ config('app.name') }}.

Here are your login details:
- **Username:** {{ $user->email }}
- **Password:** {{ $password }}

To ensure the security of your account, we recommend that you reset your password immediately. Please click the button below to reset your password.

<x-mail::button :url="$resetPasswordUrl">
    Reset Password
</x-mail::button>

If you have any questions or need further assistance, please feel free to contact us.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>