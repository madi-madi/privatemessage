@component('mail::message')
# Introduction

The body of your message.
 <h2>{{$message}}</h2>
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
