<?php

/* applications\tasks\layouts\admin/form.html */
class __TwigTemplate_76ee996bfe7fb6aab1e055c97ff177485d74e6091a8a949a6ecbe313b95e3307 extends Twig_Template
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
        echo \layout::func_from_text("<script src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "tasks", 1 => "jqCron.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<form class=\"new_page\">
    <input type=\"hidden\" name=\"id\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save\">    
    <table style=\"width: 400px;\">
        <tr>
            <td valign=\"top\">
                <div class=\"body\"><span class=\"title\">Название</span>
                    <div><input type=\"text\" name=\"name\" value=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
                <div class=\"body\"><span class=\"title\">Задача</span>
                    <div>
                        ");
        // line 12
        if ((isset($context["tasks"]) ? $context["tasks"] : null)) {
            // line 13
            echo \layout::func_from_text("                        <select name=\"controller\">
                            ");
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) ? $context["tasks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 15
                echo \layout::func_from_text("                            <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
                echo \layout::func_from_text("\" ");
                if (($this->getAttribute((isset($context["task"]) ? $context["task"] : null), "controller") == (isset($context["t"]) ? $context["t"] : null))) {
                    echo \layout::func_from_text("selected");
                }
                echo \layout::func_from_text(">");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
                echo \layout::func_from_text("</option>
                            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo \layout::func_from_text("                        </select>
                        ");
        }
        // line 19
        echo \layout::func_from_text("                    </div></div>
                <div class=\"body\"><span class=\"title\">Период запуска</span>
                    <div id=\"cron\" style=\"margin-bottom: 10px;\"></div>
                    <div><input type=\"text\" name=\"period\" value=\"");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "period"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px;\" readonly></div></div>
                <div class=\"body\"><span class=\"title\">Параметры запуска</span>
                    <div><input type=\"text\" name=\"params\" value=\"");
        // line 24
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "params"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\" style=\"width:350px\"></div></div>
                <div class=\"body\"><span class=\"title\">Дополнительная информация</span>
                    <div><textarea name=\"info\" class=\"input\" style=\"width:550px;height: 250px;\">");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["task"]) ? $context["task"] : null), "info"), "html", null, true));
        echo \layout::func_from_text("</textarea></div></div>
            </td>
        </tr>
    </table>
</form>");
    }

    public function getTemplateName()
    {
        return "applications\\tasks\\layouts\\admin/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 26,  78 => 24,  73 => 22,  68 => 19,  64 => 17,  49 => 15,  45 => 14,  42 => 13,  40 => 12,  34 => 9,  25 => 3,  19 => 1,);
    }
}
