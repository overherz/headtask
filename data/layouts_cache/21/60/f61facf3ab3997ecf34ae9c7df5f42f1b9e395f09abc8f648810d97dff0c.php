<?php

/* applications\projects\layouts\tasks/tasks.html */
class __TwigTemplate_2160f61facf3ab3997ecf34ae9c7df5f42f1b9e395f09abc8f648810d97dff0c extends Twig_Template
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
<script type =\"text/javascript\" src=\"/source/js/search.js\"></script>
<script src=\"");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>

");
    }

    // line 19
    public function block_project_data($context, array $blocks = array())
    {
        // line 20
        $context["inputs"] = $this->env->loadTemplate("/source/search_macro.html");
        // line 21
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" class=\"form-horizontal\" style=\"margin-bottom:0px;\">
    <input type=\"hidden\" name=\"page\" value=\"\">
    <table class=\"table table-condensed\" id=\"filter_table\">
        <tr>
            <th>Статус</th>
            <th>Приоритет</th>
            <th>Тип</th>
            <th>Другое</th>
        </tr>
        <tr>
            <td>");
        // line 31
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "status"), "status"));
        echo \layout::func_from_text("</td>
            <td>");
        // line 32
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "priority"), "priority"));
        echo \layout::func_from_text("</td>
            <td>");
        // line 33
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "type"), "type"));
        echo \layout::func_from_text("</td>
            <td>
                <input type=\"text\" name=\"search\" id=\"search_label\" class=\"input-large\" placeholder=\"Поиск\"><br/><br/>
                ");
        // line 36
        echo \layout::func_from_text($context["inputs"]->getinput($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "percent"), "percent", true));
        echo \layout::func_from_text("
            </td>
        </tr>
    </table>
</form>
<div class=\"clearfix\"></div>
<div id=\"search_result\">
    ");
        // line 43
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "tasks/tasks_table.html"), "method"));
        $template->display($context);
        // line 44
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\tasks/tasks.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 44,  105 => 43,  95 => 36,  89 => 33,  85 => 32,  81 => 31,  69 => 21,  67 => 20,  64 => 19,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
