@component('mail::message')
# Introduction

@component('mail::panel')
Click for the button Active .
@endcomponent

@component('mail::button', ['url' => '/verfiy-mail/'.$email_token,'color'=>'green'])
Active 
@endcomponent




Thanks,<br>
{{ config('app.name') }}
@endcomponent
