<?php
namespace feedback;

class feedback extends \Controller {

    function default_method()
    {
        switch($_POST['act'])
        {
            case "get_form":
                $this->get_form();
                break;
            case "send_feedback":
                $this->send_feedback();
                break;
            default: $this->show();
        }
    }

    function show()
    {
        $captcha = $this->get_controller("captcha")->get_captcha(6);
        $this->layout_show("form_page.html",array('captcha' => $captcha));
    }

    function show_form()
    {
        $captcha = $this->get_controller("captcha")->get_captcha(6);
        return $this->layout_get("form.html",array('captcha' => $captcha));
    }

    function get_button()
    {
        return $this->layout_get("button.html");
    }

    function get_form()
    {
        $captcha = $this->get_controller("captcha")->get_captcha(6);
        $res['success'] = $this->layout_get("form.html",array('captcha' => $captcha));
        echo json_encode($res);
    }

    function send_feedback()
    {
        if ($_POST['fio'] == "") $res['error']['fio'] = "Укажите Ваши ФИО";
        if ($_POST['email'] == "") $res['error']['email'] = "Укажите Ваш E-mail";
        else if (!check_mail($_POST['email'])) $res['error']['email'] = "Укажите правильный E-mail";
        if ($_POST['text'] == "") $res['error']['text'] = "Пустое сообщение";
        if ($_SESSION['captcha'][$_POST['id_captcha']] != $_POST['captcha']) $res['error']['captcha'] = "Неверная картинка";
        $message = $this->layout_get("mail.html",$_POST);

        if (!$res['error'])
        {
            if (send_mail($_POST['email'], get_setting("email"), "Телеком Альянс. Сообщение c сайта", $message, $_POST['email'])) $res['success'] = true;
            else $res['error']['text'][] = "При отправке сообщения возникла ошибка";
        }

        if ($res['error'])
        {
            $captcha = $this->get_controller("captcha")->get_captcha(6);
            $res['error']['captcha_html'] = $captcha;
        }

        echo json_encode($res);
    }
}

