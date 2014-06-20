<?php

/* applications\projects\layouts\calendar/calendar_current_day.html */
class __TwigTemplate_4908da601d41ad5d42044b517ef7b9200a0eaa28d2fd3e7f250fa948387d3c2f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo \layout::func_from_text("Календарь. Задачи сегодня");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <script src=\"/source/js/jquery.cookie.js\"></script>
    <script src=\"");
        // line 7
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 10
    public function block_context($context, array $blocks = array())
    {
        // line 11
        echo \layout::func_from_text("<div id=\"projects_info\"></div>
<ul class=\"breadcrumbs-one\">
    <li><a>Задачи</a></li>
    <li>
        <a class=\"current\">
            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d1\" id=\"d1\" class=\"dashboard_option\" value=\"1\" ");
        // line 16
        if (((isset($context["mask"]) ? $context["mask"] : null) & 1)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d1\" style=\"margin-bottom: 0;\"> Создатель</label></span>
            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d2\" id=\"d2\" class=\"dashboard_option\" value=\"2\" ");
        // line 17
        if (((isset($context["mask"]) ? $context["mask"] : null) & 2)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d2\" style=\"margin-bottom: 0;\">Делегированные</label></span>
            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d4\" id=\"d4\" class=\"dashboard_option\" value=\"4\" ");
        // line 18
        if (((isset($context["mask"]) ? $context["mask"] : null) & 4)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d4\" style=\"margin-bottom: 0;\">Ничьи</label></span>
            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d8\" id=\"d8\" class=\"dashboard_option\" value=\"8\" ");
        // line 19
        if (((isset($context["mask"]) ? $context["mask"] : null) & 8)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d8\" style=\"margin-bottom: 0;\">Чужие</label></span>
            <span style=\"margin-right: 5px;\"><input type=\"checkbox\" name=\"d16\" id=\"d16\" class=\"dashboard_option\" value=\"16\" ");
        // line 20
        if (((isset($context["mask"]) ? $context["mask"] : null) & 16)) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("> <label for=\"d16\" style=\"margin-bottom: 0;\">Закрытые сегодня</label></span>
        </a>
    </li>
</ul>

<div style=\"margin-bottom: 10px;\">Всего задач: <span class=\"label label-info\" style=\"margin-right: 10px;\">");
        // line 25
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true));
        echo \layout::func_from_text("</span>Показано задач: <span class=\"label label-info\">");
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["count_show"]) ? $context["count_show"] : null), "html", null, true));
        echo \layout::func_from_text("</span></div>
");
        // line 26
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar/task_today.html"), "method"));
        $template->display($context);
        // line 27
        echo \layout::func_from_text("
<ul class=\"breadcrumbs-one second\">
    <li><a class=\"current\">Форумы</a></li>
</ul>

<table class=\"table table-hover table-condensed table-border\">
    <thead>
    <tr>
        <th>Проект</th>
        <th style=\"width: 350px;\">Количество новых сообщений</th>
    </tr>
    </thead>
    <tbody>
    ");
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["new_posts"]) ? $context["new_posts"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 41
            echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/forum/new_posts/");
            // line 42
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td>");
            // line 43
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "count"), "html", null, true));
            echo \layout::func_from_text("</td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 46
            echo \layout::func_from_text("        <tr>
            <td colspan=\"2\">Новых сообщений на форумах нет</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo \layout::func_from_text("    </tbody>
</table>

");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\calendar/calendar_current_day.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 50,  138 => 46,  130 => 43,  124 => 42,  121 => 41,  116 => 40,  101 => 27,  98 => 26,  92 => 25,  82 => 20,  76 => 19,  70 => 18,  64 => 17,  58 => 16,  51 => 11,  48 => 10,  42 => 7,  39 => 6,  36 => 5,  30 => 3,);
    }
}
