<?php

/* /applications/projects/layouts/index.html */
class __TwigTemplate_2e175dd2671c1d3a008fe6ce1053ec6732b4d62b106d42607168bbeec0b5c057 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/wrapper_index.html");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
            'project' => array($this, 'block_project'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/wrapper_index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
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
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects.js"), "method"), "html", null, true));
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
<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-sm-12 col-lg-2\" id=\"sidebar\" role=\"navigation\">
            <div class=\"well well-sm\">
                <div class=\"btn-group\">
                    ");
        // line 16
        if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project"))) {
            // line 17
            echo \layout::func_from_text("                        <a href=\"/projects/add/\" class=\"btn btn-primary ");
            if ((isset($context["add"]) ? $context["add"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\"><i class=\"fa fa-plus\"></i></a>
                    ");
        }
        // line 19
        echo \layout::func_from_text("                    <a href=\"/projects/all/\" class=\"btn btn-info ");
        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\" title=\"Все проекты\"><i class=\"fa fa-book\"></i> Все</a>
                </div>
                ");
        // line 21
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects_in_panel.html"), "method"));
        $template->display($context);
        // line 22
        echo \layout::func_from_text("
                <form action=\"\" class=\"project_panel_form\" method=\"post\" style=\"margin: 0px;\">
                    <input type=\"hidden\" name=\"project_panel_page\" value=\"\">
                    <input type=\"hidden\" name=\"act\" value=\"get_panel_page_projects\">
                    <input type=\"hidden\" name=\"id_project\" value=\"");
        // line 26
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
                </form>
            </div>
        </div><!--/span-->
        <div class=\"col-sm-12 col-lg-10\" id=\"projects_second_panel\">
            <div class=\"jumbotron\" style=\"padding: 10px;\">

            ");
        // line 33
        $this->displayBlock('project', $context, $blocks);
        // line 34
        echo \layout::func_from_text("            </div>
        </div>
    </div>
</div>

");
    }

    // line 33
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
        return array (  112 => 33,  103 => 34,  101 => 33,  91 => 26,  85 => 22,  82 => 21,  74 => 19,  66 => 17,  64 => 16,  54 => 10,  51 => 9,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
