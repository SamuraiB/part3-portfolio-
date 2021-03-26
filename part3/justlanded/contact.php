<?php

function get_settings($in)
{
    if (is_file($in))
        return include $in;
    return false;
}

function get_real_ip()
{
    if (isset($_SERVER["HTTP_CLIENT_IP"])) {
        return $_SERVER["HTTP_CLIENT_IP"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
        return $_SERVER["HTTP_X_FORWARDED"];
    } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
        return $_SERVER["HTTP_FORWARDED"];
    } else {
        return $_SERVER["REMOTE_ADDR"];
    }
}

$settings = get_settings("site.settings.php");


if (!isset($_POST['s'])) {
    @$action = trim(strtolower($_GET['action']));

    if ($action == "captcha") // generate basic captcha challenge
    {
        $i1 = intval(mt_rand(0, 6));
        $i2 = intval(mt_rand(0, 6));
        $i3 = intval(mt_rand(0, 3));
        $io = intval(mt_rand(0, 1)) + 1;
        if ($io == 1) $o = "+"; else $o = "-";
        if ($i1 < $i2) $i1 = $i2 + $i3;
        if ($o == "+") $r = $i1 + $i2; else $r = $i1 - $i2;

        $captcha['i1'] = $i1;
        $captcha['i2'] = $i2;
        $captcha['o'] = $o;
        $captcha['s'] = str_rot13(base64_encode($i1 . "," . $i2 . "," . $o . "," . $r . "," . get_real_ip())); // Let's add some security by obscurity

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($captcha);
        exit();
    }
} else {
    $messages = Array();
    // basic validation
    if (trim(@$_POST['name']) == "") $messages[] = "You need to enter your name.";
    if (trim(@$_POST['email']) == "") $messages[] = "You need to enter a valid email address.";
    if (trim(@$_POST['message']) == "") $messages[] = "You cannot send an empty message.";
    if (trim(@$_POST['humanornot']) == "") $messages[] = "You must verify that you are not a robot.";
    if (trim(@$_POST['s']) == "") $messages[] = "Invalid request.";

    if (count($messages) == 0) {
        @$s = explode(",", base64_decode(str_rot13(trim($_POST['s']))));
        @$i1 = $s[0];
        @$i2 = $s[1];
        @$o = $s[2];
        @$r = $s[3];
        @$ip = $s[4];

        if ($o == "+") {
            $r_calc = $i1 + $i2;
        } else {
            $r_calc = $i1 - $i2;
        }

        if ($r_calc != @$_POST['humanornot'] || $r_calc != $r || get_real_ip() != trim($ip)) {
            $messages[] = "Sorry, you did not enter the correct answer to the captcha challenge. Please try again.";
        }

        if (count($messages) == 0) {
            $headers = array();
            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-type: text/plain; charset=iso-8859-1";
            $headers[] = "From: " . trim(@$_POST['name']) . " <" . trim(@$_POST['email']) . ">";
            $headers[] = "X-Mailer: ShapingRain FormMailer on PHP/" . phpversion();
            $recipient = $settings['form_email'];
            
            $subject   = "Message sent through your contact form.";
            $message   = strip_tags(stripslashes($_POST['message']));
            
            @mail($recipient, $subject, $message, implode("\r\n", $headers));
            $status = 200;
        } else {
            $status = 404;
        }

        $response = Array();
        $response['status'] = $status;
        $response['messages'] = $messages;

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode($response);
        exit();
    }
}

