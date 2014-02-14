<?php

/* applications\users\layouts\admin/form.html */
class __TwigTemplate_b47827cd047f3569f4e6dcc5bb7b28fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<div class=\"add_html\">
<form class=\"new_users\">
    <input type=\"hidden\" name=\"id\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id_user"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save\">
    <input type=\"hidden\" name=\"mode\" value=\"");
        // line 5
        echo \layout::func_from_text(twig_escape_filter($this->env, ((array_key_exists("act", $context)) ? (_twig_default_filter((isset($context["act"]) ? $context["act"] : null), "new")) : ("new")), "html", null, true));
        echo \layout::func_from_text("\">

    <div class=\"body\"><span class=\"title\">Email:<span>
        <div><input type=\"text\" name=\"email\" class=\"input\" style=\"width:350px;\" value=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "email"), "html", null, true));
        echo \layout::func_from_text("\"></div></div>
    <div class=\"body\"><span class=\"title\">Ник:<span>
        <div><input type=\"text\" name=\"nickname\" class=\"input\" style=\"width:350px;\" value=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "nickname"), "html", null, true));
        echo \layout::func_from_text("\"></div></div>
    <div class=\"body\"><span class=\"title\">ФИО<span>
        <div><input type=\"text\" name=\"fio\" class=\"input\" style=\"width:350px;\" value=\"");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("\"></div></div>
    <div class=\"body\"><span class=\"title\">Пол:<span>
        <div><select name=\"gender\">
                <option value=\"m\">мужской</option>
                <option value=\"f\" ");
        // line 16
        if (($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "gender") == "f")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">женский</option>
            </select></div></div>
    <div class=\"body\"><span class=\"title\">Группа:<span>
        <div>
            ");
        // line 20
        if ((isset($context["groups"]) ? $context["groups"] : null)) {
            // line 21
            echo \layout::func_from_text("            <select name=\"id_group\">
                <option></option>
                ");
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["g"]) {
                // line 24
                echo \layout::func_from_text("                <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" ");
                if (($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id") == $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id_group"))) {
                    echo \layout::func_from_text("selected");
                }
                echo \layout::func_from_text(">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</option>
                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['g'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo \layout::func_from_text("            </select>
            ");
        }
        // line 28
        echo \layout::func_from_text("        </div></div>
    <div class=\"body\"><span class=\"title\">Пароль:<span>
        <div>");
        // line 30
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id_user")) {
            echo \layout::func_from_text("<a href=\"\" class=\"change_password\">изменить</a>");
        }
        echo \layout::func_from_text("<input type=\"text\" name=\"password\" class=\"input w100\" style=\"width:350px;");
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "id_user")) {
            echo \layout::func_from_text("display:none;");
        }
        echo \layout::func_from_text("\"></div></div>
</form>
</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\users\\layouts\\admin/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 30,  89 => 28,  85 => 26,  70 => 24,  66 => 23,  62 => 21,  60 => 20,  51 => 16,  44 => 12,  39 => 10,  34 => 8,  28 => 5,  23 => 3,  19 => 1,);
    }
}
