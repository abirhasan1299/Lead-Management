<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You for Registering – University Credit Transfer</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding: 30px 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); overflow: hidden;">

                <!-- Header -->
                <tr style="background-color: #4a90e2;">
                    <td align="center" style="padding: 30px;">
                        <h1 style="color: #ffffff; margin: 0;">SYS Academy</h1>
                        <p style="color: #dce6f6; font-size: 16px; margin-top: 8px;">Helping You Complete Your Degree Faster</p>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding: 30px; color: #333;">
                        <h2 style="margin-top: 0;">Thank You for Registering – University Credit Transfer</h2>

                        <p>Dear <strong>{{ $data['name'] ?? 'Student' }}</strong>,</p>

                        <p>Thank you for registering your interest in the <strong>University Credit Transfer Program</strong> through our website.</p>

                        <p>We have successfully received your details, and our academic counselors will review your submission shortly. Below are the next steps in the process:</p>

                        <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;">

                        <h3 style="color: #4a90e2; margin-bottom: 10px;">📌 What Happens Next?</h3>

                        <ol style="padding-left: 18px; color: #555;">
                            <li><strong>Profile Review</strong><br>
                                Our team will verify your academic background and the credits you’ve earned so far.
                            </li>
                            <li><strong>Course Mapping & Eligibility</strong><br>
                                We’ll match your completed subjects with recognized universities to determine eligible transfer options.
                            </li>
                            <li><strong>Counseling Session</strong><br>
                                You will receive a call or email from our counselor within 24–48 hours to explain suitable universities, programs, and timelines.
                            </li>
                            <li><strong>Document Submission</strong><br>
                                Upon confirmation, you’ll be asked to submit academic transcripts, marksheets, and any other required documents.
                            </li>
                        </ol>

                        <h4 style="color: #4a90e2; margin-top: 30px;">📁 Documents You May Need to Keep Ready:</h4>
                        <ul style="padding-left: 20px; color: #555;">
                            <li>10th & 12th Mark Sheets (Scanned Copy)</li>
                            <li>Previous University Semester Mark Sheets / Transcripts</li>
                            <li>Government ID Proof</li>
                            <li>Passport-size Photo</li>
                        </ul>

                        <p style="margin-top: 30px;">For any queries or faster response, feel free to contact us at:</p>

                        <p style="font-size: 16px; color: #4a90e2; font-weight: bold;">
                            📞 +91 85898 44434
                        </p>

                        <p style="margin-top: 40px;">Warm Regards,<br><strong>SYS Academy</strong></p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center" style="padding: 20px; background-color: #f0f0f0; font-size: 13px; color: #888;">
                        &copy; {{ date('Y') }} SYS Academy. All rights reserved.
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
