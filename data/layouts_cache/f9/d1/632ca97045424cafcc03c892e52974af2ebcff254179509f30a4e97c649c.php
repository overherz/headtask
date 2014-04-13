<?php

/* applications\options\layouts\/admin/edit_subgroup.html */
class __TwigTemplate_f9d1632ca97045424cafcc03c892e52974af2ebcff254179509f30a4e97c649c extends Twig_Template
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
        echo \layout::func_from_text("<form class=\"subgroup\">
    <input type=\"hidden\" name=\"act\" value=\"save_subgroup\">
    <input type=\"hidden\" name=\"act_group\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["act"]) ? $context["act"] : null), "html", null, true));
        echo \layout::func_from_text("\">
    ");
        // line 4
        if ($this->getAttribute((isset($context["subcategory"]) ? $context["subcategory"] : null), "id")) {
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["subcategory"]) ? $context["subcategory"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">");
        }
        // line 5
        echo \layout::func_from_text("    <div class=\"body\"><span class=\"title\">Группа:</span>
        <div>
            <select name='category'>
                ");
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cats"]) ? $context["cats"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 9
            echo \layout::func_from_text("                    <option value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\" ");
            if (($this->getAttribute((isset($context["subcategory"]) ? $context["subcategory"] : null), "id_parent") == $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "id"))) {
                echo \layout::func_from_text("selected");
            }
            echo \layout::func_from_text(">");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["c"]) ? $context["c"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("</option>
                ");
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo \layout::func_from_text("            </select>
        </div>
    </div>
    <div class=\"body\"><span class=\"title\">Название:</span>
        <div><input type=\"text\" name=\"name\" value=\"");
        // line 15
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["subcategory"]) ? $context["subcategory"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input_text\"></div></div>
</form>
");
    }

    public function getTemplateName()
    {
        return "applications\\options\\layouts\\/admin/edit_subgroup.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 15,  57 => 11,  42 => 9,  38 => 8,  33 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }
}
