<x-mail::message>
# New Contact Inquiry

You have received a new message from the Cogear website contact form.

**From:** {{ $data['name'] }} ({{ $data['email'] }})  
**Subject:** {{ $data['subject'] }}

**Message:**  
{{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
