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
        echo \layout::func_from_text("    ");
        $context["inputs"] = $this->env->loadTemplate("/source/search_macro.html");
        // line 2
        echo \layout::func_from_text("    ");
        if ((isset($context["dashboard"]) ? $context["dashboard"] : null)) {
            // line 3
            echo \layout::func_from_text("        <form path=\"/projects/tasks_today/\" id=\"search_form\" method=\"post\" class=\"form-horizontal user_tasks\" style=\"margin-bottom:0;\">
            <input type=\"hidden\" name=\"page\" value=\"\">
            <input type=\"hidden\" name=\"act\" value=\"get_data\">
            <input type=\"hidden\" name=\"limit\" value=\"");
            // line 6
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["limit"]) ? $context["limit"] : null), "html", null, true));
            echo \layout::func_from_text("\">
            <input type=\"hidden\" name=\"id_user\" value=\"");
            // line 7
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "user"), "id_user"), "html", null, true));
            echo \layout::func_from_text("\">
            <table class=\"table table_style no_style\" style=\"width: auto;margin-top: 0;\">
                <thead>
                <tr>
                    <th>Другое</th>
                    <th>Кому</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th>Приоритет</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                        <div>");
            // line 22
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
            echo \layout::func_from_text("</div>
                        <div>");
            // line 23
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "my"), "my", true));
            echo \layout::func_from_text("</div>
                    </td>
                    <td class=\"dashboard_radio\">
                        ");
            // line 26
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "assigned"), "assigned"));
            echo \layout::func_from_text("
                    </td>
                    <td>От: <input type=\"text\" name=\"start\" value=\"");
            // line 28
            if ((isset($context["start"]) ? $context["start"] : null)) {
                echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "d.m.Y"), "html", null, true));
            }
            echo \layout::func_from_text("\" readonly style=\"margin-bottom: 10px;width: 85px;\"><br>
                        До: <input type=\"text\" name=\"end\" value=\"");
            // line 29
            echo \layout::func_from_text(twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "d.m.Y"), "html", null, true));
            echo \layout::func_from_text("\" readonly style=\"width: 85px;\"></td>
                    <td>");
            // line 30
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
            echo \layout::func_from_text("</td>
                    <td>");
            // line 31
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
            echo \layout::func_from_text("</td>
                </tr>
                </tbody>
            </table>
        </form>
    ");
        } else {
            // line 37
            echo \layout::func_from_text("    <ul class=\"breadcrumbs-one second\">
        <li><a class=\"current\">Задачи</a></li>
    </ul>
    <form path=\"/projects/user_tasks/\" id=\"search_form\" method=\"post\" class=\"form-horizontal user_tasks\" style=\"margin-bottom:0px;\">
        <input type=\"hidden\" name=\"page\" value=\"\">
        <input type=\"hidden\" name=\"act\" value=\"get_data\">
        <input type=\"hidden\" name=\"id_user\" value=\"");
            // line 43
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
            // line 55
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
            echo \layout::func_from_text("\" class=\"input-small\" readonly style=\"margin-bottom: 10px;\"><br>
                    До: <input type=\"text\" name=\"end\" value=\"");
            // line 56
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
            echo \layout::func_from_text("\" class=\"input-small\" readonly></td>
                <td>");
            // line 57
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
            echo \layout::func_from_text("</td>
                <td>");
            // line 58
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
            echo \layout::func_from_text("</td>
                <td>
                    <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                    ");
            // line 61
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
            echo \layout::func_from_text("
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    ");
        }
        // line 68
        echo \layout::func_from_text("    <div class=\"clearfix\"></div>
    <div id=\"search_result\">");
        // line 69
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
        return array (  144 => 69,  141 => 68,  131 => 61,  125 => 58,  121 => 57,  117 => 56,  113 => 55,  98 => 43,  90 => 37,  81 => 31,  77 => 30,  73 => 29,  67 => 28,  62 => 26,  56 => 23,  52 => 22,  34 => 7,  30 => 6,  25 => 3,  22 => 2,  19 => 1,);
    }
}
