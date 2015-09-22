
<meta charset="UTF-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>New Captche DocType</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>
if(isset($_POST['submit']))
{
  if(empty($_SESSION['6_letters_code'] ) ||
    strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
  {
      //Note: the captcha code is compared case insensitively.
      //if you want case sensitive match, update the check above to
      // strcmp()
    $errors .= "n The captcha code does not match!";
  }
 
  if(empty($errors))
  {
    //send the email
    $to = $your_email;
    $subject="New form submission";
    $from = $your_email;
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
     
    $body = "A user  $name submitted the contact form:n".
    "Name: $namen".
    "Email: $visitor_email n".
    "Message: n ".
    "$user_messagen".
    "IP: $ipn";  
     
    $headers = "From: $from rn";
    $headers .= "Reply-To: $visitor_email rn";
     
    mail($to, $subject, $body,$headers);
     
    header('Location: thank-you.html');
  }
}
</body>