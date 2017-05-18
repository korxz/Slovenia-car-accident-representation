<?php
/**
 * Created by PhpStorm.
 * User: Rok
 * Date: 20. 04. 2017
 * Time: 20:24
 */
class sendEmail
{
    public static function preveriPodatke()
    {
        $temp = true;
        if (!isset($_POST["email"])) {
            $temp = false;
            echo $_POST["email"];
        } elseif (!isset($_POST["message"])) {
            $temp = false;
            echo $_POST["message"];
        }
        return $temp;
    }

    public static function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    public static function send()
    {
        /*  if (isset($_POST["submit"])) {
               echo "Vaše sporočilo je bilo uspešno poslano";

               $email_to = "roksilic.net@gmail.com";
               $email_subject = "Kontakt iz Prometnih nesreč";

               if(self::preveriPodatke()) {
                   $name = $_POST["name"];
                   $message = $_POST["message"];
                   $email_from = $_POST["email"];

                   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                   $string_exp = "/^[A-Za-z .'-]+$/";

                   if(!preg_match($email_exp, $email_from)) {
                       echo "E-mail naslov, ki ste ga vnesli ni pravilen.<br/>";
                   }

                   if(!preg_match($string_exp, $name)) {
                       echo "Prosimo vnesite pravilno obliko imena.<br/>";
                   }

                   if(strlen($message) < 2) {
                       echo "Prosimo vnesite besedilo, ki je daljše od 2 znakov.";
                   }

                   $email_message = "Form details below.\n\n";
                   $email_message = "Ime in Priimek: " . self::clean_string($name);
                   $email_message = "Pošiljatelj: " . self::clean_string($email_from);
                   $email_message = "Vsebina: " . self::clean_string($message);

                   $headers = 'From: '.$email_from."\r\n".
                       'Reply-To: '.$email_from."\r\n" .
                       'X-Mailer: PHP/' . phpversion();
                   @mail($email_to, $email_subject, $email_message, $headers);
               }
           } */

        if (isset($_POST['submit']) && !empty($_POST['submit'])):
            if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
                //your site secret key
                $secret = 'APIKEY';
                //get verify response data
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
                $responseData = json_decode($verifyResponse);
                if ($responseData->success):
                    //contact form submission code
                    $name = !empty($_POST['name']) ? $_POST['name'] : '';
                    $email = !empty($_POST['email']) ? $_POST['email'] : '';
                    $message = !empty($_POST['message']) ? $_POST['message'] : '';

                    $to = 'YOUREMAIL';
                    $subject = 'New contact form have been submitted';
                    $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>" . $name . "</p>
                <p><b>Email: </b>" . $email . "</p>
                <p><b>Message: </b>" . $message . "</p>
            ";
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    $headers .= 'From:' . $name . ' <' . $email . '>' . "\r\n";
                    //send email
                    @mail($to, $subject, $htmlContent, $headers);

                    $succMsg = 'Your contact request have submitted successfully.';
                else:
                    $errMsg = 'Robot verification failed, please try again.';
                endif;
            else:
                $errMsg = 'Please click on the reCAPTCHA box.';
            endif;
        else:
            $errMsg = '';
            $succMsg = '';
        endif;


    }
}
?>