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
            echo \layout::func_from_text("        <form path=\"");
            if ((isset($context["id_project"]) ? $context["id_project"] : null)) {
                echo \layout::func_from_text("/projects/tasks/");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["id_project"]) ? $context["id_project"] : null), "html", null, true));
                echo \layout::func_from_text("/");
            } else {
                echo \layout::func_from_text("/projects/dashboard/");
            }
            echo \layout::func_from_text("\" id=\"search_form\" method=\"post\" class=\"form-horizontal user_tasks\" style=\"margin-bottom:0;\">
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

            <div class=\"form-group col-xs-4\">
                <input type=\"text\" name=\"search\" id=\"search_label\" class=\"form-control\" placeholder=\"Поиск\" value=\"");
            // line 10
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "search"), "selected"), "html", null, true));
            echo \layout::func_from_text("\">
            </div>
            <div class=\"col-xs-8\">
                <div style=\"position: relative;top:5px;\">
                ");
            // line 14
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
            echo \layout::func_from_text("
                ");
            // line 15
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "my"), "my", true));
            echo \layout::func_from_text("</div>
            </div>


            <table class=\"table table_style no_style\" style=\"width: auto;margin-top: 0;clear: both;\">
                <thead>
                <tr>
                    <th>Кому</th>
                    <th>Начало-окончание</th>
                    <th>Дата изменения</th>
                    <th>Статус</th>
                    <th>Приоритет</th>
                    ");
            // line 27
            if (((isset($context["id_project"]) ? $context["id_project"] : null) && $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category"), "options"))) {
                // line 28
                echo \layout::func_from_text("                    <th>Метка</th>
                    ");
            }
            // line 30
            echo \layout::func_from_text("                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class=\"dashboard_radio\">
                        ");
            // line 35
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "assigned"), "assigned"));
            echo \layout::func_from_text("
                    </td>
                    <td>От: <input type=\"text\" name=\"start\" value=\"");
            // line 37
            if ((isset($context["start"]) ? $context["start"] : null)) {
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
            }
            echo \layout::func_from_text("\" readonly style=\"margin-bottom: 10px;width: 85px;\"><br>
                        До: <input type=\"text\" name=\"end\" value=\"");
            // line 38
            if ((isset($context["end"]) ? $context["end"] : null)) {
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
            }
            echo \layout::func_from_text("\" readonly style=\"width: 85px;\"></td>
                    <td>От: <input type=\"text\" name=\"start_edit\" value=\"");
            // line 39
            if ((isset($context["start_edit"]) ? $context["start_edit"] : null)) {
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start_edit"]) ? $context["start_edit"] : null), "html", null, true));
            }
            echo \layout::func_from_text("\" readonly style=\"margin-bottom: 10px;width: 85px;\"><br>
                        До: <input type=\"text\" name=\"end_edit\" value=\"");
            // line 40
            if ((isset($context["end_edit"]) ? $context["end_edit"] : null)) {
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end_edit"]) ? $context["end_edit"] : null), "html", null, true));
            }
            echo \layout::func_from_text("\" readonly style=\"width: 85px;\"></td>
                    <td>");
            // line 41
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
            echo \layout::func_from_text("</td>
                    <td>");
            // line 42
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
            echo \layout::func_from_text("</td>

                    ");
            // line 44
            if (((isset($context["id_project"]) ? $context["id_project"] : null) && $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category"), "options"))) {
                // line 45
                echo \layout::func_from_text("                    <td>
                        ");
                // line 46
                echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category"), "category"));
                echo \layout::func_from_text("
                    </td>
                    ");
            }
            // line 49
            echo \layout::func_from_text("                </tr>
                </tbody>
            </table>
        </form>
    ");
        } else {
            // line 54
            echo \layout::func_from_text("    <ul class=\"breadcrumbs-one second\">
        <li><a class=\"current\">Задачи</a></li>
    </ul>
    <form path=\"/projects/user_tasks/\" id=\"search_form\" method=\"post\" class=\"form-horizontal user_tasks\" style=\"margin-bottom:0px;\">
        <input type=\"hidden\" name=\"page\" value=\"\">
        <input type=\"hidden\" name=\"act\" value=\"get_data\">
        <input type=\"hidden\" name=\"id_user\" value=\"");
            // line 60
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
            // line 72
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["start"]) ? $context["start"] : null), "html", null, true));
            echo \layout::func_from_text("\" class=\"input-small\" readonly style=\"margin-bottom: 10px;\"><br>
                    До: <input type=\"text\" name=\"end\" value=\"");
            // line 73
            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["end"]) ? $context["end"] : null), "html", null, true));
            echo \layout::func_from_text("\" class=\"input-small\" readonly></td>
                <td>");
            // line 74
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
            echo \layout::func_from_text("</td>
                <td>");
            // line 75
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
            echo \layout::func_from_text("</td>
                <td>
                    <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                    ");
            // line 78
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
            echo \layout::func_from_text("
                </td>
            </tr>
            </tbody>
        </table>
    </form>
    ");
        }
        // line 85
        echo \layout::func_from_text("    <div class=\"clearfix\"></div>
    <div id=\"search_result\">");
        // line 86
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
        return array (  197 => 86,  194 => 85,  184 => 78,  178 => 75,  174 => 74,  170 => 73,  166 => 72,  151 => 60,  143 => 54,  136 => 49,  130 => 46,  127 => 45,  125 => 44,  120 => 42,  116 => 41,  110 => 40,  104 => 39,  98 => 38,  92 => 37,  87 => 35,  80 => 30,  76 => 28,  74 => 27,  59 => 15,  55 => 14,  48 => 10,  42 => 7,  38 => 6,  25 => 3,  22 => 2,  19 => 1,);
    }
}
