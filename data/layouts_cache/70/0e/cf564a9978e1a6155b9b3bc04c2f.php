<?php

/* /applications/projects/layouts/index.html */
class __TwigTemplate_700ecf564a9978e1a6155b9b3bc04c2f extends Twig_Template
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
<div class=\"well sidebar-nav\" id=\"for_projects_panel\" style=\"padding:10px;margin: 20px;border: 0;position: relative;\">
    <div class=\"btn-group\">
        ");
        // line 13
        if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project"))) {
            // line 14
            echo \layout::func_from_text("            <a href=\"/projects/add/\" class=\"btn btn-primary btn-small ");
            if ((isset($context["add"]) ? $context["add"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" style=\"margin-bottom: 10px;\"><i class=\"icon-plus icon-white\"></i></a>
        ");
        }
        // line 16
        echo \layout::func_from_text("        <a href=\"/projects/all/\" class=\"btn btn-info btn-small ");
        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" style=\"margin-bottom: 10px;\" title=\"Все проекты\"><i class=\"icon-book icon-white\"></i> Все</a>
    </div>
    <form action=\"\" class=\"project_panel_form\" method=\"post\" style=\"margin: 0px;\">
        <input type=\"hidden\" name=\"project_panel_page\" value=\"\">
        <input type=\"hidden\" name=\"act\" value=\"get_panel_page_projects\">
        <input type=\"hidden\" name=\"id_project\" value=\"");
        // line 21
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    </form>
    <div id=\"project_top_result\">
        ");
        // line 24
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects_in_top.html"), "method"));
        $template->display($context);
        // line 25
        echo \layout::func_from_text("    </div>
</div>
<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div class=\"span2\" id=\"projects_panel\">
            <div class=\"well sidebar-nav\" style=\"padding:10px;border: 0px;\">
                <div class=\"btn-group\">
                ");
        // line 32
        if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project"))) {
            // line 33
            echo \layout::func_from_text("                <a href=\"/projects/add/\" class=\"btn btn-primary ");
            if ((isset($context["add"]) ? $context["add"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\"><i class=\"icon-plus icon-white\"></i></a>
                ");
        }
        // line 35
        echo \layout::func_from_text("                    <a href=\"/projects/all/\" class=\"btn btn-info ");
        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\" title=\"Все проекты\"><i class=\"icon-book icon-white\"></i> Все</a>
                </div>
                <form action=\"\" class=\"project_panel_form\" method=\"post\" style=\"margin: 0px;\">
                    <input type=\"hidden\" name=\"project_panel_page\" value=\"\">
                    <input type=\"hidden\" name=\"act\" value=\"get_panel_page_projects\">
                    <input type=\"hidden\" name=\"id_project\" value=\"");
        // line 40
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
                </form>
                <div id=\"project_panel_result\">
                    ");
        // line 43
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects_in_panel.html"), "method"));
        $template->display($context);
        // line 44
        echo \layout::func_from_text("                </div>
            </div>
        </div>
        <div class=\"span10\" id=\"projects_second_panel\">
            <div class=\"hero-unit\" style=\"padding: 10px;\">
            ");
        // line 49
        $this->displayBlock('project', $context, $blocks);
        // line 50
        echo \layout::func_from_text("            </div>
        </div>
    </div>
</div>

");
    }

    // line 49
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
        return array (  148 => 49,  139 => 50,  137 => 49,  130 => 44,  127 => 43,  121 => 40,  110 => 35,  102 => 33,  100 => 32,  91 => 25,  88 => 24,  82 => 21,  71 => 16,  61 => 13,  44 => 6,  34 => 3,  77 => 25,  74 => 24,  69 => 22,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  242 => 86,  238 => 84,  234 => 82,  230 => 80,  220 => 78,  216 => 77,  213 => 76,  209 => 75,  206 => 74,  204 => 73,  201 => 72,  199 => 71,  195 => 69,  186 => 65,  180 => 64,  174 => 63,  169 => 60,  167 => 59,  159 => 56,  154 => 53,  145 => 49,  140 => 46,  138 => 45,  134 => 43,  125 => 42,  120 => 39,  111 => 35,  106 => 32,  104 => 31,  96 => 28,  90 => 27,  84 => 26,  78 => 25,  72 => 23,  63 => 14,  59 => 16,  54 => 10,  51 => 9,  45 => 9,  41 => 5,  38 => 7,  31 => 2,  28 => 3,);
    }
}
