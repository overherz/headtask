<?php

/* applications\page\layouts\admin/elements/select_ids.html */
class __TwigTemplate_e8e41b55e404eda0ab05672bc60b043ef3715cb72ad9c0be78ece2262827806c extends Twig_Template
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
        if ((isset($context["ids"]) ? $context["ids"] : null)) {
            // line 2
            echo \layout::func_from_text("<select name=\"value\">
    <option></option>
    ");
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["ids"]) ? $context["ids"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["id"]) {
                // line 5
                echo \layout::func_from_text("    ");
                if ($this->getAttribute((isset($context["id"]) ? $context["id"] : null), "id_user")) {
                    $context["i"] = $this->getAttribute((isset($context["id"]) ? $context["id"] : null), "id_user");
                } else {
                    $context["i"] = $this->getAttribute((isset($context["id"]) ? $context["id"] : null), "id");
                }
                // line 6
                echo \layout::func_from_text("    <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true));
                echo \layout::func_from_text("\" ");
                if ((((isset($context["i"]) ? $context["i"] : null) == (isset($context["value"]) ? $context["value"] : null)) && ((isset($context["value"]) ? $context["value"] : null) != ""))) {
                    echo \layout::func_from_text("selected");
                }
                echo \layout::func_from_text(">");
                if ($this->getAttribute((isset($context["id"]) ? $context["id"] : null), "name")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["id"]) ? $context["id"] : null), "name"), "html", null, true));
                } elseif ($this->getAttribute((isset($context["id"]) ? $context["id"] : null), "url")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["id"]) ? $context["id"] : null), "url"), "html", null, true));
                } elseif ($this->getAttribute((isset($context["id"]) ? $context["id"] : null), "title")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["id"]) ? $context["id"] : null), "title"), "html", null, true));
                } elseif ($this->getAttribute((isset($context["id"]) ? $context["id"] : null), "fio")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["id"]) ? $context["id"] : null), "fio"), "html", null, true));
                }
                echo \layout::func_from_text("</option>
    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['id'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo \layout::func_from_text("</select>
");
        } else {
            // line 10
            echo \layout::func_from_text("ничего не найдено
");
        }
    }

    public function getTemplateName()
    {
        return "applications\\page\\layouts\\admin/elements/select_ids.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 10,  59 => 8,  36 => 6,  29 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
