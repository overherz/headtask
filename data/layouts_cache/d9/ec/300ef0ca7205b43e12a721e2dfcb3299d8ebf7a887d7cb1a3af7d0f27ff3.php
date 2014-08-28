<?php

/* applications/projects/layouts/user_tasks.html */
class __TwigTemplate_d9ec300ef0ca7205b43e12a721e2dfcb3299d8ebf7a887d7cb1a3af7d0f27ff3 extends Twig_Template
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
        echo \layout::func_from_text("    <ul class=\"breadcrumbs-one second\">
        <li><a class=\"current\">Задачи</a></li>
    </ul>
    ");
        // line 4
        $context["inputs"] = $this->env->loadTemplate("/source/search_macro.html");
        // line 5
        echo \layout::func_from_text("    <form path=\"/projects/user_tasks/\" id=\"search_form\" method=\"post\" class=\"form-horizontal user_tasks\" style=\"margin-bottom:0px;\">
        <input type=\"hidden\" name=\"page\" value=\"\">
        <input type=\"hidden\" name=\"act\" value=\"get_data\">
        <input type=\"hidden\" name=\"id_user\" value=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["id_user"]) ? $context["id_user"] : null), "html", null, true));
        echo \layout::func_from_text("\">
        <table class=\"table table_style no_style\" style=\"width: auto;\">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Статус</th>
                <th>Приоритет</th>
                <th>Другое</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>От: <input type=\"text\" name=\"start\" value=\"");
        // line 20
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly style=\"margin-bottom: 10px;\"><br>
                    До: <input type=\"text\" name=\"end\" value=\"");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly></td>
                <td>");
        // line 22
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
        echo \layout::func_from_text("</td>
                <td>");
        // line 23
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
        echo \layout::func_from_text("</td>
                <td>
                    <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                    ");
        // line 26
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
        echo \layout::func_from_text("
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    <div class=\"clearfix\"></div>
    <div id=\"search_result\">");
        // line 33
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar/task_today.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/user_tasks.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 33,  64 => 26,  58 => 23,  54 => 22,  50 => 21,  46 => 20,  31 => 8,  26 => 5,  24 => 4,  19 => 1,);
    }
}
