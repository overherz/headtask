<?php

/* /applications/projects/layouts/project.html */
class __TwigTemplate_440cd63853a0786e37bc0982a882a7fbf1fdfd47e8501ec514bc230e9941df99 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'project' => array($this, 'block_project'),
            'project_data' => array($this, 'block_project_data'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "index.html"), "method"));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo \layout::func_from_text("        Проект \"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    ");
        $this->displayParentBlock("css", $context, $blocks);
        echo \layout::func_from_text("
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/source/css/jquery.fileupload-ui.css\">
");
    }

    // line 12
    public function block_js($context, array $blocks = array())
    {
        // line 13
        $this->displayParentBlock("js", $context, $blocks);
        echo \layout::func_from_text("
    <script type =\"text/javascript\" src=\"/source/js/file_upload/vendor/jquery.ui.widget.js\"></script>
    <script type =\"text/javascript\" src=\"/source/js/file_upload/jquery.iframe-transport.js\"></script>
    <script type =\"text/javascript\" src=\"/source/js/file_upload/jquery.fileupload.js\"></script>
    <script type =\"text/javascript\" src=\"/source/js/file_upload/jquery.fileupload-process.js\"></script>
    <script type =\"text/javascript\" src=\"/source/js/file_upload/jquery.fileupload-ui.js\"></script>
    <script type=\"text/javascript\" src=\"");
        // line 19
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "files.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"></script>
");
    }

    // line 22
    public function block_project($context, array $blocks = array())
    {
        // line 23
        $this->env->loadTemplate("/source/crumbs.html")->display($context);
        // line 24
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project_menu.html"), "method"));
        $template->display($context);
        // line 25
        echo \layout::func_from_text("    ");
        $this->displayBlock('project_data', $context, $blocks);
    }

    public function block_project_data($context, array $blocks = array())
    {
        // line 26
        echo \layout::func_from_text("    ");
    }

    public function getTemplateName()
    {
        return "/applications/projects/layouts/project.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  74 => 24,  69 => 22,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  242 => 86,  238 => 84,  234 => 82,  230 => 80,  220 => 78,  216 => 77,  213 => 76,  209 => 75,  206 => 74,  204 => 73,  201 => 72,  199 => 71,  195 => 69,  186 => 65,  180 => 64,  174 => 63,  169 => 60,  167 => 59,  159 => 56,  154 => 53,  145 => 49,  140 => 46,  138 => 45,  134 => 43,  125 => 42,  120 => 39,  111 => 35,  106 => 32,  104 => 31,  96 => 28,  90 => 27,  84 => 26,  78 => 25,  72 => 23,  63 => 19,  59 => 16,  54 => 13,  51 => 12,  45 => 9,  41 => 8,  38 => 7,  31 => 4,  28 => 3,);
    }
}
