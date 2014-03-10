<?php

/* applications\projects\layouts\user_tasks.html */
class __TwigTemplate_24530e18ba57f6a4619aa4fffe9badd409ffb93994819e4c78f01759a917ee7e extends Twig_Template
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
        echo \layout::func_from_text("    <script src=\"/source/js/jquery.ui.datepicker-ru.min.js\"></script>
    <script type=\"text/javascript\" src=\"/source/js/search.js\"></script>
    <script type=\"text/javascript\" src=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "user_tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
    <ul class=\"breadcrumbs-one second\">
        <li><a class=\"current\">Задачи</a></li>
    </ul>
    ");
        // line 7
        $context["inputs"] = $this->env->loadTemplate("/source/search_macro.html");
        // line 8
        echo \layout::func_from_text("    <form path=\"/projects/user_tasks/\" id=\"search_form\" method=\"post\" class=\"form-horizontal user_tasks\" style=\"margin-bottom:0px;\">
        <input type=\"hidden\" name=\"page\" value=\"\">
        <input type=\"hidden\" name=\"act\" value=\"get_data\">
        <input type=\"hidden\" name=\"id_user\" value=\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["id_user"]) ? $context["id_user"] : null), "html", null, true));
        echo \layout::func_from_text("\">
        <table class=\"table table-condensed table-border\" style=\"width: auto;\">
            <tr>
                <th>Дата</th>
                <th>Статус</th>
                <th>Приоритет</th>
                <th>Тип</th>
                <th>Другое</th>
            </tr>
            <tr>
                <td>От: <input type=\"text\" name=\"start\" value=\"");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly style=\"margin-bottom: 10px;\"><br>
                    До: <input type=\"text\" name=\"end\" value=\"");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
        echo \layout::func_from_text("\" class=\"input-small\" readonly></td>
                <td>");
        // line 23
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
        echo \layout::func_from_text("</td>
                <td>");
        // line 24
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
        echo \layout::func_from_text("</td>
                <td>");
        // line 25
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "type"), "type"));
        echo \layout::func_from_text("</td>
                <td>
                    <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                    ");
        // line 28
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
        echo \layout::func_from_text("
                </td>
            </tr>
        </table>
    </form>
    <div class=\"clearfix\"></div>
    <div id=\"search_result\">");
        // line 34
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar/task_today.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\user_tasks.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 34,  72 => 28,  66 => 25,  62 => 24,  58 => 23,  54 => 22,  50 => 21,  37 => 11,  32 => 8,  30 => 7,  23 => 3,  19 => 1,);
    }
}
