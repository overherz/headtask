<?php

/* applications\page\layouts\admin/form.html */
class __TwigTemplate_eed208c8cce00d111a9fd6cf2c8d0f4f9f7ce876bc79cec1883020cd1f24c86f extends Twig_Template
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
        echo \layout::func_from_text("<div class=\"add_html\">
<form class=\"new_page\">
    <input type=\"hidden\" name=\"id\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save\">    
    <input type=\"hidden\" name=\"parent\" value=\"");
        // line 5
        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["parent"]) ? $context["parent"] : null), "html", null, true));
        echo \layout::func_from_text("\">        
    
    <div class=\"body\"><span class=\"title\">Название</span>
        <div><input type=\"text\" name=\"name\" value=\"");
        // line 8
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\"></div></div>
    <div class=\"body\"><span class=\"title\">Английское название</span>
        <div><input type=\"text\" name=\"url\" value=\"");
        // line 10
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "url"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\"></div></div>
    <div class=\"body\"><span class=\"title\">Тип</span>
        <div>
            <select name='type'>
                <option value='application'>Приложение</option>
                <option value='link' ");
        // line 15
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "type") == "link")) {
            echo \layout::func_from_text("selected");
        }
        echo \layout::func_from_text(">Ссылка</option>
            </select>
        </div>
    </div>
    <div id=\"app\" ");
        // line 19
        if ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "type") != "application") && $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id"))) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text(">
    <div class=\"body\"><span class=\"title\">Приложение</span>
        <div>    
        ");
        // line 22
        if ((isset($context["applications"]) ? $context["applications"] : null)) {
            // line 23
            echo \layout::func_from_text("                <select name=\"application\">
                    <option value=\"\"></option>
                ");
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["applications"]) ? $context["applications"] : null));
            foreach ($context['_seq'] as $context["k"] => $context["ap"]) {
                // line 26
                echo \layout::func_from_text("                    <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("\" ");
                if (((isset($context["k"]) ? $context["k"] : null) == $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "application"))) {
                    echo \layout::func_from_text("selected");
                }
                echo \layout::func_from_text(">");
                if ($this->getAttribute((isset($context["ap"]) ? $context["ap"] : null), "name")) {
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["ap"]) ? $context["ap"] : null), "name"), "html", null, true));
                } else {
                    echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                }
                echo \layout::func_from_text("</option>
                    ");
                // line 27
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["ap"]) ? $context["ap"] : null), "subapp"));
                foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                    // line 28
                    echo \layout::func_from_text("                        ");
                    if (((isset($context["sub"]) ? $context["sub"] : null) != (isset($context["k"]) ? $context["k"] : null))) {
                        echo \layout::func_from_text("<option value=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                        echo \layout::func_from_text("/");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["sub"]) ? $context["sub"] : null), "html", null, true));
                        echo \layout::func_from_text("\" ");
                        if (((((isset($context["k"]) ? $context["k"] : null) . "/") . (isset($context["sub"]) ? $context["sub"] : null)) == $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "application"))) {
                            echo \layout::func_from_text("selected");
                        }
                        echo \layout::func_from_text(">&nbsp;&nbsp;&nbsp;&nbsp;");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["sub"]) ? $context["sub"] : null), "html", null, true));
                        echo \layout::func_from_text("</option>");
                    }
                    // line 29
                    echo \layout::func_from_text("                    ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                echo \layout::func_from_text("                ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['ap'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo \layout::func_from_text("                </select>
            ");
        } else {
            // line 33
            echo \layout::func_from_text("            не найдены
            ");
        }
        // line 35
        echo \layout::func_from_text("        </div></div>
    <div class=\"body\"><span class=\"title\">Значение</span>
        <div><span id=\"value\">");
        // line 37
        echo \layout::func_from_text((isset($context["values"]) ? $context["values"] : null));
        echo \layout::func_from_text("</span></div></div>
    </div>

    <div class=\"body\" id=\"link\" ");
        // line 40
        if ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "type") == "application") || (!$this->getAttribute((isset($context["page"]) ? $context["page"] : null), "id")))) {
            echo \layout::func_from_text("style='display:none;'");
        }
        echo \layout::func_from_text("><span class=\"title\">Ссылка</span>
    <div><input type=\"text\" name=\"path\" value=\"");
        // line 41
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "path"), "html", null, true));
        echo \layout::func_from_text("\" class=\"input\"></div></div>
    <div class=\"body\"><span class=\"title\">Невидимый</span>
        <span id=\"value\"><input type=\"checkbox\" name=\"invisible\" value=\"1\" style=\"margin-top:-3px;\" ");
        // line 43
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "invisible")) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("></span></div>
    <div class=\"body\"><span class=\"title\">Кликабельный</span>
        <span id=\"value\"><input type=\"checkbox\" name=\"clickable\" value=\"1\" style=\"margin-top:-3px;\" ");
        // line 45
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "clickable")) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("></span></div>
    <div class=\"body\"><span class=\"title\">В новом окне</span>
        <span id=\"value\"><input type=\"checkbox\" name=\"new_window\" value=\"1\" style=\"margin-top:-3px;\" ");
        // line 47
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "new_window")) {
            echo \layout::func_from_text("checked");
        }
        echo \layout::func_from_text("></span></div>
</form>
</div>");
    }

    public function getTemplateName()
    {
        return "applications\\page\\layouts\\admin/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 47,  156 => 45,  149 => 43,  144 => 41,  138 => 40,  132 => 37,  128 => 35,  124 => 33,  120 => 31,  114 => 30,  108 => 29,  93 => 28,  89 => 27,  74 => 26,  70 => 25,  66 => 23,  64 => 22,  56 => 19,  47 => 15,  39 => 10,  34 => 8,  28 => 5,  23 => 3,  19 => 1,);
    }
}
