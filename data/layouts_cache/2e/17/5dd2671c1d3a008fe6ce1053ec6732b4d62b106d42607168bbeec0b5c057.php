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
    <div style=\"margin: 10px 10px -10px\">
        ");
        // line 13
        $this->env->loadTemplate("/source/crumbs.html")->display($context);
        // line 14
        echo \layout::func_from_text("    </div>
    <div class=\"row row-offcanvas row-offcanvas-left\">
        <div class=\"col-xs-6 col-md-2 sidebar-offcanvas\" id=\"sidebar\" role=\"navigation\" style=\"padding-right: 0;z-index: 2;\">
            <div class=\"well well-sm\" style=\"background: #222;border: 0;margin-bottom: 20px\">
                <div class=\"btn-group\">
                    ");
        // line 19
        if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project"))) {
            // line 20
            echo \layout::func_from_text("                        <a href=\"/projects/add/\" class=\"btn btn-primary ");
            if ((isset($context["add"]) ? $context["add"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\"><i class=\"fa fa-plus\"></i></a>
                    ");
        }
        // line 22
        echo \layout::func_from_text("                    <a href=\"/projects/all/\" class=\"btn btn-info ");
        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\" title=\"Все проекты\"><i class=\"fa fa-book\"></i> Все</a>
                </div>
                <div id=\"project_panel_result\">");
        // line 24
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects_in_panel.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>

                <form action=\"\" class=\"project_panel_form\" method=\"post\" style=\"margin: 0px;\">
                    <input type=\"hidden\" name=\"project_panel_page\" value=\"\">
                    <input type=\"hidden\" name=\"act\" value=\"get_panel_page_projects\">
                    <input type=\"hidden\" name=\"id_project\" value=\"");
        // line 29
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
                </form>
            </div>
        </div><!--/span-->
        <div class=\"col-xs-12 col-sm-12 col-md-10\" id=\"projects_second_panel\" style=\"padding-left: 0;\">
            <div class=\"jumbotron\" style=\"padding: 10px;margin-bottom: 20px;\">
                <p class=\"hidden-md hidden-lg\" style=\"margin-left: -10px;margin-top: -17px;\">
                    <button type=\"button\" class=\"btn btn-primary btn-xs\" data-toggle=\"offcanvas\">Панель проектов</button>
                </p>
            ");
        // line 38
        $this->displayBlock('project', $context, $blocks);
        // line 39
        echo \layout::func_from_text("            </div>
        </div>
    </div>
</div>

");
    }

    // line 38
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
        return array (  111 => 39,  109 => 38,  97 => 29,  88 => 24,  80 => 22,  70 => 19,  61 => 13,  44 => 6,  34 => 3,  82 => 25,  75 => 24,  72 => 20,  43 => 8,  40 => 7,  33 => 4,  30 => 3,  272 => 98,  268 => 96,  264 => 94,  260 => 92,  250 => 90,  246 => 89,  243 => 88,  239 => 87,  236 => 86,  234 => 85,  231 => 84,  229 => 83,  225 => 81,  216 => 77,  210 => 76,  204 => 75,  199 => 72,  197 => 71,  189 => 68,  184 => 65,  175 => 61,  170 => 58,  168 => 57,  164 => 55,  155 => 54,  150 => 51,  141 => 47,  136 => 44,  134 => 43,  126 => 40,  120 => 38,  114 => 38,  108 => 37,  102 => 36,  93 => 29,  89 => 28,  83 => 24,  78 => 21,  69 => 22,  63 => 14,  56 => 14,  54 => 10,  51 => 9,  45 => 9,  41 => 5,  38 => 7,  31 => 2,  28 => 3,);
    }
}
