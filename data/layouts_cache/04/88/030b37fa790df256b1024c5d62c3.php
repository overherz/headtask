<?php

/* applications\options\layouts\/admin/options.html */
class __TwigTemplate_0488030b37fa790df256b1024c5d62c3 extends Twig_Template
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
            echo \layout::func_from_text("<table class=\"controls-tbl\" style=\"margin-top:10px;width:100%;\">
    <caption>Настройки</caption>
    <tr>
        <th>Название</th>
        <th>Значение</th>
        ");
            // line 7
            if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                echo \layout::func_from_text("<th colspan=\"1\">Управление</th>");
            }
            // line 8
            echo \layout::func_from_text("    </tr>
    ");
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["g"]) {
                // line 10
                echo \layout::func_from_text("    ");
                if (($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "id_parent") > 0)) {
                    // line 11
                    echo \layout::func_from_text("        <tr>
            <td style=\"font-weight: bold;\" colspan=\"");
                    // line 12
                    echo \layout::func_from_text((((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) ? ("3") : ("2")));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["g"]) ? $context["g"] : null), "group_name"), "html", null, true));
                    echo \layout::func_from_text("</td>
        </tr>
    ");
                }
                // line 15
                echo \layout::func_from_text("    ");
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["g"]) ? $context["g"] : null), "sub"));
                foreach ($context['_seq'] as $context["_key"] => $context["o"]) {
                    // line 16
                    echo \layout::func_from_text("    <tr>
        <td style=\"width:300px;padding:5px;\" title=\"");
                    // line 17
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                    echo \layout::func_from_text("\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("
            <div style=\"font-size: 11px;\">");
                    // line 18
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "description"), "html", null, true));
                    echo \layout::func_from_text("</div>
        </td>
        <td style=\"padding:5px;\">
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
                        echo \layout::func_from_text("\" class=\"input_text\">
            ");
                    } elseif (($this->getAttribute((isset($context["o"]) ? $context["o"] : null), "type") == "textarea")) {
                        // line 24
                        echo \layout::func_from_text("            <textarea name='");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "key_name"), "html", null, true));
                        echo \layout::func_from_text("' class=\"input_text\" style=\"height:150px;\" oname=\"");
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
                            echo \layout::func_from_text("> ");
                            echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["op"]) ? $context["op"] : null), "html", null, true));
                            echo \layout::func_from_text("
                ");
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['k'], $context['op'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 39
                        echo \layout::func_from_text("            ");
                    }
                    // line 40
                    echo \layout::func_from_text("        </td>
        ");
                    // line 41
                    if ((isset($context["dev_mode"]) ? $context["dev_mode"] : null)) {
                        echo \layout::func_from_text("<td style=\"width: 1px;\"><a href=\"/admin/options/constructor/");
                        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["o"]) ? $context["o"] : null), "id"), "html", null, true));
                        echo \layout::func_from_text("\" class=\"edit-btn\"></a></td>");
                    }
                    // line 42
                    echo \layout::func_from_text("    ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo \layout::func_from_text("    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['g'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo \layout::func_from_text("</table>
");
        } else {
            // line 46
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
        return array (  208 => 46,  204 => 44,  198 => 43,  192 => 42,  186 => 41,  183 => 40,  180 => 39,  161 => 37,  156 => 36,  153 => 35,  149 => 33,  134 => 31,  130 => 30,  112 => 29,  109 => 28,  95 => 26,  85 => 24,  75 => 22,  73 => 21,  67 => 18,  61 => 17,  58 => 16,  53 => 15,  45 => 12,  42 => 11,  39 => 10,  35 => 9,  32 => 8,  28 => 7,  21 => 2,  19 => 1,);
    }
}
