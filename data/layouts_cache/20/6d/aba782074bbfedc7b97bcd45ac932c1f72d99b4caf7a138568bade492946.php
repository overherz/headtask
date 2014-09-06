<?php

/* applications/projects/layouts/all_projects.html */
class __TwigTemplate_206daba782074bbfedc7b97bcd45ac932c1f72d99b4caf7a138568bade492946 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'project' => array($this, 'block_project'),
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
        echo \layout::func_from_text("Все проекты
");
    }

    // line 7
    public function block_project($context, array $blocks = array())
    {
        // line 8
        echo \layout::func_from_text("    <form action=\"\" id=\"search_form\" method=\"post\">
        <div class=\"form-group col-xs-6\" style=\"padding-left: 0;\">
            <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Поиск\" style=\"margin-bottom: 10px;\">
            <table class=\"table table_style no_style\" style=\"width: auto;margin-top: 0;clear: both;\">
                <thead>
                    <tr>
                        <th>Статус</th>
                        <th>Участие</th>
                        <th>Принадлежность</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name=\"archive[]\" multiple size=\"2\">
                                <option value=\"1\" selected>текущие</option>
                                <option value=\"2\">архивные</option>
                            </select>
                        </td>
                        <td>
                            <select name=\"in[]\" multiple size=\"2\">
                                <option value=\"1\" selected>участвую</option>
                                <option value=\"2\">не участвую</option>
                            </select>
                        </td>
                        <td>
                            <select name=\"my[]\" multiple size=\"2\">
                                <option value=\"1\" selected>личные</option>
                                <option value=\"2\" ");
        // line 36
        if (((!$this->getAttribute((isset($context["get_data"]) ? $context["get_data"] : null), "filter")) == "my")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">общие</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type=\"hidden\" name=\"page\" value=\"\">
    </form>
    <div class=\"clearfix\"></div>

<div id=\"search_result\">");
        // line 47
        $template = $this->env->resolveTemplate($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "projects", 1 => "all_projects_table.html"), "method"));
        $template->display($context);
        echo \layout::func_from_text("</div>
");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/all_projects.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 47,  68 => 36,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
