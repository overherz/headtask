<?php

/* applications\users\layouts\user.html */
class __TwigTemplate_d13f6bb8cfc6e429e58a939baefd875b9077b62b33dc049ebc7c009ce343662f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'context' => array($this, 'block_context'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text(" ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname"), "html", null, true));
    }

    // line 3
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"/source/css/jcrop/jquery.Jcrop.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        // line 5
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "users.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("<script type =\"text/javascript\" src=\"/source/js/jquery.Jcrop.min.js\"></script>
<script type =\"text/javascript\" src=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "users", 1 => "edit.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script type =\"text/javascript\" src=\"/source/js/jquery.form.js\"></script>
<script type =\"text/javascript\" src=\"/source/js/jquery.color.js\"></script>
<script>
    \$(document).ready(function(\$)
    {
        \$(\".nav li\").removeClass(\"active\");
    });
</script>
");
    }

    // line 20
    public function block_context($context, array $blocks = array())
    {
        // line 21
        echo \layout::func_from_text("<table class=\"table\" style=\"margin-top: -10px;background: transparent;\">
    <tr>
        <td style=\"width: 1px;padding: 0px;vertical-align: top !important;border-top:none;\">
            <img id=\"avatar\" style=\"margin-top: -15px;\" src=\"");
        // line 24
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar")) {
            echo \layout::func_from_text("/uploads/users/ava_profile/");
            echo \layout::func_from_text(twig_escape_filter($this->env, real_path($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar")), "html", null, true));
        } else {
            echo \layout::func_from_text("/source/images/no-ava-profile");
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gender") == "f")) {
                echo \layout::func_from_text("_f");
            }
            echo \layout::func_from_text(".jpg");
        }
        echo \layout::func_from_text("\"/>
            ");
        // line 25
        if (($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user") && ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
            // line 26
            echo \layout::func_from_text("                <div style=\"margin: 5px 0;\"><a href=\"\" change_avatar class=\"btn btn-primary\">Редактировать фотографию</a></div>
                <div style=\"margin: 5px 0;\"><a href=\"/users/edit/\" class=\"btn btn-primary\">Редактировать профиль</a></div>
            ");
        }
        // line 29
        echo \layout::func_from_text("        </td>
        <td style=\"border-top:none;vertical-align: top !important;\">
            <a href=\"\" style=\"font-weight: bold;font-size: 20px;\">");
        // line 31
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</a>
            ");
        // line 32
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_user_action") >= $this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "time"))) {
            // line 33
            echo \layout::func_from_text("                <div class=\"user_online\" style=\"display: inline;\"></div>
            ");
        } else {
            // line 35
            echo \layout::func_from_text("                <div class=\"user_offline\" style=\"display: inline;\"></div>
            ");
        }
        // line 37
        echo \layout::func_from_text("            <div class=\"nickname\" style=\"font-size: 14px;\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("</div>
            <table class=\"table table-striped\" style=\"margin-top: 20px;\">
                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;border-top: none;\">Группа:</td>
                    <td style=\"text-align: justify;border-top:none;color:");
        // line 41
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("</td>
                </tr>
                ");
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profile"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 44
            echo \layout::func_from_text("                ");
            if ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name") != "avatar") && ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value") != ""))) {
                // line 45
                echo \layout::func_from_text("                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;\">");
                // line 46
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "alias"), "html", null, true));
                echo \layout::func_from_text(":</td>
                    <td style=\"text-align: justify;\">
                        ");
                // line 48
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name") == "skypename")) {
                    // line 49
                    echo \layout::func_from_text("                        <script type=\"text/javascript\" src=\"/source/js/skypeCheck.js\"></script>
                        <a href=\"skype:");
                    // line 50
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("?chat\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("</a>
                        ");
                } else {
                    // line 52
                    echo \layout::func_from_text("                        ");
                    echo \layout::func_from_text(nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true)));
                    echo \layout::func_from_text("
                        ");
                }
                // line 54
                echo \layout::func_from_text("                    </td>
                </tr>
                ");
            }
            // line 57
            echo \layout::func_from_text("                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo \layout::func_from_text("                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;\">Последняя активность:</td>
                    <td style=\"text-align: justify;\">
                        ");
        // line 61
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_user_action")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
            echo \layout::func_from_text("
                        ");
        } else {
            // line 62
            echo \layout::func_from_text("дата неизвестна
                        ");
        }
        // line 64
        echo \layout::func_from_text("                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\user.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 64,  187 => 62,  181 => 61,  176 => 58,  170 => 57,  165 => 54,  159 => 52,  152 => 50,  149 => 49,  147 => 48,  142 => 46,  139 => 45,  136 => 44,  132 => 43,  125 => 41,  117 => 37,  113 => 35,  109 => 33,  107 => 32,  103 => 31,  99 => 29,  94 => 26,  92 => 25,  79 => 24,  74 => 21,  71 => 20,  57 => 9,  54 => 8,  51 => 7,  45 => 5,  42 => 4,  39 => 3,  31 => 2,);
    }
}
