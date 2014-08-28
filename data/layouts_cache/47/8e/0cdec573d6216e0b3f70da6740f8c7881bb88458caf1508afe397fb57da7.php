<?php

/* applications/projects/layouts/tasks/tasks.html */
class __TwigTemplate_478e0cdec573d6216e0b3f70da6740f8c7881bb88458caf1508afe397fb57da7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("Проект \"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        $this->displayParentBlock("css", $context, $blocks);
        echo \layout::func_from_text("
<link rel=\"stylesheet\" type=\"text/css\" href=\"/source/js/fancybox/jquery.fancybox.css\">
");
    }

    // line 12
    public function block_js($context, array $blocks = array())
    {
        // line 13
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script src=\"");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
");
    }

    // line 18
    public function block_project_data($context, array $blocks = array())
    {
        // line 19
        $context["inputs"] = $this->env->loadTemplate("/source/search_macro.html");
        // line 20
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin-bottom:0;\">
    <input type=\"hidden\" name=\"page\" value=\"\">
    <table class=\"table table_style no_style\" id=\"filter_table\">
        <thead>
        <tr>
            <th>Статус</th>
            <th>Приоритет</th>
            ");
        // line 27
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category"), "options")) {
            echo \layout::func_from_text("<th>Метка</th>");
        }
        // line 28
        echo \layout::func_from_text("            <th>Другое</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>");
        // line 33
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
        echo \layout::func_from_text("</td>
            <td>");
        // line 34
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
        echo \layout::func_from_text("</td>
            ");
        // line 35
        if ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category"), "options")) {
            // line 36
            echo \layout::func_from_text("                <td>");
            echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "category"), "category"));
            echo \layout::func_from_text("</td>
            ");
        }
        // line 38
        echo \layout::func_from_text("            <td>
                <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                ");
        // line 40
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
        echo \layout::func_from_text("
            </td>
        </tr>
        </tbody>
    </table>
</form>
<div class=\"clearfix\"></div>
<div id=\"search_result\">
    ");
        // line 48
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/tasks_table.html"), "method"));
        $template->display($context);
        // line 49
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/tasks/tasks.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 49,  119 => 48,  108 => 40,  104 => 38,  98 => 36,  96 => 35,  92 => 34,  88 => 33,  81 => 28,  77 => 27,  68 => 20,  66 => 19,  63 => 18,  56 => 14,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
