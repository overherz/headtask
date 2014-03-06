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
            'css' => array($this, 'block_css'),
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
        echo \layout::func_from_text("    <script src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
    <script>
        \$(document).ready(function (\$) {
            animate_progress_bars();
        });
    </script>
");
    }

    // line 14
    public function block_css($context, array $blocks = array())
    {
        // line 15
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"/libraries/calendar/calendar.css\">
");
    }

    // line 18
    public function block_context($context, array $blocks = array())
    {
        // line 19
        echo \layout::func_from_text("<ul class=\"breadcrumbs-one\">
    <li><a>Общая статистика</a></li>
    <li><a class=\"current\">
        <span class=\"label label-info\">");
        // line 22
        echo \layout::func_from_text(twig_escape_filter($this->env, ((array_key_exists("count_project", $context)) ? (_twig_default_filter((isset($context["count_project"]) ? $context["count_project"] : null), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_projects", ((array_key_exists("count_project", $context)) ? (_twig_default_filter((isset($context["count_project"]) ? $context["count_project"] : null), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 23
        echo \layout::func_from_text(twig_escape_filter($this->env, ((array_key_exists("count_personal_tasks", $context)) ? (_twig_default_filter((isset($context["count_personal_tasks"]) ? $context["count_personal_tasks"] : null), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_personal_tasks", ((array_key_exists("count_personal_tasks", $context)) ? (_twig_default_filter((isset($context["count_personal_tasks"]) ? $context["count_personal_tasks"] : null), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("

        <span style=\"margin-left: 20px;font-weight: bold;\" title='У участника с ролью \"Менеджер\" учитываются все задачи в проекте. У просто участника только задачи, которые создавал он'>Менеджер: </span>
        <span class=\"label label-info\">");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "new"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 27
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "in_progress"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 28
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "closed"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
        <span class=\"label label-info\">");
        // line 29
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["manager_stats"]) ? $context["manager_stats"] : null), "rejected"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
        </a>
    </li>
</ul>

");
        // line 34
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "calendar/task_today.html"), "method"));
        $template->display($context);
        // line 35
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
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["new_posts"]) ? $context["new_posts"] : null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 49
            echo \layout::func_from_text("        <tr>
            <td><a href=\"/projects/forum/new_posts/");
            // line 50
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("/\">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</a></td>
            <td>");
            // line 51
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["n"]) ? $context["n"] : null), "count"), "html", null, true));
            echo \layout::func_from_text("</td>
        </tr>
    ");
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 54
            echo \layout::func_from_text("        <tr>
            <td colspan=\"2\">Новых сообщений на форумах нет</td>
        </tr>
    ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
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
        return array (  159 => 58,  150 => 54,  142 => 51,  136 => 50,  133 => 49,  128 => 48,  113 => 35,  110 => 34,  100 => 29,  94 => 28,  88 => 27,  82 => 26,  74 => 23,  68 => 22,  63 => 19,  60 => 18,  55 => 15,  52 => 14,  40 => 6,  37 => 5,  31 => 3,);
    }
}
