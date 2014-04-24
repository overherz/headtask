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
");
    }

    // line 21
    public function block_project($context, array $blocks = array())
    {
        // line 22
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "project_menu.html"), "method"));
        $template->display($context);
        // line 23
        echo \layout::func_from_text("    ");
        $this->displayBlock('project_data', $context, $blocks);
    }

    public function block_project_data($context, array $blocks = array())
    {
        // line 24
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
        return array (  78 => 24,  68 => 22,  65 => 21,  54 => 13,  51 => 12,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  308 => 118,  301 => 113,  299 => 112,  296 => 111,  292 => 109,  289 => 108,  275 => 107,  271 => 106,  253 => 105,  251 => 104,  244 => 99,  242 => 98,  237 => 95,  232 => 92,  223 => 89,  219 => 88,  214 => 86,  204 => 85,  200 => 83,  196 => 82,  185 => 73,  183 => 72,  176 => 69,  173 => 68,  169 => 67,  167 => 66,  163 => 64,  160 => 63,  137 => 43,  122 => 42,  116 => 41,  112 => 39,  108 => 37,  95 => 35,  91 => 34,  88 => 33,  86 => 32,  76 => 24,  73 => 22,  71 => 23,  69 => 20,  66 => 19,  63 => 18,  57 => 15,  52 => 13,  49 => 12,  42 => 8,  39 => 7,  32 => 4,  29 => 3,);
    }
}
