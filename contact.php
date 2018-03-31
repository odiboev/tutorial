<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $message = trim($_POST["message"]);

  if($name == "" OR $email == "" OR $message == "") {
    echo "Specify a value for name, email and messege";
    exit;
  }

  foreach( $_POST as $value ){
  if( stripos($value,'Content-Type:') !== FALSE ){
    mail('admin@somehwere.com','Spammer Bot Attempt',$_SERVER['REMOTE_ADDR']);
    echo "Fatal Error Messege";
     exit("{$_SERVER['REMOTE_ADDR']} Has been Recorded");
    }
  }

  if ($_POST["address"] != "") {
    echo "Your for is made by robot you piece of fuck";
    exit();
  }

  require_once('inc/phpmailer/class.phpmailer.php');
  $mail = new PHPMailer();

  if(!$mail->ValidateAddress($email)){
    echo "Error email wrong";
    exit();
  }

    $email_body = "";
    $email_body = $email_body . "Name: " . $name . "<br>";
    $email_body = $email_body . "Email: " . $email . "<br>";
    $email_body = $email_body . "Message: " . $message;

    //$mail->IsSMTP(); // telling the class to use SMTP
    //$mail->Host       = "mail.yourdomain.com"; // SMTP server
    $mail->SMTPDebug  = 2;
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.sparkpostmail.com"; // sets the SMTP server
    $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
    $mail->Username   = "SMTP_Injection"; // SMTP account username
    $mail->Password   = "ef52c4380e0cd91e428380a8e875b7f575e5cc9e";        // SMTP account password

    $mail->SetFrom($email, $name);
    $address = "odiboev@gmail.com";
    $mail->AddAddress($address, "Cakes 4 You");
    $mail->SMTPSecure = "STARTTLS";
    $mail->Subject    = "Cakes 4 You Form Submission |" . $name;
    $mail->MsgHTML($email_body);

    if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }

    header("Location: contact.php?status=thanks"); //special variable $_GET['STATUS']
    exit();
}

?>

<?php
$pageTitle = "Contact Mike";
$section = "contact";
include('inc/header.php'); ?>
  <div class="section page">
    <div class="wrapper">
        <h1>Contact</h1>

        <?php if(isset($_GET["status"]) AND $_GET["status"] == "thanks"){ ?>
            <p>Thanks for the email. I&rsquo;ll get to you shortly. Have a good day.</p>
        <?php } else { ?>

            <p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>
            <form method="post" action="contact.php">
              <table>
                <tr>
                  <th>
                      <label for="name">Name</label>
                  </th>
                  <td>
                      <input type="text" name="name" id="name">
                  </td>
                </tr>
                <tr>
                  <th>
                      <label for="email">Email</label>
                  </th>
                  <td>
                      <input type="text" name="email" id="email">
                  </td>
                </tr>
                <tr>
                  <th>
                      <label for="message">Message</label>
                  </th>
                  <td>
                      <textarea name="message" id="message"></textarea>
                  </td>
                </tr>
                <tr style="display none">
                  <th>
                      <label for="address">Address</label>
                  </th>
                  <td>
                      <input type="text" name="address" id="address">
                      <p>Leave this table empty</p>
                  </td>
                </tr>
              </table>
              <input type="submit" value="Send">
            </form>
          <?php } ?>

    </div>
  </div>
<?php include('inc/footer.php') ?>
