<?php

// Collect form data.
$first = htmlspecialchars($_POST['first'] ?? '');
$last = htmlspecialchars($_POST['last'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$phone = htmlspecialchars($_POST['phone'] ?? '');
$type = htmlspecialchars($_POST['type'] ?? '');
$area = htmlspecialchars($_POST['area'] ?? '');
$satisfaction = htmlspecialchars($_POST['satisfaction'] ?? '');
$message = htmlspecialchars($_POST['message'] ?? '');
$date = htmlspecialchars($_POST['date'] ?? '');

// Format message.
$formattedMessage = '';
$paragraphs = explode("\n", trim($message));
foreach ($paragraphs as $paragraph) {
    if (trim($paragraph)) {
        $formattedMessage .= '<p>' . htmlspecialchars($paragraph) . '</p>';
    }
}

// Compose feedback message.
$messageToBusiness = <<<EOF
<b>Client:</b> $first $last ($email)<br>
<b>Phone:</b> $phone<br>
<b>Classification:</b> $type<br>
<b>Area:</b> $area<br>
<b>Satisfaction:</b> $satisfaction<br>
<b>Date:</b> $date<br>
<br>
$formattedMessage
EOF;

// Compose acknowledgement message.
$messageToClient = <<<EOF
Dear $first,

<p>
    Thank you so much for submitting feedback! For your convenience, we have
    attached a copy of the message we received.
</p>

<hr>
<blockquote>$messageToBusiness</blockquote>
<hr>

<p>Best Regards,</p>
<p>
    Joseph Leskey<br>
    Authorial Amenities
</p>
EOF;

// Construct email headers.
$emailHeaders = array(
    'MIME-Version' => '1.0',
    'Content-Type' => 'text/html; charset=utf-8',
    'X-Mailer' => 'PHP' . phpversion(),
);
$emailHeaderForBusiness = array(
    'From' => "$first $last <$email>",
);
$emailHeaderForClient = array(
    'From' => "Authorial Amenities <josleskey+aa@mail.mvnu.edu>",
);

// Send feedback to business.
mail(
    "josleskey+aa@mail.mvnu.edu",
    "Feedback on $area",
    $messageToBusiness,
    array_merge($emailHeaders, $emailHeaderForBusiness)
);

// Send copy to client.
mail(
    $email,
    "Thank you for your feedback!",
    $messageToClient,
    array_merge($emailHeaders, $emailHeaderForClient)
);

// Log message.
// Due to permission issues, we assume that the directory has already
// been made and has the correct permissions.
$feedbackLogFolder = __DIR__ . '/../logs/';
$feedbackLogName = 'feedback.log';
$feedbackLogPath = "$feedbackLogFolder/$feedbackLogName";
$feedbackDate = date('c');
$feedbackEntry = <<<EOF
\n\n[$feedbackDate]

Feedback received from $email
First: $first
Last:  $last
Phone: $phone
Type:  $type
Area:  $area
Date:  $date
Satis: $satisfaction

$message\n
EOF;
file_put_contents($feedbackLogPath, $feedbackEntry, FILE_APPEND);

?>
