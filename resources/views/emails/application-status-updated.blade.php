<x-mail::message>
# Application Status Updated

Dear {{ $application->name }},

We wanted to provide you with an update regarding your application for the **{{ $application->field_of_interest }}** program at Cogear.

The status of your application has been updated to: **{{ ucwords($application->status) }}**.

@if($application->admin_notes)
**Message from the Team:**  
{{ $application->admin_notes }}
@endif

If you have any questions, feel free to reply to this email.

Best regards,<br>
The Cogear team
</x-mail::message>
