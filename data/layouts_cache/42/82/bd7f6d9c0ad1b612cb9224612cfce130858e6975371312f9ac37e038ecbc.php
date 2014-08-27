<?php

/* applications/tasks/layouts/admin/tasks.html */
class __TwigTemplate_4282bd7f6d9c0ad1b612cb9224612cfce130858e6975371312f9ac37e038ecbc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/admin/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/admin/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("&rarr; Статические страницы
");
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("<link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "tasks", 1 => "tasks.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"");
        // line 7
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "tasks", 1 => "jqCron.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 9
    public function block_js($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("    ,\"/source/js/search.js\"
    ,\"");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "tasks", 1 => "tasks_admin.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        if ((isset($context["exec"]) ? $context["exec"] : null)) {
            // line 15
            echo \layout::func_from_text("    <div class=\"alert alert-info\"><b>Для активации планировщика внесите следующие строки в cron на вашем сервере</b> <br><br>
    ");
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["cron_string"]) ? $context["cron_string"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["str"]) {
                // line 17
                echo \layout::func_from_text("        <div>");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["str"]) ? $context["str"] : null), "html", null, true));
                echo \layout::func_from_text("</div>
    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['str'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo \layout::func_from_text("</div>

<form action=\"\" id=\"search_form\" method=\"post\" style=\"margin-bottom:20px;\">
    Поиск:&nbsp;<input type=\"text\" name=\"search\" class=\"input\">
    <input type=\"hidden\" name=\"page\">
    ");
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : null));
            foreach ($context['_seq'] as $context["k"] => $context["f"]) {
                // line 25
                echo \layout::func_from_text("    &nbsp;");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["f"]) ? $context["f"] : null), "label"), "html", null, true));
                echo \layout::func_from_text("
    ");
                // line 26
                if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "type") == "select")) {
                    // line 27
                    echo \layout::func_from_text("    &nbsp;<select name=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                    echo \layout::func_from_text("\">
    ");
                    // line 28
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "options"));
                    foreach ($context['_seq'] as $context["j"] => $context["o"]) {
                        // line 29
                        echo \layout::func_from_text("    <option value=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : null), "html", null, true));
                        echo \layout::func_from_text("\" ");
                        if (($this->getAttribute((isset($context["f"]) ? $context["f"] : null), "selected") == (isset($context["j"]) ? $context["j"] : null))) {
                            echo \layout::func_from_text("selected");
                        }
                        echo \layout::func_from_text(">");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["o"]) ? $context["o"] : null), "html", null, true));
                        echo \layout::func_from_text("</option>
    ");
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['j'], $context['o'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 31
                    echo \layout::func_from_text("</select>
    ");
                }
                // line 33
                echo \layout::func_from_text("    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['f'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo \layout::func_from_text("</form>
");
        } else {
            // line 36
            echo \layout::func_from_text("<div style=\"color:red;\">Функция exec недоступна!</div>
");
        }
        // line 38
        echo \layout::func_from_text("
<div id=\"search_result\">");
        // line 39
        $this->env->loadTemplate("/applications/tasks/layouts/admin/tasks_table.html")->display($context);
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/tasks/layouts/admin/tasks.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 39,  146 => 38,  142 => 36,  138 => 34,  132 => 33,  128 => 31,  113 => 29,  109 => 28,  104 => 27,  102 => 26,  97 => 25,  93 => 24,  86 => 19,  77 => 17,  73 => 16,  70 => 15,  68 => 14,  65 => 13,  59 => 11,  56 => 10,  53 => 9,  47 => 7,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
