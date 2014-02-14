<?php

/* applications\groups\layouts\admin/form.html */
class __TwigTemplate_c3939b7b19288a2435d67ef08b018b0b2ca73d17b937c0ad65af9d10c56a162f extends Twig_Template
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
<form id=\"group_form\">
    <input type=\"hidden\" name=\"id\" value=\"");
        // line 3
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "id"), "html", null, true));
        echo \layout::func_from_text("\">
    <input type=\"hidden\" name=\"act\" value=\"save\">
    <input type=\"hidden\" name=\"mode\" value=\"");
        // line 5
        echo \layout::func_from_text(twig_escape_filter($this->env, ((array_key_exists("mode", $context)) ? (_twig_default_filter((isset($context["mode"]) ? $context["mode"] : null), "new")) : ("new")), "html", null, true));
        echo \layout::func_from_text("\">
    <div class=\"body\"><span class=\"title\">Название:</span>
        <div><input type=\"text\" name=\"name\" class=\"input\" style=\"width:350px;\" value=\"");
        // line 7
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "name"), "html", null, true));
        echo \layout::func_from_text("\"></div></div>
    <div class=\"body\"><span class=\"title\">Цвет:</span>
        <input type=\"hidden\" name=\"color\" class=\"input\" value=\"");
        // line 9
        echo \layout::func_from_text(twig_escape_filter($this->env, (($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "color", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "color"), "#000000")) : ("#000000")), "html", null, true));
        echo \layout::func_from_text("\"></div>

");
        // line 11
        if ((($this->getAttribute($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "admin"), "id_group") == 1) && ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "id") != 1))) {
            // line 12
            echo \layout::func_from_text("    <div class=\"body\"><span class=\"title\">Разрешения</span>
        <div>
            <ul style=\"list-style: none;\">
                <input name=\"access_site[authorization]\" type=\"checkbox\" ");
            // line 15
            if ($this->getAttribute($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "access_site"), "authorization")) {
                echo \layout::func_from_text("checked");
            }
            echo \layout::func_from_text(" style=\"margin-bottom: 3px;\"> Авторизация
            </ul>
        </div></div>
    <div class=\"body\"><span class=\"title\">Доступ в панель управления: </span
        <div><input type=\"checkbox\" name=\"access_admin\" value=\"1\" ");
            // line 19
            if (($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "access_admin") == 1)) {
                echo \layout::func_from_text("checked");
            }
            echo \layout::func_from_text("></div>
    <div class=\"body\"><div class=\"title\" style=\"font-weight: bold;color:#A00002;text-align: center;\">Ограничения панели управления</div>
        <table><tr>
        ");
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["globals"]) ? $context["globals"] : null), "root_menu"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["k"] => $context["l"]) {
                // line 23
                echo \layout::func_from_text("            ");
                if (((isset($context["group_name"]) ? $context["group_name"] : null) != $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "name"))) {
                    $context["group_name"] = $this->getAttribute((isset($context["l"]) ? $context["l"] : null), "name");
                }
                echo \layout::func_from_text("<td valign=\"top\" style=\"padding-right: 5px;\"><div style=\"background:#dcdcdc;padding:2px;text-align: center;padding-left:5px;padding-right: 5px;\">");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["group_name"]) ? $context["group_name"] : null), "html", null, true));
                echo \layout::func_from_text(" <input type=\"checkbox\" class=\"check_all\"></div><ul>
            ");
                // line 24
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["l"]) ? $context["l"] : null), "submenu"));
                foreach ($context['_seq'] as $context["h"] => $context["g"]) {
                    // line 25
                    echo \layout::func_from_text("            ");
                    if ((($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "count") > 1) && ($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "category") != ""))) {
                        // line 26
                        echo \layout::func_from_text("                ");
                        if (((isset($context["category"]) ? $context["category"] : null) != $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "category"))) {
                            echo \layout::func_from_text("<li style=\"margin-left: 0px;list-style: none;\">");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "category"), "html", null, true));
                        }
                        // line 27
                        echo \layout::func_from_text("                ");
                        $context["category"] = $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "category");
                        $context["show_category"] = true;
                        // line 28
                        echo \layout::func_from_text("            ");
                    } else {
                        // line 29
                        echo \layout::func_from_text("            ");
                        $context["show_category"] = false;
                        // line 30
                        echo \layout::func_from_text("            ");
                    }
                    // line 31
                    echo \layout::func_from_text("                <li style=\"margin-left: ");
                    if ((isset($context["show_category"]) ? $context["show_category"] : null)) {
                        echo \layout::func_from_text("15");
                    } else {
                        echo \layout::func_from_text("0");
                    }
                    echo \layout::func_from_text("px;list-style: none;\"><input name=\"access[]\" type=\"checkbox\" value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "url"), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (twig_in_filter($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "url"), $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "access"))) {
                        echo \layout::func_from_text("checked");
                    }
                    echo \layout::func_from_text(" style=\"margin-bottom: 3px;\"> ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</li>
            ");
                    // line 32
                    if ((isset($context["show_category"]) ? $context["show_category"] : null)) {
                        echo \layout::func_from_text("</li>");
                    }
                    // line 33
                    echo \layout::func_from_text("            ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['h'], $context['g'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 34
                echo \layout::func_from_text("            </ul></td>
            ");
                // line 35
                if ((($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 3) == 0)) {
                    echo \layout::func_from_text("</tr><tr>");
                }
                // line 36
                echo \layout::func_from_text("        ");
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['l'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo \layout::func_from_text("        </table></div>
");
        }
        // line 39
        echo \layout::func_from_text("</form>
</div>
");
    }

    public function getTemplateName()
    {
        return "applications\\groups\\layouts\\admin/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 39,  167 => 37,  153 => 36,  149 => 35,  146 => 34,  140 => 33,  136 => 32,  119 => 31,  116 => 30,  113 => 29,  110 => 28,  106 => 27,  100 => 26,  97 => 25,  93 => 24,  84 => 23,  67 => 22,  59 => 19,  50 => 15,  45 => 12,  43 => 11,  38 => 9,  33 => 7,  28 => 5,  23 => 3,  19 => 1,);
    }
}
