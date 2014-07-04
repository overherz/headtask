<?php

/* applications/users/layouts/user.html */
class __TwigTemplate_3cf2a71777db456f758a5470f303563eaa7b1962ac077716c9f6374f0045759a extends Twig_Template
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
        echo \layout::func_from_text("<table class=\"table\" style=\"margin-top: -10px;\">
    <tr>
        <td style=\"width: 1px;padding: 0px;vertical-align: top !important;border-top:none;\">
            <img id=\"avatar\" style=\"margin-left: -10px;\" src=\"");
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
            echo \layout::func_from_text("                <div style=\"margin: 5px 0;display: inline-block;\"><a href=\"\" change_avatar class=\"btn btn-primary\">Фотография</a></div>
                <div style=\"margin: 5px 0;display: inline-block;\"><a href=\"/users/edit/\" class=\"btn btn-primary\">Профиль</a></div>
            ");
        }
        // line 29
        echo \layout::func_from_text("        </td>
        <td style=\"border-top:none;vertical-align: top !important;\">
            <a href=\"\" style=\"font-weight: bold;font-size: 20px;\">");
        // line 31
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</a>
            <span class=\"get_ms_status user_offline\" data-id=\"");
        // line 32
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("\"></span>
            <table class=\"table table-striped table-border\" style=\"margin-top: 20px;\">
                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;border-top: none;\">Группа:</td>
                    <td style=\"text-align: justify;border-top:none;color:");
        // line 36
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("</td>
                </tr>
                ");
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profile"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 39
            echo \layout::func_from_text("                ");
            if ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name") != "avatar") && ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value") != ""))) {
                // line 40
                echo \layout::func_from_text("                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;\">");
                // line 41
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "alias"), "html", null, true));
                echo \layout::func_from_text(":</td>
                    <td style=\"text-align: justify;\">
                        ");
                // line 43
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name") == "skypename")) {
                    // line 44
                    echo \layout::func_from_text("                        <script type=\"text/javascript\" src=\"/source/js/skypeCheck.js\"></script>
                        <a href=\"skype:");
                    // line 45
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("?chat\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("</a>
                        ");
                } else {
                    // line 47
                    echo \layout::func_from_text("                        ");
                    echo \layout::func_from_text(nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true)));
                    echo \layout::func_from_text("
                        ");
                }
                // line 49
                echo \layout::func_from_text("                    </td>
                </tr>
                ");
            }
            // line 52
            echo \layout::func_from_text("                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo \layout::func_from_text("                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;\">Последняя активность:</td>
                    <td style=\"text-align: justify;\">
                        ");
        // line 56
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_user_action")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
            echo \layout::func_from_text("
                        ");
        } else {
            // line 57
            echo \layout::func_from_text("дата неизвестна
                        ");
        }
        // line 59
        echo \layout::func_from_text("                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
");
        // line 65
        echo \layout::func_from_text((isset($context["user_tasks"]) ? $context["user_tasks"] : null));
        echo \layout::func_from_text("
");
    }

    public function getTemplateName()
    {
        return "applications/users/layouts/user.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 65,  180 => 59,  176 => 57,  170 => 56,  165 => 53,  159 => 52,  154 => 49,  148 => 47,  141 => 45,  138 => 44,  136 => 43,  131 => 41,  128 => 40,  125 => 39,  121 => 38,  114 => 36,  107 => 32,  103 => 31,  99 => 29,  94 => 26,  92 => 25,  79 => 24,  74 => 21,  71 => 20,  54 => 8,  51 => 7,  45 => 5,  42 => 4,  39 => 3,  31 => 2,  76 => 32,  67 => 26,  61 => 23,  57 => 9,  53 => 21,  49 => 20,  37 => 11,  32 => 8,  30 => 7,  23 => 3,  19 => 1,);
    }
}
