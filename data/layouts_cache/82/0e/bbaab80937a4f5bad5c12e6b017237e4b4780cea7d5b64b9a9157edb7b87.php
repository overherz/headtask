<?php

/* /applications/projects/layouts/index.html */
class __TwigTemplate_820ebbaab80937a4f5bad5c12e6b017237e4b4780cea7d5b64b9a9157edb7b87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
            'project' => array($this, 'block_project'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((((isset($context["ajax_data"]) ? $context["ajax_data"] : null)) ? ("/source/ajax_wrapper.html") : ("/source/wrapper_index.html")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_css($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 5
    public function block_js($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <script type=\"text/javascript\" src=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo \layout::func_from_text("<input type=\"hidden\" name=\"id_project\" value=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["ajax"]) ? $context["ajax"] : null), "html", null, true));
        echo \layout::func_from_text("
    <div style=\"margin: 10px 15px -15px\">
        ");
        // line 13
        $this->env->loadTemplate("/source/crumbs.html")->display($context);
        // line 14
        echo \layout::func_from_text("    </div>

    <div class=\"jumbotron\" style=\"margin-bottom: 0;\">
    ");
        // line 17
        $this->displayBlock('project', $context, $blocks);
        // line 18
        echo \layout::func_from_text("    </div>
");
    }

    // line 17
    public function block_project($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 17,  71 => 18,  69 => 17,  64 => 14,  62 => 13,  57 => 11,  52 => 10,  49 => 9,  42 => 6,  39 => 5,  32 => 3,  29 => 2,);
    }
}
