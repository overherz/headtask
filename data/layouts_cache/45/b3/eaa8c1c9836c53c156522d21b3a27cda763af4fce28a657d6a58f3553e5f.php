<?php

/* applications/projects/layouts/files/files.html */
class __TwigTemplate_45b3eaa8c1c9836c53c156522d21b3a27cda763af4fce28a657d6a58f3553e5f extends Twig_Template
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
        echo \layout::func_from_text("Файлы ");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
    }

    // line 6
    public function block_css($context, array $blocks = array())
    {
        // line 7
        $this->displayParentBlock("css", $context, $blocks);
        echo \layout::func_from_text("
    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/fancybox/", 1 => "jquery.fancybox.css", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 11
    public function block_js($context, array $blocks = array())
    {
        // line 12
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
<script type =\"text/javascript\" src=\"");
        // line 13
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "/source/js/fancybox/", 1 => "jquery.fancybox.pack.js", 2 => true), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
<script type =\"text/javascript\">
    \$(document).ready(function(\$) {
        activate_fancy()
    });
</script>
");
    }

    // line 21
    public function block_project_data($context, array $blocks = array())
    {
        // line 22
        echo \layout::func_from_text("    ");
        $this->env->loadTemplate("/source/search_form.html")->display($context);
        // line 23
        echo \layout::func_from_text("<div id=\"search_result\">
    ");
        // line 24
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files/files_table.html"), "method"));
        $template->display($context);
        // line 25
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/files/files.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 25,  77 => 24,  74 => 23,  71 => 22,  68 => 21,  57 => 13,  53 => 12,  50 => 11,  44 => 8,  40 => 7,  37 => 6,  32 => 4,  29 => 3,);
    }
}
