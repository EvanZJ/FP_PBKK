@component('mail::message')
# Welcome New Member

Welcome to IKAE!. Don't Forget to verify your email before you go shopping with this account.

@component('mail::button', ['url' => '', 'color'=>'success'])
Verify email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
