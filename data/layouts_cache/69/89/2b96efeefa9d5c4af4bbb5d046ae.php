<?php

/* applications\projects\layouts\files/files.html */
class __TwigTemplate_69892b96efeefa9d5c4af4bbb5d046ae extends Twig_Template
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
<script type =\"text/javascript\" src=\"/source/js/fancybox/jquery.fancybox.pack.js\"></script>
<script type =\"text/javascript\">
    \$(document).ready(function(\$) {
        activate_fancy()
    });
</script>
");
    }

    // line 23
    public function block_project_data($context, array $blocks = array())
    {
        // line 24
        echo \layout::func_from_text("<form action=\"\" id=\"search_form\" method=\"post\" style=\"margin: 0px;\">
    <input type=\"text\" size=\"50\" name=\"search\" class=\"input-large\" placeholder=\"Поиск\">
    <input type=\"hidden\" name=\"page\" value=\"\">
</form>
<div id=\"search_result\">
    ");
        // line 29
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
        $template->display($context);
        // line 30
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\files/files.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 30,  75 => 29,  68 => 24,  65 => 23,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
