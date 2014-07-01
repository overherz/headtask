<?php

/* applications/projects/layouts/review_post.html */
class __TwigTemplate_85140274251bbe924bb35b656800bbcd26f9211f7e2c4234ac59baf0615cabc2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo \layout::func_from_text("<table class=\"table review_table table-condensed\">
    <tr>
        <th>Статистика ");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("</th>
    </tr>
    <tr>
        <td>
            <table class=\"table-condensed table_statistic\">
                <tr>
                    <td>
                        <span class=\"label label-info\">");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "all"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_all"), "html", null, true));
        echo \layout::func_from_text(" :
                        <span class=\"label label-info\">");
        // line 11
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_new", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "new"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                        <span class=\"label label-info\">");
        // line 12
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "in_progress"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_progress"), "html", null, true));
        echo \layout::func_from_text("
                        <span class=\"label label-info\">");
        // line 13
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_closed", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "closed"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("
                        <span class=\"label label-info\">");
        // line 14
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0)), "html", null, true));
        echo \layout::func_from_text("</span> ");
        echo \layout::func_from_text(twig_escape_filter($this->env, lang("stats_tasks_rejected", (($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "rejected"), 0)) : (0))), "html", null, true));
        echo \layout::func_from_text("

                        ");
        // line 16
        if ((isset($context["categories"]) ? $context["categories"] : null)) {
            // line 17
            echo \layout::func_from_text("                        <div style=\"margin-top: 15px;\">
                        <div style=\"font-weight:bold;margin-bottom: 10px;\">Открытые задачи по категориям </div>
                        ");
            // line 19
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 20
                echo \layout::func_from_text("                            <a href=\"/projects/tasks/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["project"]) ? $context["project"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("/?cat=");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" class=\"list-group-item\">
                                <span class=\"label\" style=\"margin-right: 20px;background: ");
                // line 21
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color"), "html", null, true));
                echo \layout::func_from_text(";color: ");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "color_text"), "html", null, true));
                echo \layout::func_from_text("\">
                                    ");
                // line 22
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("
                                </span>
                                <span class=\"label label-info pull-right\" style=\"margin-top: 3px;\">");
                // line 24
                echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["stats"]) ? $context["stats"] : null), "cats", array(), "any", false, true), $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "id"), array(), "array"), "0")) : ("0")), "html", null, true));
                echo \layout::func_from_text("</span>
                            </a>
                        ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo \layout::func_from_text("                        </div>
                        ");
        }
        // line 29
        echo \layout::func_from_text("                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>");
    }

    public function getTemplateName()
    {
        return "applications/projects/layouts/review_post.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 29,  101 => 27,  92 => 24,  87 => 22,  81 => 21,  74 => 20,  70 => 19,  66 => 17,  64 => 16,  57 => 14,  51 => 13,  45 => 12,  39 => 11,  33 => 10,  23 => 3,  19 => 1,);
    }
}
