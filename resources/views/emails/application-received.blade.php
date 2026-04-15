<x-mail::message>
# Application Received

Dear {{ $application->name }},

Thank you for applying to Cogear. We have received your application for the **{{ $application->field_of_interest }}** program.

Our team will review your CV and message. If your profile matches our requirements, we will contact you for a brief introductory call.

**Your Application Summary:**
- **Name:** {{ $application->name }}
- **Field:** {{ $application->field_of_interest }}
- **Date:** {{ $application->created_at->format('M d, Y') }}

We appreciate your interest in joining our team.

Best regards,<br>
The Cogear Team
</x-mail::message>
