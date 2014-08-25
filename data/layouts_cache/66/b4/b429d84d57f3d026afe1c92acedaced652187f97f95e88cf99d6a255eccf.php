<?php

/* applications/users/layouts/registration.html */
class __TwigTemplate_66b4b429d84d57f3d026afe1c92acedaced652187f97f95e88cf99d6a255eccf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'menu' => array($this, 'block_menu'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/wrapper_index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Регистрация");
    }

    // line 4
    public function block_css($context, array $blocks = array())
    {
        // line 5
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "reg.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    <script type =\"text/javascript\" src=\"/source/js/masked_input.js\"></script>
    <script type =\"text/javascript\" src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "reg.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 11
    public function block_menu($context, array $blocks = array())
    {
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo \layout::func_from_text("    <div class=\"container\">
        <form id=\"regForm\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\"><b>Регистрация</b></div>
                <div class=\"panel-body\">
                    <div class=\"alert alert-danger reg_erroru\" error=\"global\"></div>
                    <div class=\"alert alert-success\" error=\"success\" style=\"display: none;\"></div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label for=\"email\">Email <span error=\"email\" class=\"reg_erroru\"></span></label>
                            <input type=\"text\" name=\"email\" id=\"email\" maxlength=\"60\" class=\"form-control\" tabindex=\"1\" value=\"");
        // line 23
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true));
        echo \layout::func_from_text("\" autocomplete=\"off\">
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label for=\"password1\">Пароль <span error=\"password1\" class=\"reg_erroru\"></span></label>
                            <input type=\"password\" name=\"password1\" id=\"password1\" maxlength=\"60\" class=\"form-control\" autocomplete=\"off\">
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label for=\"nickname\">Ник <span error=\"nickname\" class=\"reg_erroru\"></span></label>
                            <input type=\"text\" name=\"nickname\" id=\"nickname\" maxlength=\"60\" class=\"form-control\" tabindex=\"2\">
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label for=\"password2\">Повтор пароля <span error=\"password2\" class=\"reg_erroru\"></span></label>
                            <input type=\"password\" name=\"password2\" id=\"password2\" maxlength=\"60\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label for=\"last_name\">Фамилия <span error=\"last_name\" class=\"reg_erroru\"></span></label>
                            <input type=\"text\" name=\"last_name\" id=\"last_name\" maxlength=\"60\" class=\"form-control\" tabindex=\"3\">
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label for=\"birthday\">Дата Рождения <span error=\"birthday\" class=\"reg_erroru\"></span></label>
                            <input type=\"text\" name=\"birthday\" id=\"birthday\" maxlength=\"60\" class=\"form-control\">
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label for=\"first_name\">Имя <span error=\"first_name\" class=\"reg_erroru\"></span></label>
                            <input type=\"text\" name=\"first_name\" id=\"first_name\" maxlength=\"60\" class=\"form-control\" tabindex=\"4\">
                        </div>
                    </div>
                    <div class=\"col-xs-6\">
                        <div class=\"form-group\">
                            <label>Пол <span error=\"gender\" class=\"reg_erroru\"></span></label>
                            <div class=\"form-group\">
                                <label for=\"gender_m\" style=\"font-weight: normal;\">Мужской</label>
                                <input type=\"radio\" name=\"gender\" id=\"gender_m\" value=\"m\" class=\"radio\" checked>
                                  &nbsp;&nbsp;
                                <label for=\"gender_w\" style=\"font-weight: normal;\">Женский</label>
                                <input type=\"radio\" name=\"gender\" id=\"gender_w\" value=\"f\" class=\"radio\">
                            </div>
                        </div>
                    </div>
                    <div class=\"col-xs-12\">
                        <div class=\"form-group\">
                            <label for=\"tz\">Часовой пояс <span error=\"tz\" class=\"reg_erroru\"></span></label>
                            <select id=\"tz\" name=\"tz\" class=\"form-control\">
                                ");
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tz"]) ? $context["tz"] : null));
        foreach ($context['_seq'] as $context["k"] => $context["t"]) {
            // line 79
            echo \layout::func_from_text("                                    <option ");
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "tzOffset") == (isset($context["k"]) ? $context["k"] : null))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(" title=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
            echo \layout::func_from_text("\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
            echo \layout::func_from_text("\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
            echo \layout::func_from_text("</option>
                                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo \layout::func_from_text("                            </select>
                        </div>
                    </div>
                    <div class=\"col-xs-12\" style=\"vertical-align: top !important;padding-top:5px;\" id=\"registration_captcha\">
                        ");
        // line 85
        echo \layout::func_from_text((isset($context["captcha"]) ? $context["captcha"] : null));
        echo \layout::func_from_text("
                    </div>
                    <div class=\"col-xs-12\" style=\"margin-top: 30px;\">
                        <a href=\"#\" id=\"sendReg\" class=\"btn btn-primary\"><span>Зарегистрироваться</span></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
");
    }

    public function getTemplateName()
    {
        return "applications/users/layouts/registration.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 85,  159 => 81,  142 => 79,  138 => 78,  80 => 23,  68 => 13,  65 => 12,  60 => 11,  54 => 9,  51 => 8,  48 => 7,  41 => 5,  38 => 4,  32 => 3,);
    }
}
