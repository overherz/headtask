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
<script src=\"/source/js/jquery.ui.datepicker-ru.min.js\"></script>
<script type=\"text/javascript\" src=\"/source/js/search.js\"></script>
<script type=\"text/javascript\" src=\"");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "user_tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script>
    \$(document).ready(function(\$)
    {
        \$(\".sidebar-nav li\").removeClass(\"active\");
    });
</script>
");
    }

    // line 23
    public function block_context($context, array $blocks = array())
    {
        // line 24
        echo \layout::func_from_text("<table class=\"table\" style=\"margin-top: -10px;\">
    <tr>
        <td style=\"width: 1px;vertical-align: top !important;border-top:none;padding-left: 0;\">
            <img id=\"avatar\" src=\"");
        // line 27
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
        // line 28
        if (($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user") && ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user") == $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user")))) {
            // line 29
            echo \layout::func_from_text("                <div style=\"margin: 5px 0;display: inline-block;\"><a href=\"\" change_avatar class=\"btn btn-primary\">Фотография</a></div>
                <div style=\"margin: 5px 0;display: inline-block;\"><a href=\"/users/edit/\" class=\"btn btn-primary\">Профиль</a></div>
            ");
        }
        // line 32
        echo \layout::func_from_text("        </td>
        <td style=\"border-top:none;vertical-align: top !important;padding-top: 2px;\">
            <a href=\"\" style=\"font-weight: bold;font-size: 20px;\">");
        // line 34
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</a>
            <span class=\"get_ms_status user_offline\" data-id=\"");
        // line 35
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("\"></span>
            <table class=\"table table-striped table-border\" style=\"margin-top: 10px;\">
                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;border-top: none;\">Группа:</td>
                    <td style=\"text-align: justify;border-top:none;color:");
        // line 39
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "color"), "html", null, true));
        echo \layout::func_from_text(";font-weight: bold;\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "group_name"), "html", null, true));
        echo \layout::func_from_text("</td>
                </tr>
                ");
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "profile"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 42
            echo \layout::func_from_text("                ");
            if ((($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name") != "avatar") && ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value") != ""))) {
                // line 43
                echo \layout::func_from_text("                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;\">");
                // line 44
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "alias"), "html", null, true));
                echo \layout::func_from_text(":</td>
                    <td style=\"text-align: justify;\">
                        ");
                // line 46
                if (($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "name") == "skypename")) {
                    // line 47
                    echo \layout::func_from_text("                        <script type=\"text/javascript\" src=\"/source/js/skypeCheck.js\"></script>
                        <a href=\"skype:");
                    // line 48
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("?chat\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("</a>
                        ");
                } else {
                    // line 50
                    echo \layout::func_from_text("                        ");
                    echo \layout::func_from_text(nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "value"), "html", null, true)));
                    echo \layout::func_from_text("
                        ");
                }
                // line 52
                echo \layout::func_from_text("                    </td>
                </tr>
                ");
            }
            // line 55
            echo \layout::func_from_text("                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo \layout::func_from_text("                <tr>
                    <td style=\"width:1px;white-space: nowrap;font-weight: bold;\">Последняя активность:</td>
                    <td style=\"text-align: justify;\">
                        ");
        // line 59
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_user_action")) {
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "last_user_action"), "d.m.Y H:i"), "html", null, true));
            echo \layout::func_from_text("
                        ");
        } else {
            // line 60
            echo \layout::func_from_text("дата неизвестна
                        ");
        }
        // line 62
        echo \layout::func_from_text("                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
");
        // line 68
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
        return array (  194 => 68,  186 => 62,  182 => 60,  176 => 59,  171 => 56,  165 => 55,  160 => 52,  154 => 50,  147 => 48,  144 => 47,  142 => 46,  137 => 44,  134 => 43,  131 => 42,  127 => 41,  120 => 39,  113 => 35,  109 => 34,  105 => 32,  100 => 29,  98 => 28,  85 => 27,  80 => 24,  77 => 23,  65 => 14,  57 => 9,  54 => 8,  51 => 7,  45 => 5,  42 => 4,  39 => 3,  31 => 2,);
    }
}
