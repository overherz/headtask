<?php

/* applications\options\layouts\/admin/options.html */
class __TwigTemplate_96f4e65aacfb2235082c259b03d43f4964d34f85da9d2959826ed679e2e5d02f extends Twig_Template
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
        if ((isset($context["options"]) ? $context["options"] : null)) {
            // line 2
            echo \layout::func_from_text("<table class=\"table table-bordered table-condensed\">
    <tbody>
    ");
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["k"] => $context["g"]) {
                // line 5
                echo \layout::func_from_text("    ");
                if (($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id_parent") > 0)) {
                    // line 6
                    echo \layout::func_from_text("        <tr class=\"warning\">
            <td style=\"font-weight: bold;\" colspan=\"2\">");
                    // line 7
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "group_name"), "html", null, true));
                    echo \layout::func_from_text("</td>
            ");
                    // line 8
                    if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                        // line 9
                        echo \layout::func_from_text("                <td style=\"width: 1px;\"><a title=\"Изменить\" class=\"fa fa-edit fa-15x edit-btn edit-btn-subcategory\" id=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                        echo \layout::func_from_text("\"></a></td>
                <td style=\"width: 1px;\"><a title=\"Удалить\" class=\"fa fa-trash-o fa-15x del-btn\" id=\"");
                        // line 10
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                        echo \layout::func_from_text("\"></a></td>
            ");
                    }
                    // line 12
                    echo \layout::func_from_text("        </tr>
    ");
                }
                // line 14
                echo \layout::func_from_text("    ");
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "sub"));
                foreach ($context['_seq'] as $context["_key"] => $context["o"]) {
                    // line 15
                    echo \layout::func_from_text("    <tr>
        <td style=\"width:300px;padding:5px;\" title=\"");
                    // line 16
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("
            <div style=\"font-size: 11px;\">");
                    // line 17
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "description"), "html", null, true));
                    echo \layout::func_from_text("</div>
        </td>
        <td style=\"padding:5px;width: 4000px;\">
            <form>
            ");
                    // line 21
                    if (($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "text")) {
                        // line 22
                        echo \layout::func_from_text("                <input type='text' name=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                        echo \layout::func_from_text("\" value=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "value"), "html", null, true));
                        echo \layout::func_from_text("\" oname=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "name"), "html", null, true));
                        echo \layout::func_from_text("\" style=\"width: 100%;\">
            ");
                    } elseif (($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "textarea")) {
                        // line 24
                        echo \layout::func_from_text("            <textarea name='");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                        echo \layout::func_from_text("' class=\"input_text\" style=\"height:150px;width: 100%;\" oname=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "name"), "html", null, true));
                        echo \layout::func_from_text("\">");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "value"), "html", null, true));
                        echo \layout::func_from_text("</textarea>
            ");
                    } elseif (($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "checkbox")) {
                        // line 26
                        echo \layout::func_from_text("            <input type='checkbox' name='");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                        echo \layout::func_from_text("' value=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "value"), "html", null, true));
                        echo \layout::func_from_text("\" oname=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "name"), "html", null, true));
                        echo \layout::func_from_text("\" ");
                        if (($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "value") == "1")) {
                            echo \layout::func_from_text("checked");
                        }
                        echo \layout::func_from_text(">
            ");
                    } elseif ((($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "select") || ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "multy_select"))) {
                        // line 28
                        echo \layout::func_from_text("                ");
                        if ($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "options")) {
                            // line 29
                            echo \layout::func_from_text("                    <select oname=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "name"), "html", null, true));
                            echo \layout::func_from_text("\" name=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                            echo \layout::func_from_text("\" ");
                            if (($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "multy_select")) {
                                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "options")) > 4)) {
                                    echo \layout::func_from_text("size='4'");
                                } else {
                                    echo \layout::func_from_text("size='");
                                    echo \layout::func_from_text(twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "options")), "html", null, true));
                                    echo \layout::func_from_text("'");
                                }
                                echo \layout::func_from_text(" multiple");
                            }
                            echo \layout::func_from_text(">
                    ");
                            // line 30
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "options"));
                            foreach ($context['_seq'] as $context["k"] => $context["op"]) {
                                // line 31
                                echo \layout::func_from_text("                        <option value=\"");
                                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                                echo \layout::func_from_text("\" ");
                                if (twig_in_filter((isset($context["k"]) ? $context["k"] : null), $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "value"))) {
                                    echo \layout::func_from_text("selected");
                                }
                                echo \layout::func_from_text(">");
                                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["op"]) ? $context["op"] : null), "html", null, true));
                                echo \layout::func_from_text("</option>
                    ");
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['k'], $context['op'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 33
                            echo \layout::func_from_text("                    </select>
                ");
                        }
                        // line 35
                        echo \layout::func_from_text("            ");
                    } elseif (($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "radio")) {
                        // line 36
                        echo \layout::func_from_text("                ");
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "options"));
                        foreach ($context['_seq'] as $context["k"] => $context["op"]) {
                            // line 37
                            echo \layout::func_from_text("                    <input oname=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "name"), "html", null, true));
                            echo \layout::func_from_text("\" type=\"radio\" name=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                            echo \layout::func_from_text("\" value=\"");
                            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                            echo \layout::func_from_text("\" ");
                            if (twig_in_filter((isset($context["k"]) ? $context["k"] : null), $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "value"))) {
                                echo \layout::func_from_text("checked");
                            }
                            echo \layout::func_from_text(">&nbsp;");
                            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["op"]) ? $context["op"] : null), "html", null, true));
                            echo \layout::func_from_text("&nbsp;&nbsp;
                ");
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['k'], $context['op'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 39
                        echo \layout::func_from_text("            ");
                    }
                    // line 40
                    echo \layout::func_from_text("            </form>
        </td>
        ");
                    // line 42
                    if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                        echo \layout::func_from_text("<td style=\"width: 1px;\" colspan=\"2\"><a href=\"/admin/options/constructor/");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "id"), "html", null, true));
                        echo \layout::func_from_text("\" class=\"fa fa-15x fa-edit edit-btn\"></a></td>");
                    }
                    // line 43
                    echo \layout::func_from_text("    ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo \layout::func_from_text("    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['g'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo \layout::func_from_text("    </tbody>
</table>
");
        } else {
            // line 48
            echo \layout::func_from_text("настроек не найдено
");
        }
    }

    public function getTemplateName()
    {
        return "applications\\options\\layouts\\/admin/options.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 48,  208 => 45,  202 => 44,  196 => 43,  190 => 42,  186 => 40,  183 => 39,  164 => 37,  159 => 36,  156 => 35,  152 => 33,  137 => 31,  133 => 30,  115 => 29,  112 => 28,  98 => 26,  88 => 24,  78 => 22,  76 => 21,  69 => 17,  63 => 16,  60 => 15,  55 => 14,  51 => 12,  46 => 10,  41 => 9,  39 => 8,  35 => 7,  32 => 6,  29 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
