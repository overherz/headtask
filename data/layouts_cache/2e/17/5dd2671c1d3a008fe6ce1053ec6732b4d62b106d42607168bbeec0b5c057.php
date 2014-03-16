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
    <script>
        \$(document).ready(function (\$) {
            setInterval( function() {
                var height = 0;
                var psp = \$(\"#projects_second_panel\").innerHeight();
                var pmp = \$(\"#sidebar\").innerHeight();

                if (psp >= pmp) height = psp;
                else height = pmp;

                \$('#sidebar .well,#projects_second_panel .jumbotron').css({
                    'min-height': height
                });
            }, 100);
        });
    </script>
");
    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        // line 26
        echo \layout::func_from_text("<input type=\"hidden\" name=\"id_project\" value=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
<div class=\"container-fluid\">
    <div style=\"margin: 10px 10px -10px\">
        ");
        // line 29
        $this->env->loadTemplate("/source/crumbs.html")->display($context);
        // line 30
        echo \layout::func_from_text("    </div>
    <div class=\"row row-offcanvas row-offcanvas-left\">
        <div class=\"col-xs-6 col-md-2 sidebar-offcanvas\" id=\"sidebar\" role=\"navigation\" style=\"padding-right: 0;z-index: 2;\">
            <div class=\"well well-sm\" style=\"border: 0;margin-bottom: 0\">
                <div class=\"btn-group\">
                    ");
        // line 35
        if (($this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_project") || $this->getAttribute((isset($context["access"]) ? $context["access"] : null), "add_own_project"))) {
            // line 36
            echo \layout::func_from_text("                        <a href=\"/projects/add/\" class=\"btn btn-primary ");
            if ((isset($context["add"]) ? $context["add"] : null)) {
                echo \layout::func_from_text("active");
            }
            echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\"><i class=\"fa fa-plus\"></i></a>
                    ");
        }
        // line 38
        echo \layout::func_from_text("                    <a href=\"/projects/all/\" class=\"btn btn-info ");
        if ((isset($context["all_projects"]) ? $context["all_projects"] : null)) {
            echo \layout::func_from_text("active");
        }
        echo \layout::func_from_text("\" style=\"margin-bottom: 20px;\" title=\"Все проекты\"><i class=\"fa fa-book\"></i> Все</a>
                </div>
                <div id=\"project_panel_result\">");
        // line 40
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "projects_in_panel.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>

                <form action=\"\" class=\"project_panel_form\" method=\"post\" style=\"margin: 0px;\">
                    <input type=\"hidden\" name=\"project_panel_page\" value=\"\">
                    <input type=\"hidden\" name=\"act\" value=\"get_panel_page_projects\">
                    <input type=\"hidden\" name=\"id_project\" value=\"");
        // line 45
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
                </form>
            </div>
        </div><!--/span-->
        <div class=\"col-xs-12 col-sm-12 col-md-10\" id=\"projects_second_panel\" style=\"padding-left: 0;\">
            <div class=\"jumbotron\" style=\"padding: 10px;margin-bottom: 0;\">
                <p class=\"hidden-md hidden-lg\" style=\"margin-left: -10px;margin-top: -17px;\">
                    <button type=\"button\" class=\"btn btn-primary btn-xs\" data-toggle=\"offcanvas\">Панель проектов</button>
                </p>
            ");
        // line 54
        $this->displayBlock('project', $context, $blocks);
        // line 55
        echo \layout::func_from_text("            </div>
        </div>
    </div>
</div>

");
    }

    // line 54
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
        return array (  136 => 54,  127 => 55,  125 => 54,  113 => 45,  104 => 40,  96 => 38,  88 => 36,  86 => 35,  79 => 30,  77 => 29,  70 => 26,  67 => 25,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
