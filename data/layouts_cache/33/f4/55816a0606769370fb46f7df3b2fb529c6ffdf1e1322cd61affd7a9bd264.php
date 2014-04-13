<?php

/* applications\projects\layouts\forum/topics_mail.html */
class __TwigTemplate_33f455816a0606769370fb46f7df3b2fb529c6ffdf1e1322cd61affd7a9bd264 extends Twig_Template
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
        echo \layout::func_from_text("<div>Здравствуйте, <b>");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["new_topics"]) ? $context["new_topics"] : null), "fio"), "html", null, true));
        echo \layout::func_from_text("</b></div>

<div>На форумах Таскера появились новые темы</div>

<br><br>
");
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["new_topics"]) ? $context["new_topics"] : null), "topics"));
        foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
            // line 7
            echo \layout::func_from_text("    ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["n"]) ? $context["n"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["nn"]) {
                // line 8
                echo \layout::func_from_text("        ");
                if (((isset($context["project_id"]) ? $context["project_id"] : null) != $this->getAttribute((isset($context["nn"]) ? $context["nn"] : null), "id"))) {
                    // line 9
                    echo \layout::func_from_text("            ");
                    $context["project_id"] = $this->getAttribute((isset($context["nn"]) ? $context["nn"] : null), "id");
                    // line 10
                    echo \layout::func_from_text("            На форумах проекта ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["nn"]) ? $context["nn"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("
        ");
                }
                // line 12
                echo \layout::func_from_text("        <div> <a href=\"http://");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["server_name"]) ? $context["server_name"] : null), "html", null, true));
                echo \layout::func_from_text("/projects/forum/show_topic/");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["nn"]) ? $context["nn"] : null), "topic_id"), "html", null, true));
                echo \layout::func_from_text("/\"><b>");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["nn"]) ? $context["nn"] : null), "topic_name"), "html", null, true));
                echo \layout::func_from_text("</b></a>
    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nn'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "applications\\projects\\layouts\\forum/topics_mail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 12,  43 => 10,  40 => 9,  37 => 8,  32 => 7,  28 => 6,  19 => 1,);
    }
}
