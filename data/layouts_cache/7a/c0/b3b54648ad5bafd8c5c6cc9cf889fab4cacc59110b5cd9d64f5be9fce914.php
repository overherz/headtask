<?php

/* applications\options\layouts\admin/constructor.html */
class __TwigTemplate_7ac0b3b54648ad5bafd8c5c6cc9cf889fab4cacc59110b5cd9d64f5be9fce914 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("/source/admin/index.html");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/source/admin/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo \layout::func_from_text("    &rarr; Конструктор настроек
");
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
        // line 6
        echo \layout::func_from_text("    <link rel=\"stylesheet\" type=\"text/css\" href=\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "options", 1 => "options.css"), "method"), "html", null, true));
        echo \layout::func_from_text("\">
");
    }

    // line 8
    public function block_js($context, array $blocks = array())
    {
        // line 9
        echo \layout::func_from_text("    ,\"");
        echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : null), "path", array(0 => "options", 1 => "constructor.js"), "method"), "html", null, true));
        echo \layout::func_from_text("\"
");
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        if ((isset($context["develop"]) ? $context["develop"] : null)) {
            // line 14
            echo \layout::func_from_text("Включите режим разработчика
");
        } elseif ((isset($context["options"]) ? $context["options"] : null)) {
            // line 16
            echo \layout::func_from_text("<input type=\"hidden\" name=\"id\" value=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">
<table id=\"constructor\" class=\"table table-condensed table-bordered\">
    <tr>
        <th><strong>Настройки</strong></th>
        <th><strong>Значение</strong></th>
    </tr>
    <tr><td style=\"width:50%;vertical-align: top;\">
    <table style=\"width: 100%;margin-bottom: 20px;\" id=\"constructor_settings\">
        <tr>
            <td>Группа: </td>
            <td>
                <select name=\"id_group\">
                    ");
            // line 28
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["options"]) ? $context["options"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["op"]) {
                // line 29
                echo \layout::func_from_text("                        <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"), "html", null, true));
                echo \layout::func_from_text("\" ");
                if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id_group") == $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "id"))) {
                    echo \layout::func_from_text("selected");
                }
                echo \layout::func_from_text(">");
                echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["op"]) ? $context["op"] : null), "name"), "html", null, true));
                echo \layout::func_from_text("</option>
                        ");
                // line 30
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["op"]) ? $context["op"] : null), "sub"));
                foreach ($context['_seq'] as $context["_key"] => $context["sub"]) {
                    // line 31
                    echo \layout::func_from_text("                            <option value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "id"), "html", null, true));
                    echo \layout::func_from_text("\" ");
                    if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id_group") == $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "id"))) {
                        echo \layout::func_from_text("selected");
                    }
                    echo \layout::func_from_text(">-- ");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["sub"]) ? $context["sub"] : null), "name"), "html", null, true));
                    echo \layout::func_from_text("</option>
                        ");
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 33
                echo \layout::func_from_text("                    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['op'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo \layout::func_from_text("                </select>                                
            </td>
        </tr>
        <tr>
            <td style=\"width:1px;white-space: nowrap;\">Название ключа: </td>
            <td><input type=\"text\" name=\"key_name\" style=\"width: 98%;\" value=\"");
            // line 39
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "key_name"), "html", null, true));
            echo \layout::func_from_text("\"></td>
        </tr>
        <tr>
            <td>Название: </td>
            <td><input type=\"text\" name=\"name\" style=\"width: 98%;\" value=\"");
            // line 43
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "name"), "html", null, true));
            echo \layout::func_from_text("\"></td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><textarea name='descr' style='width:98%;height: 100px;' class=\"input\">");
            // line 47
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "description"), "html", null, true));
            echo \layout::func_from_text("</textarea></td>
        </tr>
        <tr>
            <td>Тип: </td>
            <td>
                <select name=\"type\">
                    <option value=\"type_no_change\">---</option>        
                    ");
            // line 54
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["types"]) ? $context["types"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
                // line 55
                echo \layout::func_from_text("                    <option value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
                echo \layout::func_from_text("\" ");
                if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == (isset($context["t"]) ? $context["t"] : null))) {
                    echo \layout::func_from_text("selected");
                }
                echo \layout::func_from_text(">");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["t"]) ? $context["t"] : null), "html", null, true));
                echo \layout::func_from_text("</option>
                    ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo \layout::func_from_text("                </select>                
            </td>
        </tr>
    </table>
    </td>
    <td id=\"constructor_box1\" style=\"width:50%;\" valign=\"top\">
        ");
            // line 63
            if ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id")) {
                // line 64
                echo \layout::func_from_text("        <div>
            ");
                // line 65
                if ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == "select") || ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == "radio"))) {
                    // line 66
                    echo \layout::func_from_text("            <select name='value' ");
                    if ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "multy_select")) {
                        echo \layout::func_from_text("multiple");
                    }
                    echo \layout::func_from_text(">
                ");
                    // line 67
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "options"));
                    foreach ($context['_seq'] as $context["k"] => $context["ov"]) {
                        // line 68
                        echo \layout::func_from_text("                <option value=\"");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                        echo \layout::func_from_text("\" ");
                        if (twig_in_filter((isset($context["k"]) ? $context["k"] : null), $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "value"))) {
                            echo \layout::func_from_text("selected");
                        }
                        echo \layout::func_from_text(">");
                        echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["ov"]) ? $context["ov"] : null), "html", null, true));
                        echo \layout::func_from_text("</option>
                ");
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['k'], $context['ov'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 70
                    echo \layout::func_from_text("            </select>
            ");
                } elseif (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == "checkbox")) {
                    // line 72
                    echo \layout::func_from_text("                <div><input type='checkbox' name='value' ");
                    if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "value") == "1")) {
                        echo \layout::func_from_text("checked");
                    }
                    echo \layout::func_from_text("></div>
            ");
                } elseif (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == "text")) {
                    // line 74
                    echo \layout::func_from_text("                <div><input type='text' name='value' value=\"");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("\" style=\"width:99%;\"></div>
            ");
                } elseif (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == "textarea")) {
                    // line 76
                    echo \layout::func_from_text("            <div><textarea name='value' style='width:98%;height:150px;' class=\"input\">");
                    echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "value"), "html", null, true));
                    echo \layout::func_from_text("</textarea></div>
            ");
                }
                // line 78
                echo \layout::func_from_text("        </div>
        ");
            }
            // line 80
            echo \layout::func_from_text("    </td>
    <tr id=\"tr_options\" ");
            // line 81
            if ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") != "select") && ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") != "radio"))) {
                echo \layout::func_from_text("style=\"display:none;\"");
            }
            echo \layout::func_from_text(">
        <th colspan=\"2\"><span style=\"float:left;margin-right: 20px;\"><strong>Опции</strong></span> <span id=\"multy_select_span\" ");
            // line 82
            if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") != "select")) {
                echo \layout::func_from_text("style=\"display:none;\"");
            }
            echo \layout::func_from_text(">Мультивыбор: <input type=\"checkbox\" id=\"multy_select\" ");
            if ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "multy_select")) {
                echo \layout::func_from_text("checked");
            }
            echo \layout::func_from_text("></span> <input type=\"button\" value=\"Добавить\" class=\"button\" style=\"float:right;\" id=\"add_option\"></th>
    </tr>    
    <tr id=\"tr_options1\" ");
            // line 84
            if ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") != "select") && ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") != "radio"))) {
                echo \layout::func_from_text("style=\"display:none;\"");
            }
            echo \layout::func_from_text(">
        <td colspan=\"2\" id=\"constructor_box\">
            ");
            // line 86
            if ((($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == "select") || ($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "type") == "radio"))) {
                echo \layout::func_from_text("<input type='hidden' name='options'></div>");
            }
            // line 87
            echo \layout::func_from_text("            ");
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "options"));
            foreach ($context['_seq'] as $context["k"] => $context["op"]) {
                // line 88
                echo \layout::func_from_text("                <div>Название опции: <input type='text' name='option_name' value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["op"]) ? $context["op"] : null), "html", null, true));
                echo \layout::func_from_text("\"> Значение: <input type='text' name='option_value' value=\"");
                echo \layout::func_from_text(twig_escape_filter($this->env, (isset($context["k"]) ? $context["k"] : null), "html", null, true));
                echo \layout::func_from_text("\"> <a title=\"Удалить\" class=\"del-btn delete_option\" style=\"display:inline-block;\"></a></div>
            ");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['k'], $context['op'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo \layout::func_from_text("        </td>
    </tr>
    <tr>
        <td colspan=\"2\" align=\"center\">
            <input type=\"button\" value=\"Сохранить\" class=\"save-btn\" style=\"float:right;");
            // line 94
            if ((!$this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id"))) {
                echo \layout::func_from_text("display: none;");
            }
            echo \layout::func_from_text("\" id=\"save_button\">
            <span style=\"float:left;\">
                <input type=\"button\" value=\"Удалить\" class=\"del-btn\" ");
            // line 96
            if (((!$this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id")) || $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "no_delete"))) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text("\" id=\"delete_option\" option=\"");
            echo \layout::func_from_text(twig_escape_filter($this->env, $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id"), "html", null, true));
            echo \layout::func_from_text("\">
                <input type=\"button\" value=\"Новая настройка\" class=\"add-btn\" ");
            // line 97
            if ((!$this->getAttribute((isset($context["option"]) ? $context["option"] : null), "id"))) {
                echo \layout::func_from_text("style=\"display: none;\"");
            }
            echo \layout::func_from_text("\" id=\"new_option\">
            </span>
        </td>
    </tr>
</table>
");
        }
    }

    public function getTemplateName()
    {
        return "applications\\options\\layouts\\admin/constructor.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 97,  303 => 96,  296 => 94,  290 => 90,  279 => 88,  274 => 87,  270 => 86,  263 => 84,  252 => 82,  246 => 81,  243 => 80,  239 => 78,  233 => 76,  227 => 74,  219 => 72,  215 => 70,  200 => 68,  196 => 67,  189 => 66,  187 => 65,  184 => 64,  182 => 63,  174 => 57,  159 => 55,  155 => 54,  145 => 47,  138 => 43,  131 => 39,  124 => 34,  118 => 33,  103 => 31,  99 => 30,  88 => 29,  84 => 28,  68 => 16,  64 => 14,  62 => 13,  59 => 12,  52 => 9,  49 => 8,  42 => 6,  39 => 5,  34 => 3,  31 => 2,);
    }
}
